<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/img/Icone.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Montserrat:100,200,300,400,500,600,700,800,900"]
        },
        custom: {
            "families": ["Flaticon", "LineAwesome"],
            urls: ['/assets/css/fonts.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/ready.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link rel="stylesheet" href="/assets/css/demo.css"> -->
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" style="display: flex; justify-content: center; align-itens:center">
                <a href="/painel" class="big-logo">
                    <img style="border-radius: 5px;" src="/assets/img/img/logo.jpg" alt="logo img" class="logo-img">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="la la-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">

                <div class="container-fluid row">
                    <div class="col-10 navbar-minimize">
                        <button class="btn btn-minimize btn-rounded">
                            <i class="la la-navicon"></i>
                        </button>
                    </div>
                    <div class="col-1" style="text-align: end;">
                        <a href="logout" style="color: white; text-decoration:none; font-size:16px ">Sair</a>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="photo">
                            <img src="/assets/img/img/jonatan.jpg" alt="preview" alt="image profile">
                        </div>
                       
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                   
                                    <span class="user-level">{{session()->get('username')}}</span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav">

                        <li class="nav-item">
                            <a href="/painel/dashboard">
                                <i class="flaticon-home"></i>
                                <p>Painel Geral</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="la la-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Cadastros</h4>
                        </li>
                        <li class="nav-item  ">
                            <a data-toggle="collapse" href="/painel/products">
                                <i class="flaticon-box"></i>
                                <p>Ativos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="/painel/services">
                                <i class="flaticon-users"></i>
                                <p>Empregados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="/painel/contacts">
                                <i class="flaticon-desk"></i>
                                <p>Setores</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a data-toggle="collapse" href="/painel/users">
                                <i class="flaticon-user-5"></i>
                                <p>Usuários</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/core/popper.min.js"></script>
    <!-- <script src="/assets/js/core/bootstrap.min.js"></script> -->
    <script src="/assets/js/ready.js"></script>


    <script src="/assets/js/main.js"></script>

    <!-- jQuery UI -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="/assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- Chart Circle -->
    <script src="/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="/assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="/assets/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="/assets/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="/assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Ready Pro JS -->
    <script src="/assets/js/ready.min.js"></script>

    <!-- Ready Pro DEMO methods, don't include it in your project! -->
    <!-- <script src="/assets/js/setting-demo.js"></script> -->
    <!-- <script src="/assets/js/demo.js"></script> -->

    <script>
    setTimeout(function() {
        $("#div-msg").fadeOut().empty();
    }, 4000);
    </script>


</body>

</html>