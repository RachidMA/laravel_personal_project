  <!-- ================= -->
        <!-- HEADER -->
        <div class="container shadow">
  <div class="image w-100 mt-0">
    <img src="../images/show_case.jpg" alt="" class="img-fluid object-top h-350 lg-h-600 shadow-lg">
  </div>
  <div class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <!-- ========Brand======= -->
        <a class="navbar-brand" href="{{route('welcome')}}">Logo</a>

        <!-- ========Toggler button======= -->
        <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </span>
        </button>
        


        <!-- ========Menu======= -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <!-- First Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Title-1</a></li>
                <li><a class="dropdown-item" href="#">Title-2</a></li>
                <li><a class="dropdown-item" href="#">Title-3</a></li>
              </ul>
            </li>
            <li class="nav-item">
              @if(Auth::check())
                @if(Auth::user()->role==0)
                  <a class="nav-link text-black" href="{{ route('jobs.userDashboard', ['name' => Auth::user()->name]) }}">Dashboard</a>
                @elseif(Auth::user()->role==1)
                  <a class="nav-link text-black" href="{{route('admin-dashboard', ['name'=>Auth::user()->name])}}">Admin Dashboard</a>
                @endif
              @endif
            </li>
            <li class="nav-item">
              <a  class="nav-link text-black" href="{{route('welcome')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-black" href="#">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-black" href="#">Invoices</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>

<!-- SEARCH BAR -->
<div class="search d-flex h-20 justify-content-center align-items-center w-100  my-3 ">
  <form action="{{route('search')}}" method="GET" class="w-100 lg:w-60 d-flex h-50 mt-1  rounded-lg  justify-content-center align-items-center">
    <input type="text" placeholder="Search by profession" name="profession" class="border border-gray-400 w-50  mr-2  px-4 py-2 focus:outline-none shadow" id="profession"/>
    <input type="text" placeholder="City" name="city" class=" w-20 border border-gray-400 px-4 py-2 mx-2 focus:outline-none shadow"/>
    <button type="submit" name="submit" class="btn btn-primary w-30 h-100 rounded-lg">Search</button>
  </form>
</div>