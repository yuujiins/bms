<!-- Sidenav -->
<!-- Always put this after the body, before the main content -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand text-center" href="#">
          <h2 class="lead text-center">BMS</h2>
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" id="anchorDashboard" href="<?=base_url();?>/admin">
                    <i class="ni ni-collection "></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>
            <li class="nav-item" <?php $session = session(); if($session->get('roletype') != 1) echo 'hidden';?>>
              <a class="nav-link" id="anchorUser" href="<?=base_url();?>/users">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="anchorResidents" href="<?=base_url();?>/residents">
                <i class="ni ni-folder-17"></i>
                <span class="nav-link-text">Resident Directory</span>
              </a>
            </li>
            <li class="nav-item" id="anchorActive">
              <a class="nav-link" href="#">
                <i class="ni ni-bullet-list-67"></i>
                <span class="nav-link-text">Complaints</span>
              </a>
              <div class="" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item"  id="" >
                    <a href="<?=base_url();?>/complaints"class="nav-link"><i class="ni ni-archive-2"></i> Open</a>
                  </li>
                  <li class="nav-item">
                    
                    <a href="<?=base_url();?>/complaints-resolved" class="nav-link"><i class="ni ni-paper-diploma"></i> Resolved</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="anchorClearance" href="<?=base_url();?>/clearance">
                <i class="ni ni-check-bold"></i>
                <span class="nav-link-text">Clearance Request</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="anchorTransactions" href="#">
                <i class="ni ni-bullet-list-67"></i>
                <span class="nav-link-text">Transactions</span>
              </a>
              <div class="" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item"  id="trPending" >
                    <a href="<?=base_url();?>/transactions?status=Pending"class="nav-link" id=""><i class="ni ni-archive-2"></i> Pending</a>
                  </li>
                  <li class="nav-item">
                    
                    <a href="<?=base_url();?>/transactions?status=Completed" class="nav-link" id="trCompleted"><i class="ni ni-paper-diploma"></i> Completed</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3" <?php $session = session(); if($session->get('roletype') != 1) echo 'hidden';?>>
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted" <?php $session = session(); if($session->get('roletype') != 1) echo 'hidden';?>>System Audits</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3" <?php $session = session(); if($session->get('roletype') != 1) echo 'hidden';?>>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url();?>/audit-trail" id="auditLink">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">View Audit Trail</span>
              </a>
            
          </ul>
        </div>
      </div>
    </div>
  </nav>