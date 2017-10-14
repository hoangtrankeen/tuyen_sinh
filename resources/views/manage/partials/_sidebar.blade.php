<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{  ucfirst(Auth::user()->name) }}<a style="font-weight: lighter;"> ({{Auth::user()->roles()->pluck('name')->first()}})</a></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header text-center">MAIN NAVIGATION</li>
      <li>
        <a href="{{route('users.index')}}">
          <i class="fa fa-users" aria-hidden="true"></i> <span>Manage Users</span>
        </a>
      </li>
      <li>
        <a href="{{route('roles.index')}}">
          <i class="fa fa-lock" aria-hidden="true"></i> <span>Roles</span>
        </a>
      </li>
      <li>
        <a href="{{route('permissions.index')}}">
          <i class="fa fa-shield" aria-hidden="true"></i> <span>Permissions</span>
        </a>
      </li>
      <li>
        <a href="{{route('courses.index')}}">
          <i class="fa fa-calendar"></i> <span>Courses</span>
        </a>
      </li>
      <li>
        <a href="{{route('students.index')}}">
          <i class="fa fa-th"></i> <span>Students</span>
        </a>
      </li>
      <li>
        <a href="{{route('menus.index')}}">
          <i class="fa fa-bars" aria-hidden="true"></i> <span>Menu</span>
        </a>
      </li>
      <li>
        <a href="{{route('categories.index')}}">
          <i class="fa fa-sitemap" aria-hidden="true"></i> <span>Categories</span>
        </a>
      </li>
      <li>
        <a href="{{route('posts.index')}}">
          <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Posts</span>
        </a>
      </li>
      <li>
        <a href="{{route('tags.index')}}">
          <i class="fa fa-tags" aria-hidden="true"></i> <span>Tags</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->