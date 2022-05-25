<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>لوحة التحكم | مهرجان التسوق رد سي مول ٢٠٢٢</title>
    <!-- Custom fonts for this template-->
    <script src="{{ asset('js/font-awesome5.js') }}"></script>
    {{-- <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}

    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=Poppins:wght@400;700&display=swap"
        rel="stylesheet"> --}}
    <!-- Custom styles for this template-->
    <link href="{{ asset('dashboard/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('dashboard.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item notifications">
                            <a class="nav-link" href="{{ route('new-winners') }}">
                                <i class="fas fa-bell fa-fw fa-2x"></i>
                                <!-- Counter - Alerts -->
                                {{-- <span  class="badge badge-danger badge-counter"></span> --}}
                                <span data-count="{{ $new_winners_count }}" class="badge-counters"></span>

                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <div class="nav-item align-self-center">
                            <i class="fas fa-user-alt" style="display: inline-block;
                            border-radius: 60px;
                            box-shadow: 0 0 2px #888;
                            padding: 0.5em 0.6em;
                            background: -webkit-linear-gradient(red, blue);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                          "></i>
                           <span class="mr-2 text-gray-600 d-none d-sm-inline">{{ Auth::user()->username; }}</span>
                        </div>
                        {{-- <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-alt" style="display: inline-block;
                border-radius: 60px;
                box-shadow: 0 0 2px #888;
                padding: 0.5em 0.6em;
                background: -webkit-linear-gradient(red, blue);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
              "></i>
                                <span class="mr-2 text-gray-600 small">أحمد بارحيم</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in text-right"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    الملف الشخصي
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-globe fa-sm fa-fw mr-2 text-gray-400"></i>
                                    الموقع الرئيسي
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    تسحيل الخروج
                                </a>
                            </div>
                        </li> --}}

                    </ul>

                </nav>
                <!-- End of Topbar -->

                {{-- <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

        </div>
        <!-- /.container-fluid --> --}}
                @yield('content')
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            {{-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer> --}}
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج</h5>
                            </div>
                            <div class="col-6">
                                <button class="close float-left" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <div class="container text-center d-inline">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                        <button class="btn btn-secondary mx-2" type="button" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-danger mx-2">خروج</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=" {{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboard/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/dataTables.bootstrap4.min.js') }}"></script>


    <script src="{{ asset('dashboard/js/pusher.min.js') }}"></script>

    <script type="text/javascript">
        var notificationsWrapper = $('.notifications');
        //   var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsWrapper.find('span[data-count]');
        var notificationsCount = parseInt(notificationsCountElem.data('count'));
        //   var notifications          = notificationsWrapper.find('ul.dropdown-menu');

        if (notificationsCount <= 0) {
            notificationsCountElem.hide();
        }

        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('bf18924d2ee82f355382', {
            encrypted: true
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('new-winner');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\NewWinner', function(data) {

            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsCountElem.show();
        });
    </script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "lengthMenu": [ 50, 75, 100 ],
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json',

        }
        });
    });
</script>
</body>

</html>
