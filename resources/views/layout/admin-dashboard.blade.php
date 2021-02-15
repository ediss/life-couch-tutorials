<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel Kursevi Life-Leaf</title>
  <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet"
  type="text/css" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/fontawesome-free/css/all.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin_panel/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/summernote/summernote-bs4.min.css') }}">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<style>
  .sw-btn-prev, .sw-btn-next, .btn-add-course, .btn-edit-course {
    background-color: #28a745 !important;
    border-color:#28a745 !important;
  }
</style>


</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark bg-dark">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto active">
          <li class="nav-item d-none d-sm-inline-block">
            <a target="_blank" href="http://kursevi.life-leaf.com/" class="nav-link">kursevi.life-leaf.com</a>
          </li>

        </ul>
      </div>
      <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route("custom.logout") }}">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link elevation-4">
        <img src="{{ asset("assets/admin_panel/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset("assets/admin_panel/dist/img/maja-vuckovic-online.jpg")}}" class="img-circle elevation-2"
              alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Maja Vuckovic</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Rad sa kursevima
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.courses') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Lista Kurseva
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.create-course') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Dodaj kurs
                    </p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">

            </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 text-center">
              <h1> <u> @yield('page-title') </u></h1>
            </div>

          </div>
          <div class="row">
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-success">

                @yield('content')

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0-pre
      </div>
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset("assets/admin_panel/plugins/jquery/jquery.min.js" ) }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("assets/admin_panel/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("assets/admin_panel/dist/js/adminlte.min.js") }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset("assets/admin_panel/dist/js/demo.js") }}"></script>

  <script src="{{ asset("assets/admin_panel/plugins/summernote/summernote-bs4.min.js") }}"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <script src="{{ asset("assets/js/apply-form-steps.js")}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript">
  </script>
  <!--add course script -->
  <script>

  var btnFinish = $('<input type="submit" class="btn btn-success btn-add-course" value="Dodaj kurs">');


$('#smartwizard').smartWizard({
  selected: 0, // Initial selected step, 0 = first step
  theme: 'progress', // theme for the wizard, related css need to include for other than default theme
  justified: true, // Nav menu justification. true/false
  darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
  autoAdjustHeight: true, // Automatically adjust content height
  cycleSteps: true, // Allows to cycle the navigation of steps
  backButtonSupport: true, // Enable the back button support
  enableURLhash: true, // Enable selection of the step based on url hash
  enableFinishButton: false,
  transition: {
      animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
      easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
  },
  toolbarSettings: {
      toolbarPosition: 'bottom', // none, top, bottom, both
      toolbarButtonPosition: 'center', // left, right, center
      showNextButton: true, // show/hide a Next button
      showPreviousButton: true, // show/hide a Previous button
      toolbarExtraButtons: [btnFinish], // Extra buttons to show on toolbar, array of jQuery input/buttons elements
  },
  anchorSettings: {
      anchorClickable: true, // Enable/Disable anchor navigation
      enableAllAnchors: true, // Activates all anchors clickable all times
      markDoneStep: true, // Add done state on navigation
      markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
      enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
  },
  keyboardSettings: {
      keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
      keyLeft: [37], // Left key code
      keyRight: [39] // Right key code
  },
  lang: { // Language variables for button
      next: 'Sledeći korak',
      previous: 'Prethodni korak',
      finish: 'test'
  },
  disabledSteps: [], // Array Steps disabled
  errorSteps: [], // Highlight step with errors
  hiddenSteps: [] // Hidden steps
});

$("#smartwizard ").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
  var stepIndex = $('#smartwizard').smartWizard("getStepIndex");

  $(".btn-add-course").hide();
  if(stepIndex === 0) {
    $(".sw-btn-prev").hide();
  }else {
    $(".sw-btn-prev").show();
  }
  if(stepIndex === 2) {
    $(".sw-btn-next").hide();
    $(".btn-add-course").show();
  }else{
    $(".sw-btn-next").show();
  }

});

$("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {

      if(anchorObject.prevObject.length - 1 == nextStepIndex){

          $('#smartwizard').smartWizard({
              toolbarSettings: {
                  toolbarExtraButtons: [btnFinish] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
              },
            });
          }
    });
  </script>

  <!--edit course script -->

<script>

  var btnFinish = $('<input type="submit" class="btn btn-success btn-edit-course" value="Izmeni kurs">');


$('#smartwizard-edit').smartWizard({
  selected: 0, // Initial selected step, 0 = first step
  theme: 'progress', // theme for the wizard, related css need to include for other than default theme
  justified: true, // Nav menu justification. true/false
  darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
  autoAdjustHeight: true, // Automatically adjust content height
  cycleSteps: true, // Allows to cycle the navigation of steps
  backButtonSupport: true, // Enable the back button support
  enableURLhash: true, // Enable selection of the step based on url hash
  enableFinishButton: false,
  transition: {
      animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
      easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
  },
  toolbarSettings: {
      toolbarPosition: 'bottom', // none, top, bottom, both
      toolbarButtonPosition: 'center', // left, right, center
      showNextButton: true, // show/hide a Next button
      showPreviousButton: true, // show/hide a Previous button
      toolbarExtraButtons: [btnFinish], // Extra buttons to show on toolbar, array of jQuery input/buttons elements
  },
  anchorSettings: {
      anchorClickable: true, // Enable/Disable anchor navigation
      enableAllAnchors: true, // Activates all anchors clickable all times
      markDoneStep: true, // Add done state on navigation
      markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
      enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
  },
  keyboardSettings: {
      keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
      keyLeft: [37], // Left key code
      keyRight: [39] // Right key code
  },
  lang: { // Language variables for button
      next: 'Sledeći korak',
      previous: 'Prethodni korak',
      finish: 'test'
  },
  disabledSteps: [], // Array Steps disabled
  errorSteps: [], // Highlight step with errors
  hiddenSteps: [] // Hidden steps
});

$("#smartwizard-edit ").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
  var stepIndex = $('#smartwizard-edit').smartWizard("getStepIndex");

  $(".btn-edit-course").hide();
  if(stepIndex === 0) {
    $(".sw-btn-prev").hide();
  }else {
    $(".sw-btn-prev").show();
  }
  if(stepIndex === 2) {
    $(".sw-btn-next").hide();
    $(".btn-edit-course").show();
  }else{
    $(".sw-btn-next").show();
  }

});

$("#smartwizard-edit").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {

      if(anchorObject.prevObject.length - 1 == nextStepIndex){

          $('#smartwizard-edit').smartWizard({
              toolbarSettings: {
                  toolbarExtraButtons: [btnFinish] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
              },
            });
          }
    });
  </script>
  <script>
    $(function () {
    // Summernote
    $('.textarea').summernote()
  })

  $('select').selectpicker();

  </script>

</body>

</html>