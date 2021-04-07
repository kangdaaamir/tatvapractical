@extends('main')
@section('title', 'Blog Create')
@section('content')


<div class="content-wrapper">   

  <!-- Main content -->
  <section class="content">
    @include('partials.validate')


    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Blog</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('POST')}}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputBlogTitle">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Blog Title">
              </div>

              <div class="form-group">
                <label for="exampleInputBlogDesdription">Description</label>
                <input type="textarea" name="description" class="form-control" id="description" placeholder="Enter Blog Description">
              </div>

              <div class="form-group">
                <label for="exampleInputstartdate">Start Date</label>
                <input type="text" id="datepick" name="start_date" class="form-control">
              </div>  

              <div class="form-group">
                <label for="exampleInputenddate">End Date</label>
                <input type="text" id="datepicks" name="end_date" class="form-control">
              </div> 

              



              <div class="form-group">
                <input type="radio"  id="status" name="status" value="0">In-Active</label>

                <input type="radio" id="status" name="status" value="1">Active</label>
              </div> 

              <div class="form-group">
                <label for="exampleInputDepartmentTitle">Blog Image</label>
                <input type="file" name="image" class="form-control" placeholder="">
                <span class="text-danger">{{ $errors->first('image') }}</span>  
              </div>


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


  @endsection


