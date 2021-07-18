  <!-- /.content-wrapper-->
  <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy;  <?php echo @$data['site_title']; ?> <?php echo date('Y'); ?></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo WEB_ROOT. 'admin-panel/account/logout.php'; ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <?php if(isset($data['css'])) : ?>
        <?php foreach ($data['js'] as $key => $js) { ?>
        <script src="assets/<?php echo $js; ?>"></script>
        <?php } ?>
    <?php endif; ?>
    <?php if (isset($data['page'])) if (file_exists('pages/js/'. $data['page'] .'_js.php')) include('pages/js/'. $data['page'] .'_js.php');?>	
  </div>
</body>

</html>