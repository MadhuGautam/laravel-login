@include('layouts.header')

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="" data-image="{{ url('assets/img/sidebar-1.jpg') }}" >
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->
      <div class="logo">
        <!-- <a href="{{ url('/') }}" class="simple-text logo-mini">
          HM
        </a> -->
        <a href="{{ url('/') }}" class="simple-text logo-normal">
        {{ config('app.name', 'Laravel') }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/employee') }}">
              <i class="material-icons">person</i>
              <p>Employees</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/hotel') }}">
              <i class="material-icons">location_ons</i>
              <p>Hotels</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/bookings') }}">
              <i class="material-icons">library_books</i>
              <p>Bookings</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/customers') }}">
              <i class="material-icons">library_books</i>
              <p>Customers</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="{{ url('/accounts') }}">
              <i class="material-icons">library_books</i>
              <p>Accounting</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
       @include('layouts.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  HM
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">HM</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  @include('layouts.footer')

