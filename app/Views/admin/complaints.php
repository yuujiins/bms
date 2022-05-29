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
  <title>Complaints - BMS</title>
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
              <h6 class="h2 text-white d-inline-block mb-0">Complaints</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?=base_url();?>/admin"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Complaints</a></li>
                  <li class="breadcrumb-item"><a href="#">Open</a></li>
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
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Open complaints</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-primary btn-sm" id="showAddComplaint"><span class="ni ni-fat-add"></span> Add a complaint</button>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                      <template id="residentsTemplate">

                      </template>
                      <div class="table-responsive">
                        <table class="table table-hover" id="tableActiveComplaints">
                            <thead>
                                <tr>
                                    <th>System ID</th>
                                    <th>Complainant</th>
                                    <th>Complainee</th>
                                    <th>Date Filed</th>
                                </tr>
                            </thead>
                            <tbody id="">

                            </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-info btn-sm selectButtons" id="showEditActiveModal" disabled><span class="ni ni-circle-08"></span> View Information</button>
                    <button type="button" class="btn btn-warning btn-sm selectButtons" id="showAddNoteModal" disabled><span class="ni ni-book-bookmark"></span> Add Notes</button>
                    <button type="button" class="btn btn-success btn-sm selectButtons" id="showResolveModal" disabled><span class="ni ni-check-bold"></span> Resolve</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- Footer -->
      <?=view('admin/footer');?>
      <?=view('admin/complaintmodals');?>
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
  <script src="/assets/admin/js/scripts/complaints.js" type="text/javascript"></script>
  <script src="/assets/admin/peekabar/js/jquery.peekabar.min.js" type="text/javascript"></script>
  <script src="/assets/admin/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
</body>

</html>