<!-- <script src="<?php echo base_url();?>assets/home/js/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datetimepicker/bootstrap-datetimepicker.js"></script>

<!-- plugins -->
<script src="<?php echo base_url(); ?>assets/js/vendors.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="<?php echo base_url();?>assets/home/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/popper.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/home/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url();?>assets/home/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/jquery.stellar.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/scrollax.min.js"></script>
<script src="<?php echo base_url();?>assets/home/toastr/build/toastr.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.myslider').owlCarousel({
      items:1,
      nav: false,
      dots: true,
      autoplay:true,
      loop:true,
    });
    $(".search-box").hide();
    $(".openSearchbox").click(function(){
      $(".menusBar").hide();
      $(".search-box").fadeIn();
    });
    $(".close-search-box").click(function(){
      $(".search-box").hide();
      $(".menusBar").fadeIn();
    });
  });
</script>