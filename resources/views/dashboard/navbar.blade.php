<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      <!-- User Account: style can be found in dropdown.less -->
      <li class="nav-item dropdown user-menu">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{asset('assets/admin')}}/dist/img/avatar.png" class="user-image" alt="User Image" style="margin-top: 0px;">
          <!-- @if (Auth::user()->poto)
            <img class="user-image" src="{{ asset('storage/' . Auth::user()->poto) }}" alt="User Avatar">
          @else
            <img class="user-image" src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="User Avatar">
          @endif -->
          <span class="hidden-xs">{{Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu" style="border-radius: .25rem; top:45px;">
          <div class="card card-widget widget-user shadow" style="margin-bottom: 0px">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
                <p class="widget-user-username" style="padding-top: 25px; font-weight: 600;">{{Auth::user()->name}}</p>
                <!-- <p class="widget-user-username" style="padding-top: 25px; font-weight: 600;">{{ Auth::user()->name }}</p> -->
              {{-- <p class="widget-user-desc">Founder &amp; CEO</p> --}}
            </div>
            <div class="widget-user-image" style="top: 90px;">
              <img class="img-circle elevation-2" src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="User Avatar">
              <!-- @if (Auth::user()->poto)
                <img class="img-circle elevation-2" src="{{ asset('storage/' . Auth::user()->poto) }}" alt="User Avatar">
              @else
                <img class="img-circle elevation-2" src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="User Avatar">
              @endif -->
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <h5 class="description-header">Admin Al-Istiqomah</h5>
                    <span class="description-text">{{ Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('Y') }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <div class="row" style="padding-top: 15px;">
                <div class="col-sm-6">
                  <a href="{{ url('/admin/profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="col-sm-6">
                  
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat" style="font-size: 15px;"><i class="fas fa-sign-out-alt"> Sign Out</i></a>
                </div>
              </div>
              {{-- <div class="float-left">
                <a href="{{ url('/admin/profile') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="float-right">
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="nav-link btn btn-default btn-flat"></button>
                </form>
                <a href="{{route('logout')}}" class="nav-link btn btn-default btn-flat"><i class="fas fa-sign-out-alt"> Sign Out</i></a>
              </div> --}}
              <!-- /.row -->
            </div>
          </div>
        </ul>
      </li>
      <!-- Sign Out -->
      {{-- <li class="nav-item">
          <a class="nav-link" data-widget="" href="{{route('logout')}}" role="button">
              <i class="fas fa-sign-out-alt"> Sign Out</i>
          </a>
      </li> --}}
    </ul>
  </nav>