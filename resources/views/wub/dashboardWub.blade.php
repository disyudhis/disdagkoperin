<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <title>WUB - Dashboard</title>
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

  <div id="myCarousel" class="carousel slide py-5 pb-2" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($announcements as $index => $announcement)
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($announcements as $index => $announcement)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-toggle="modal" data-bs-target="#announcementModal{{ $announcement->id }}">
                <img src="{{ $announcement->image }}" class="w-100" alt="{{ $announcement->title }}">
                <div class="carousel-caption d-none d-md-block text-start px-3">
                    <h5>{{ $announcement->title }}</h5>
                    <p>{{ $announcement->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center flex-wrap">
      @foreach ($news as $item)
      <div class="card m-3 mt-0" style="width: 29rem;" data-bs-toggle="modal" data-bs-target="#newsModal{{ $item->id }}">
        <div class="d-flex justify-content-center">
          <img src="{{ $item->image }}" class="card-img-top" style="width: 100%;" height="200px" alt="{{ $item->title }}">
        </div>
        <hr class="m-0">
        <div class="card-body">
          <h5 class="card-title">{{ $item->title }}</h5>
          <p class="card-text">{{ $item->description }}</p>
          <p class="card-text text-muted">{{ $item->date->translatedFormat('d F Y') }}</p>
        </div>
      </div>

      <!-- News Detail Modal -->
      <div class="modal fade" id="newsModal{{ $item->id }}" tabindex="-1" aria-labelledby="newsModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newsModalLabel{{ $item->id }}">{{ $item->title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="{{ $item->image }}" class="img-fluid mb-3" alt="{{ $item->title }}">
              <p>{!! nl2br(e($item->description)) !!}</p>
              <p class="text-muted">Dibuat tanggal {{ $item->date->translatedFormat('d F Y') }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Announcement Modals -->
  @foreach ($announcements as $announcement)
  <div class="modal fade" id="announcementModal{{ $announcement->id }}" tabindex="-1" aria-labelledby="announcementModalLabel{{ $announcement->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="announcementModalLabel{{ $announcement->id }}">{{ $announcement->title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="{{ $announcement->image }}" class="img-fluid mb-3" alt="{{ $announcement->title }}">
          <p>{!! nl2br(e($announcement->description)) !!}</p>
          <p class="text-muted">Dibuat tanggal {{ $announcement->date->translatedFormat('d F Y') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        @if ($news->onFirstPage())
          <li class="page-item disabled"><span class="page-link">Previous</span></li>
        @else
          <li class="page-item"><a class="page-link" href="{{ $news->previousPageUrl() }}">Previous</a></li>
        @endif

        @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
          <li class="page-item {{ $page == $news->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
          </li>
        @endforeach

        @if ($news->hasMorePages())
          <li class="page-item"><a class="page-link" href="{{ $news->nextPageUrl() }}">Next</a></li>
        @else
          <li class="page-item disabled"><span class="page-link">Next</span></li>
        @endif
      </ul>
    </nav>
  </div>

  <footer class="footer mt-auto py-3">
    <div class="container">
      <div class="marquee">
        <p class="text-white">
        Your running text here. Make sure to replace this with your actual text.
        </p>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
