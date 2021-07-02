<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("_partials/head.php"); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("_partials/sidebar.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("_partials/topbar.php"); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading --> 
          <!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1> -->
          <?php $this->load->view($content); ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("_partials/footer.php"); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("_partials/scrolltop.php"); ?>

  <!-- Logout Modal-->
  <?php $this->load->view("_partials/modal.php"); ?>

  <!-- Bootstrap core & JavaScript-->
  <?php $this->load->view("_partials/js.php"); ?>
  <script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();	
		$('.form-control-chosen').chosen({
		  // Chosen options here
		  allow_single_deselect: true
		  
		});
		$(":input").inputmask();		
	})
</script>
</body>

</html>