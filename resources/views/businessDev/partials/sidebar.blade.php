<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Barangay System</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{Auth::user()->firstname . ' ' . Auth::user()->surname}}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->
      <br />
      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            @if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin' )
                <li><a><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a><i class="fa fa-cogs"></i> General <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                       @if (Auth::user()->role == 'Super Admin')
                         <li><a href="{{ url('user') }}">User</a></li>
                       @endif
                    <li><a href="{{ url('resident') }}">Resident Information</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bookmark"></i> Website <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('mission') }}">Mission & Vision</a></li>
                    <li><a href="{{ url('event') }}">Events</a></li>
                    <li><a href="{{ url('announcement') }}">Announcement</a></li>
                    <li><a href="{{ url('project') }}">Project</a></li>
                    <li><a href="{{ url('kagawad') }}">Brgy Official</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-cogs"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('blotter') }}">Blotter</a></li>
                    <li><a href="{{ url('blotter') }}">Cedula</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-cogs"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('incident-type') }}">Type of Incident</a></li>
                    <li><a href="{{ url('position') }}">Position</a></li>
                  </ul>
                </li>
            @endif
           
            @if (Auth::user()->role == 'Cashier' || Auth::user()->role == 'Super Admin')
              <li><a><i class="fa fa-bookmark"></i> Cashier <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ url('cashier') }}">Payment</a></li>
                  <li><a href="{{ url('receipt') }}">Receipt</a></li>
                  <li><a href="{{ url('transaction/clearance') }}">Barangay Clearance</a></li>
                </ul>
              </li>
            @endif
              <li><a><i class="fa fa-bookmark"></i> Queue <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('queue') }}">Queue List</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->
    </div>
  </div>