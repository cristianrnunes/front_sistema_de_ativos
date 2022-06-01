<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
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
    <div class="login">
        <div class="wrapper wrapper-login">
            <div class="container container-login animated fadeIn">
                @if(session('msg'))
                <div id="div-msg" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('msg')}}
                </div>
                @endif
                <div style="display: flex; justify-content: center;">
                <img style="border-radius: 5px;" width="30%" src="/assets/img/img/logo.jpg" alt="logo img" class="logo-img">
                </div>
                <form action="/auth" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="form-group form-floating-label">
                            <input id="email" name="username" type="text" class="form-control input-border-bottom"
                                required>
                            <label for="email" class="placeholder">E-mail</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="password" name="password" type="password"
                                class="form-control input-border-bottom" required>
                            <label for="password" class="placeholder">Senha</label>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                        <div class="col col-md-12 login-forget text-right">
						    <a href="esqueci_a_senha" class="link">Esqueci minha senha</a>
					    </div>
                        <div class="form-action">
                            <button type="submit" class="btn btn-primary btn-rounded btn-login">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
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