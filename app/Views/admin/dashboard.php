<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Residents - BMS</title>
    <!-- Favicon -->
    <link rel="icon" href="/assets/admin/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/admin/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assets/admin/css/argon.css?v=1.1.0" type="text/css">
    <link rel="stylesheet" href="/assets/admin/datatables/datatables.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/admin/peekabar/css/jquery.peekabar.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/admin/jquery-confirm/jquery-confirm.min.css" type="text/css">
</head>

<body>
<!-- Sidenav -->

<?=view('admin/sidenav');?>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <?=view('admin/topnav');?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?=base_url();?>/admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->

            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="lead">Welcome to BMS!</h1>
                        <small>Here are the guidelines in using the system</small>
                    </div>
                    <div class="header-body">
                        <p>
                            <ol>
                                <li>
                                    All Brgy. Officials without access to the system may ask for an account to the Administrator
                                </li>
                                <li>
                                    Only administrators are allowed to add new users and/or administrators
                                </li>
                                <li>
                                    All actions you perform on the system will be audited. These audits are not editable nor deletable. This is necessary for the security and accountability of the users.
                                </li>
                                <li>
                                    Only registered residents are able to request for a clearance on the system.
                                </li>
                                <li>
                                    All clearances are issued separately. The system is not responsible for auto-generating Brgy. clearances as this document is sensitive and requires a dry seal to be valid
                                </li>
                                <li>
                                    You can access or edit your profile information in the upper right corner of the system (by clicking on your name).
                                </li>
                                <li>
                                    In case you forgot your password, please contact the administrator to reset your password.
                                </li>
                                <li>
                                    It is recommended to change your password every time you request for a reset for security purposes.
                                </li>
                            </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?=view('admin/footer');?>
        <?=view('admin/residentmodals');?>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="/assets/admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/admin/vendor/js-cookie/js.cookie.js"></script>
<script src="/assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="/assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="/assets/admin/vendor/chart.js/dist/Chart.min.js"></script>
<script src="/assets/admin/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="/assets/admin/js/argon.js?v=1.1.0"></script>
<!-- Demo JS - remove this in your project -->
<script src="/assets/admin/js/demo.min.js"></script>
<script src="/assets/admin/js/notify/notify.min.js"></script>
<script src="/assets/admin/datatables/datatables.min.js"></script>
<script src="/assets/admin/peekabar/js/jquery.peekabar.min.js" type="text/javascript"></script>
<script src="/assets/admin/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('#anchorDashboard').addClass('active')
    })
</script>

</html>