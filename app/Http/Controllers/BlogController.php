<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Session;
use Auth;

class BlogController extends Controller
{


	public function index()
	{
		$user = Auth::user();

		if(\Auth::check()){
			if($user->role == '2'){

				$blogs = Blog::all()->where('created_by', '=', Auth::id())->where('is_active', '=', '1')->where('end_date', '>=', date('Y-m-d'));
			}else{

				$blogs = Blog::all();
			}
		}else{

			$blogs = Blog::all()->where('is_active', '=', '1')->where('end_date', '>=', date('Y-m-d'));

		}
		return view('blogs.index', compact('blogs'));
	}

	public function create()
	{
		if(\Auth::check()){
			return view('blogs.create');
		}else{
			return redirect('login');
		}
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title'           => 'required',
			'description'          => 'required',
			'start_date'          => 'required',
			'end_date'          => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'status'          => 'required',
		]);

		$blogs = new Blog;

		$blogs->title =$request->title;
		$blogs->description =$request->description;   
		$blogs->start_date =$request->start_date;  
		$blogs->end_date =$request->end_date;  
		$blogs->created_by = Auth::id();



		if ($files = $request->file('image')) {
			$destinationPath = public_path('blog');

			

			//$destinationPath = 'public/product/'; // upload path
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$blogs->photo = "$profileImage";
		}

		$blogs->is_active =$request->status;  

		if($blogs->save())
		{
			$alert_toast = 
			[
				'title' => 'Operation Successful : ',
				'text'  => 'Blog Successfully Added.',
				'type'  => 'success',
			];

		}
		else
		{
			$alert_toast = 
			[
				'title' => 'Operation Failed : ',
				'text'  => 'A Problem Occurred While Adding a Blog.',
				'type'  => 'danger',
			];
		}

		Session::flash('alert_toast', $alert_toast);
		return redirect()->route('blog.index');
	}

	public function edit($id)
	{
		if(\Auth::check()){
			$blog = Blog::findOrFail($id);
			return view('blogs.edit',  compact('blog'));
		}else{

			return redirect('login');

		}
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title'           => 'required',
			'description'          => 'required',
			'start_date'          => 'required',
			'end_date'          => 'required',
			'is_active'          => 'required',
		]);

		$blogs = Blog::findOrFail($id);




		if ($files = $request->file('image')) {
			$destinationPath = public_path('blog');
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();

			$files->move($destinationPath, $profileImage);
			$blogs->photo= "$profileImage";
		}

		$blogs->title =$request->title;
		$blogs->description =$request->description;   
		$blogs->start_date =$request->start_date;  
		$blogs->end_date =$request->end_date;  
		$blogs->is_active  = $request->is_active;
		$blogs->updated_by = Auth::id();


		if($blogs->save())
		{
			$alert_toast = 
			[
				'title' => 'Operation Successful : ',
				'text'  => 'Blog Successfully Updated.',
				'type'  => 'success',
			];
		}
		else
		{
			$alert_toast = 
			[
				'title' => 'Operation Failed : ',
				'text'  => 'A Problem Update The Blog.',
				'type'  => 'danger',
			];
		}

		Session::flash('alert_toast', $alert_toast);
		return redirect()->route('blog.index');
	}

	public function delete(Request $request)
	{
		$blog = Blog::findOrFail($request->id);
		if($blog->delete())
		{
			$alert_toast = 
			[
				'title' =>  'Operation Successful : ',
				'text'  =>  'Blog Successfully Deleted.',
				'type'  =>  'success',
			];
		}
		else
		{
			$alert_toast = 
			[
				'title' => 'Operation Failed : ',
				'text'  => 'A Problem Deleting The Blog.',
				'type'  => 'danger',
			];
		}

		Session::flash('alert_toast', $alert_toast);
		return redirect()->route('blog.index');
	}
}
