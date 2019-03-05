<!DOCTYPE html>
<html lang="lt">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
  <div class="d-flex" id="wrapper">
      <?php include "sidebar.view.php"; ?>
      <!--/#sidebar-wrapper-->
      <div id="page-content-wrapper">
   <?php include "nav.view.php"; ?>
      <div class="container-fluid">
        <h1 class="mt-4"><?=$siteTitle; ?></h1>

          <?php include $includePath; ?>

      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="./vendor/jquery/jquery.min.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
  </script>

</body>

</html>


