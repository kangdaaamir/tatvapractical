@extends('main')
@section('title', 'Login')
@section('content')
<div class="content-wrapper">   

    <!-- Main content -->
    <section class="content">
      @include('partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Login</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body">
         <form action="{{url('post-login')}}" method="POST" id="logForm">
             {{ csrf_field() }}

             
             <div class="form-group">
                 <label class="small mb-1" for="inputEmailAddress">Email</label>
                 <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" />
                 @if ($errors->has('email'))
                 <span class="error">{{ $errors->first('email') }}</span>
                 @endif 
             </div>
             <div class="form-group">
                 <label class="small mb-1" for="inputPassword">Password</label>
                 <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                 @if ($errors->has('password'))
                 <span class="error">{{ $errors->first('password') }}</span>
                 @endif
             </div>

         </div>
         <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
             <button class="btn btn-primary" type="submit">Login</button>
         </div>
     </form>

     <div class="card-footer text-center">
        <div class="small"><a href="{{url('register')}}">Need an account? Sign up!</a></div>
    </div>


</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>



@endsection