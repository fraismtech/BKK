<script src="<?php echo base_url();?>assets/home/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/home/js/bootstrap.min.js"></script>
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