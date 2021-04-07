@extends('main')
@section('title', 'Blogs')
@section('content')

<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    @include('partials.validate')
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Blogs</h3>


        @if(\Auth::check())
        <div class="box-tools pull-right">

          <a href="{{ route('blog.create') }}" class="orangeBtn mt-3 mt-md-0" title="Create Blog"><button>Create Blog</button></a>
        </div>
        @endif
      </div>
      <div class="box-body">

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th>Blog Title</th>
                <th>Blog Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Is Active</th>
                <th>Image</th>
                @if(\Auth::check())
                <th>Edit</th>
                <th>Delete</th>
                @endif

              </tr>
            </thead>
            <tbody>

              @foreach($blogs as $blog)
              <tr>
                <td>{{$blog->title}}</td>
                <td>{{$blog->description}}</td>
                <?php $formattedStartDate = date("d-m-Y", strtotime($blog->start_date)); ?>
                <td>{{$formattedStartDate}}</td>
                <?php $formattedEndDate = date("d-m-Y", strtotime($blog->end_date)); ?>
                <td>{{$formattedEndDate}}</td>
                <td><?php 
                if($blog->is_active == '0')
                {
                  echo "In-Active";
                }
                else{
                  echo "Active";
                } 

                ?>
              </td>

              <td>

                <img src="/blog/{{ $blog->photo }}" height="50px" width="50px" /></td>


                @if(\Auth::check())
                <td>
                  <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>

                  <form action="{{route('blog.delete', $blog->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                  </td>
                  @endif
                </tr>
                @endforeach

                
              </tfoot>
            </table>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  @endsection
  @push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  @endpush
  @push('scripts')
  <!-- DataTables -->
  <script src="{{asset('assets/admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('assets/admin')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
  @endpush