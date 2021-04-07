<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
       
        <img src="{{asset('assets/admin')}}/dist/img/download.png" class="img-circle" alt="Tatvasoft Image">
      </div>
      <div class="pull-left info">
        <p>Tatvasoft Practical</p>
      </div> 
      
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Blogs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('blog.index')}}"><i class="fa fa-circle-o"></i> Blogs View</a></li>
        </ul>
      </li>

      @if(\Auth::check())


      <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
      
      
      @else



      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Sign Up & Login</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('login')}}"><i class="fa fa-circle-o"></i>Login</a></li>
          <li><a href="{{route('signup')}}"><i class="fa fa-circle-o"></i>Sign Up</a></li>
        </ul>

        
      </li>

      @endif
      
      
    </section>
    <!-- /.sidebar -->
  </aside>