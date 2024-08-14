<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wub/styles/styles.css') }}">
    <title>Admin - List Announcement</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-lg-3 col-xl-2 px-sm-2 px-0 bg-blue text-white">
                <div class="d-flex flex-column align-items-center align-items-sm-center min-vh-100 px-3 pt-3">
                    <a href="" class="d-flex align-items-center pb-4">
                        <img src="{{ asset('wub/img/logoAdmin.png') }}" alt="" width="140" height="50">
                    </a>
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20190802021607/geeks14.png"
                        class="rounded-circle mt-2" alt="Circular Image" width="150">
                    <h3 class="text-white mt-3">Admin</h3>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0  me-5 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item mt-3 me-4">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link align-middle px-0 d-flex align-items-center">
                                <i class="fs-4 me-1 bi-speedometer2 text-white"></i>
                                <span class="ms-2 fs-5 d-none d-sm-inline text-white ">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mt-0 me-4">
                            <a href="#inputDataMenu" data-bs-toggle="collapse"
                                class="nav-link align-middle px-0 d-flex align-items-center">
                                <i class="fs-4 me-1 bi-database-add text-white"></i>
                                <span class="ms-2 fs-5 d-none d-sm-inline text-white">Input Data</span>
                            </a>
                            <ul class="collapse nav flex-column ms-1" id="inputDataMenu" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('admin.createPelatihan') }}" class="nav-link px-0"> <span
                                            class="text-white">Pelatihan</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.createMateri') }}" class="nav-link px-0"> <span
                                            class="text-white">Materi</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.createIklan') }}" class="nav-link px-0"> <span
                                            class="text-white">Iklan</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.createAnnouncement') }}" class="nav-link px-0"> <span
                                            class="text-white">Pengumuman</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mt-0 me-4">
                            <a href="#listDataMenu" data-bs-toggle="collapse"
                                class="nav-link align-middle px-0 d-flex align-items-center">
                                <i class="fs-4 me-1 bi bi-layout-three-columns text-white"></i>
                                <span class="ms-2 fs-5 d-none d-sm-inline text-white">List Data</span>
                            </a>
                            <ul class="collapse nav flex-column ms-1" id="listDataMenu" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="text-white">Pelatihan</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="text-white">Materi</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.listNews') }}" class="nav-link px-0"> <span class="text-white">Iklan</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.listAnnouncements') }}" class="nav-link px-0"> <span class="text-white">Pengumuman</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mt-0 me-4">
                            <a href="#" class="nav-link align-middle px-0 d-flex align-items-center text-nowrap">
                                <i class="fs-4 me-1 bi-people text-white"></i>
                                <span class="ms-2 fs-5 d-none d-sm-inline text-white ">Enroll Peserta</span>
                            </a>
                        </li>
                        <li class="nav-item mt-5 me-4">
                            <a href="#" class="nav-link align-middle px-0 d-flex align-items-center text-nowrap">
                                <i class="fs-4 me-1 bi-box-arrow-left text-white"></i>
                                <span class="ms-2 fs-5 d-none d-sm-inline text-white ">Log-Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col px-4 my-4">
                <h1>Announcements</h1>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($announcements as $announcement)
                            <tr>
                                <td>{{ $announcements->firstItem() + $loop->index }}</td>
                                <td>{{ $announcement->title }}</td>
                                <td>{{ Str::limit($announcement->description, 50) }}</td>
                                <td>{{ $announcement->date->translatedFormat('d F Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.editAnnouncement', $announcement->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.deleteAnnouncement', $announcement->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="js/rteScript.js"></script>
</body>
</html>