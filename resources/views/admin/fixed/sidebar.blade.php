<nav class="sidebar sidebar-offcanvas" id="sidebar">
  @if(auth()->user()->role=='admin')
    <div class="user-profile">
      <div class="user-image">
        <img src="{{url('Backend/images/faces/face29.png')}}">
      </div>
      <div class="user-name">
          Syed Alvi Islam Nifaz
      </div>
      <div class="user-designation">
          Site Admin
      </div>
    </div>
  @endif
    <ul class="nav">
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->role=='user')
      <li class="nav-item">
        <a class="nav-link" href="{{route('asset.cart')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Asset List</span>
        </a>
      </li>
      @endif
     
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Employee</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            
          <li class="nav-item"> <a class="nav-link" href="{{route('manage.employee')}}">Manage Employee</a></li>
          {{-- <li class="nav-item"> <a class="nav-link" href=""></a></li> --}}
          </ul>
        </div>
      </li>
      @endif
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Asset</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
                 
      
            <li class="nav-item"> <a class="nav-link" href="{{route('manage.asset')}}">Manage Asset</a></li>
    
          </ul>
        </div>
      </li>
      @endif
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Request</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
                 
     
            <li class="nav-item"> <a class="nav-link" href="{{route('request.list')}}">Request list</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('reject.list')}}">Reject Request list</a></li>
        
           
          </ul>
        </div>
      </li>
      @endif
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" href="{{route('transfer.list')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Asset Distribution List</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->role=='user')
      <li class="nav-item">
        <a class="nav-link" href="{{route('requestAsset.list')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Asset request History</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" href="{{route('damage.list')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Damage Asset List</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.report')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Report</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->role=='user')
      <li class="nav-item">
        <a class="nav-link" href="{{route('myAsset.list')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">My Asset</span>
        </a>
      </li>
      @endif

      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Feedback</span>
        </a>
 
      <li class="nav-item">
    
    </ul>
  </nav