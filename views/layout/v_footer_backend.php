</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Wardoyo Jaya Aki</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500,0).slideUp(500,function() {
    $(this).remove();
  });
 }, 3000)
</script>
</body>
</html>