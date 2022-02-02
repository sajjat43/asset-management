

<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="">Assets Bud</a>
      <a class="navbar-brand brand-logo-mini" href=""></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
          {{-- <li class="nav-item dropdown d-lg-flex d-none">
              <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
          </li> --}}
        <li class="nav-item dropdown d-flex">
          
          @if(auth()->user()->role=='user')
          <a href="{{route('new.cart.get')}}"><span class="badge badge-success" style="margin-left:20px; padding:10px">Cart({{session()->has('cart') ? count(session()->get('cart')):0}})</span></a>
          @endif 
          @if(auth()->user()->role=='admin')
        </li>
        <li class="nav-item dropdown d-flex mr-4 ">
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="icon-cog"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header"></p>
            <a class="dropdown-item preview-item">               
                <i class="icon-head"></i> Profile
            </a>
            <a class="dropdown-item preview-item" href="{{route('admin.logout')}}">{{auth()->user()->name}} ({{auth()->user()->role}}) |  Logout</a>

          </div>
        </li>
        @endif
        @if(auth()->user()->role=='user')
      </li>
      <li class="nav-item dropdown d-flex mr-4 ">
        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header"></p>
          {{-- <a class="dropdown-item preview-item"href="{{route('employee.profile')}}">   --}}
          <a class="dropdown-item preview-item" href="{{route('employee.profile')}}">({{auth()->user()->role}}) |  Profile</a>
          <a class="dropdown-item preview-item" href="{{route('admin.logout')}}">({{auth()->user()->role}}) |  Logout</a>

        </div>
      </li>
      @endif
        
    </div>
  </nav