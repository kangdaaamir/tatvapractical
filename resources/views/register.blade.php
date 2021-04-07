@extends('main')
@section('title', 'Register')
@section('content')
<div class="content-wrapper">   

    <!-- Main content -->
    <section class="content">


        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Register</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
              </div>
              <div class="box-body">
                <form action="{{url('post-register')}}" method="POST" id="regForm"  enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <div class="form-group">
                     <label class="small mb-1" for="inputFirstName">First Name</label>
                     <input class="form-control py-4" id="inputFirstName" type="text" name="first_name" placeholder="Enter First Name" />
                     @if ($errors->has('first_name'))
                     <span class="error">{{ $errors->first('first_name') }}</span>
                     @endif  
                 </div>

                 <div class="form-group">
                     <label class="small mb-1" for="inputFirstName">Last Name</label>
                     <input class="form-control py-4" id="inputLastName" type="text" name="last_name" placeholder="Enter Last Name" />
                     @if ($errors->has('last_name'))
                     <span class="error">{{ $errors->first('last_name') }}</span>
                     @endif  
                 </div>
                 <div class="form-group">
                     <label class="small mb-1" for="inputEmailAddress">Email</label>
                     <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" />
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

                 <div class="form-group">
                    <label for="exampleInputDepartmentTitle">User Image</label>
                    <input type="file" name="image" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputDateOfBirth">Date Of Birth</label>
                    <input type="text" id="datepicker" name="date_of_birth" class="form-control">
                     @if ($errors->has('date_of_birth'))
              <span class="error">{{ $errors->first('date_of_birth') }}</span>
              @endif
                </div>  


                <div class="form-group">
                 <label for="exampleInputRole">Role</label>
                 <div class="d-flex">
                  <input type="radio"  id="status" name="role" value="1">Admin</label>

                  <input type="radio" id="status" name="role" value="2">User</label>
              </div>
              @if ($errors->has('role'))
              <span class="error">{{ $errors->first('role') }}</span>
              @endif
          </div> 



          <div class="form-group mt-4 mb-0">
             <button class="btn btn-primary btn-block" type="submit">Create Account</button>
         </div>
     </form>
 </div>
 <div class="card-footer text-center">
    <div class="small"><a href="{{url('login')}}">Have an account? Go to login</a></div>
</div>
</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>



@endsection