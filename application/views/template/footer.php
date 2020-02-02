<footer>
   <div class="container footer-bg">
      <div class="row">
         <div class="col-md-12 center-bg"><img src="<?php echo base_url('assets/images/'.$logo) ?>" alt="" class="footer-logo"></div>
         <div class="col-md-12 blackbg">
            <div class="footer-address"><?php echo strip_tags($footer, '<br>'); ?></div>
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="container">
         <div class="row">
            <div class="col-md-24 copyright">&copy; Protindo <?php echo date('Y') ?>. ALL RIGHTS RESERVED.</div>
         </div>
      </div>
   </div>
</footer>
<script>
!function(e,a,t,n,g,c){e.GoogleAnalyticsObject=n,e.ga||(e.ga=function(){(e.ga.q=e.ga.q||[]).push(arguments)}),e.ga.l=+new Date,g=a.createElement(t),c=a.getElementsByTagName(t)[0],g.src="https://www.google-analytics.com/analytics.js",c.parentNode.insertBefore(g,c)}(window,document,"script","ga"),ga("create","UA-XXXXX-X"),ga("send","pageview")
</script>
<script src="<?php echo base_url('assets/scripts/vendor.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/plugins.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/main.js') ?>"></script>

<script>

	$('.floatfilter button').click(function(){
		id = $(this).attr('id');
		
		page = parseInt($('.btn-'+id).attr('page'));
		category = $('.btn-'+id).attr('category');

		$.ajax({
			type: "POST",
			url: "<?php echo base_url('project/page') ?>",
			data: {
			 page: page,
			 category: category
			},
			cache: false,
			success: function (html) {
				if (html.length > 0) {
				   var el = $(html);
				   $("#Parent").find('.box').remove();
				   $("#Parent").append(el).masonry( 'appended', el, true );
				}
			}
		});

		$('.btn-'+category).attr('page', page+1);

		$('.project-more').css('display', 'none');
		setTimeout(function(){
			if($("#Parent").find('.box').length >= page*8) {
				$('.btn-'+category).css('display', 'inline-block');
			}
		}, 3000);
		
	});
	

   $('.project-more').click(function(){
      page = parseInt($(this).attr('page'));
	  category = $(this).attr('category');

      $.ajax({
         type: "POST",
         url: "<?php echo base_url('project/page') ?>",
		 data: {
			 page: page,
			 category: category
		 },
         cache: false,
         success: function (html) {
            if (html.length > 0) {
               var el = $(html);
			   $("#Parent").find('.box').remove();
               $("#Parent").append(el).masonry( 'appended', el, true );
            }
         }
      });
	  
	  $('.btn-'+category).attr('page', page+1);
	  
	  $('.project-more').css('display', 'none');
	  setTimeout(function(){
			if($("#Parent").find('.box').length >= page*16) {
				$('.btn-'+category).css('display', 'inline-block');
			}
		}, 3000);
   });
</script>