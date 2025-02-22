<?php
require_once __DIR__ . '/../../models/Article.php';
$contact = require __DIR__ . '/../../config/contact.php';
$popularArticles = (new Article())->getPopular(3);
$app = require __DIR__ . '/../../config/app.php';

try {
    // Verify $contact is an array and has required keys
    if (!is_array($contact)) {
        throw new Exception('Contact configuration must be an array');
    }
} catch (Exception $e) {
    error_log("Footer Error: " . $e->getMessage());
    $contact = [
        'address' => 'Address not available',
        'phone' => 'Phone not available', 
        'email' => 'Email not available',
        'social' => []
    ];
    $popularArticles = [];
    $app = ['app_name' => 'School News Portal'];
}

// Set default values if keys don't exist
$contact = array_merge([
    'address' => 'Address not available',
    'phone' => 'Phone not available',
    'email' => 'Email not available', 
    'social' => []
], $contact ?? []);

// Ensure social is an array
if (!isset($contact['social']) || !is_array($contact['social'])) {
    $contact['social'] = [];
}
?>
<div class="fixed-plugin">
      <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
            
          </div>
          <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
              <span class="badge filter bg-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button class="btn btn-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
            <button class="btn btn-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          </div>
          <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav
            type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="mt-3">
            <h6 class="mb-0">Navbar Fixed</h6>
          </div>
          <div class="form-check form-switch ps-0">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo $app['constants']['ASSETS_URL']; ?>/js/core/popper.min.js"></script>
    <script src="<?php echo $app['constants']['ASSETS_URL']; ?>/js/core/bootstrap.min.js"></script>
    <script src="<?php echo $app['constants']['ASSETS_URL']; ?>/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo $app['constants']['ASSETS_URL']; ?>/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?php echo $app['constants']['ASSETS_URL']; ?>/js/plugins/chartjs.min.js"></script>

    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
    <!-- Github buttons -->
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo $app['constants']['ASSETS_URL']; ?>/js/dashboard.min.js?v=1.1.0"></script>



</body>
</html>