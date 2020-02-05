<section class="ProjectBanner">
   <div class="container-fluid slickable HomeSlider" data-slick='{
      "dots": true,             
      "autopla": true,
      "autoplaySpeed": 5000,
      "arrows": true,   
      "infinite": false,
      "prevArrow": "<div class=\"prev\"><img src=\"<?php echo base_url('assets/images/popprev.png') ?>\"></div>",
      "nextArrow": "<div class=\"next\"><img src=\"<?php echo base_url('assets/images/popnext.png') ?>\"></div>"}'>
      <?php if($slideshow) {
         foreach($slideshow as $row) {
            ?>
            <div class="item">
               <!--<div class="img-fill">-->
                   <div class="bg-img img-responsive" style="    height: 400px;
    background-position: center;
    background-size: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;background-image:url(<?php echo base_url('assets/images/slideshow/'.$row['image']) ?>)"></div>
                   
            <!--</div>-->
            <?php
         }
      } ?>
   </div>
</section>

<div class="container">
   <div class="row">
      <div class="col-md-24 WrapTitle">
         <div class="IconTitle"><img src="<?php echo base_url('assets/images/icon-project.png') ?>" alt=""></div>
         <div class="MainTitle">
            <h1><span>Our</span>Project</h1>
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</div>

<section class="masonry">
   <div class="container-fluid">
      <div class="row letsgrid" id="Parent">
         <?php if($project) {
            foreach($project as $row) {
               ?>
               <div class="letsgrid__item box <?php echo $row['category_slug'] ?>">
                  <a href="<?php echo base_url('assets/images/project/'.$row['image']) ?>" class="thumbnail" data-lightbox="project" data-title="<?php echo strip_tags($row['text']) ?>">
                     <div class="thumb-overlay"><span><?php echo $row['title'] ?></span></div>
                     <img src="<?php echo base_url('assets/images/project/'.$row['image']) ?>">
                  </a>
               </div>
               <?php
            }
         } ?>
      </div>
      <div class="col-md-24 text-center">
		<a href="javascript:void(0)" page="2" category="all" class="btn btnmore project-more btn-all" style="display: inline-block">see More</a>
		<?php if($category) { ?>
		<?php foreach($category as $key => $value) { ?>
		<a href="javascript:void(0)" page="1" category="<?php echo $value['slug'] ?>" class="btn btnmore project-more btn-<?php echo $value['slug'] ?>" style="display: none">see More</a>
		<?php } ?>
		<?php } ?>
	  </div>
   </div>
</section>

<?php if($category) { ?>
   <div class="floatfilter">
      <button class="active btn" id="all">All</button>
      <?php foreach($category as $key => $value) { ?>
         <button class="btn" id="<?php echo $value['slug'] ?>"><?php echo $value['name'] ?></button>
      <?php } ?>
   </div>
<?php } ?>
