<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <title>WUB - Pelatihan</title>
    <link rel="stylesheet" type="text/css" href="wub/styles/styles.css"/>
</head>
<body>
  <nav class="navbar navbar-expand navbar-light bg-navbar-custom fixed-top">
    <a class="navbar-brand text-white ps-3" href="">
      <img src="img/logo.png" width="35px" height="40px" alt="">
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
          <img src="wub/icon/hamburger_menu.svg" width="25px" height="30px" alt="">
        </a>
      </li>
    </ul>
    <div class="navbar-collapse justify-content-end pe-2">
      <ul class="navbar-nav">
        <li class="nav-item dropdown text-nowrap">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="wub/icon/settings_icon.svg" width="25px" height="30px" alt="">
          </a>
          <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Log-Out
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start offcanvas-custom bg-canvas-custom" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title text-white" id="offcanvasSidebarLabel"></h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body ps-4">
      <div class="text-center mb-4">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20190802021607/geeks14.png" class="rounded-circle mt-2" alt="Circular Image" width="150">
        <h3 class="text-white mt-3">{{ $user->name }}</h3>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item py-2">
          <h6><a class="nav-link text-white" href="{{ route('wub.dashboardWub') }}">Dashboard</a></h6>
        </li>
        <li class="nav-item">
          <h6><a class="nav-link text-white" href="{{ route('wub.pelatihan') }}">Pelatihan</a></h6>
        </li>
        <li class="nav-item py-2">
          <h6><a class="nav-link text-white" href="#">Absen</a></h6>
        </li>
      </ul>
    </div>
  </div>

  <!-- Main content wrapper -->
<div class="container">
  <div class="mb-2">
    <h1>Pelatihan</h1>
  </div>
  <div class="row row-cols-1 row-cols-md-1 g-4 mt-1">
    <div class="col">
      <div class="card" style="height: 10rem;">
        <div class="card-body d-flex align-items-center justify-content-center text-center">
          <h2 class="card-text">Wajib</h2>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="height: 10rem;">
        <div class="card-body d-flex align-items-center justify-content-center text-center">
          <h2 class="card-text">Workshop</h2>
        </div>
      </div>
    </div>
  </div>

  <h2 class="mt-4">Overview</h2>
  <!-- Material 1 -->
  <div class="row align-items-center my-3">
    <div class="col-2 label-material">
      <p class="mb-0 px-5">Material 1</p>
    </div>
    <div class="col-8 progress-container">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="col-2 percentage">
      <p class="mb-0 text-end">0%</p>
    </div>
  </div>

  <!-- Material 2 -->
  <div class="row align-items-center my-3">
    <div class="col-2 label-material">
      <p class="mb-0 px-5">Material 2</p>
    </div>
    <div class="col-8 progress-container">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="col-2 percentage">
      <p class="mb-0 text-end">0%</p>
    </div>
  </div>

  <!-- Material 3 -->
  <div class="row align-items-center my-3">
    <div class="col-2 label-material">
      <p class="mb-0 px-5">Material 3</p>
    </div>
    <div class="col-8 progress-container">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="col-2 percentage">
      <p class="mb-0 text-end">0%</p>
    </div>
  </div>

  <!-- Material 4 -->
  <div class="row align-items-center my-3">
    <div class="col-2 label-material">
      <p class="mb-0 px-5">Material 4</p>
    </div>
    <div class="col-8 progress-container">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="col-2 percentage">
      <p class="mb-0 text-end">0%</p>
    </div>
  </div>

  <!-- Material 5 -->
  <div class="row align-items-center my-3">
    <div class="col-2 label-material">
      <p class="mb-0 px-5">Material 5</p>
    </div>
    <div class="col-8 progress-container">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="col-2 percentage">
      <p class="mb-0 text-end">0%</p>
    </div>
  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
