<section class="FullHomeBanner">
   <div class="mouse"><img src="<?php echo base_url('assets/images/mouse.png') ?>" alt=""></div>
   <div class="container-fluid slickable HomeSlider" data-slick='{
      "dots": true,             
      "autopla": true,
      "autoplaySpeed": 5000,
      "arrows": true,   
      "infinite": false,
      "prevArrow": "<div class=\"prev\"><img src=\"<?php echo base_url('assets/images/popprev.png') ?>\"></div>",
      "nextArrow": "<div class=\"next\"><img src=\"<?php echo base_url('assets/images/popnext.png') ?>\"></div>"}'>

      <?php if($slideshow) {
         foreach ($slideshow as $key => $value) {
            ?>
            <div class="item">
               <div class="img-fill">
                  <img src="<?php echo base_url('assets/images/slideshow/'.$value['image']) ?>" alt="">
                  <div class="infoCaption">
                     <div class="BigCaption"><?php echo str_replace('p>', 'span>', $value['text_left']) ?></div>
                     <div class="CaptionSeparator"></div>
                     <div class="SmallCaption"><?php echo strip_tags($value['text_right']) ?></div>
                  </div>
               </div>
            </div>
            <?php
         }
      } ?>

   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-md-24 HomeIntro">
         <?php echo $intro[0]['text'] ?>
      </div>
      <div class="col-md-24 WrapTitle">
         <div class="MainTitle">
            <h1><span>Our</span>Service</h1>
         </div>
         <div class="clearfix"></div>
      </div>
      <div class="col-md-24">
         <?php echo $service_intro[0]['text'] ?>
      </div>
   </div>
   <div class="row">
      <?php if($service_list) {
         foreach($service_list as $row) {
            ?>
            <div class="col-md-8 HomeThreeCol">
               <img src="<?php echo base_url('assets/images/service/'.$row['image']) ?>" alt="" class="img-responsive">
               <h2><?php echo $row['title'] ?></h2>
               <div class="separator"></div>
               <?php echo $row['text'] ?>
            </div>
            <?php
         }
      } ?>
   </div>
</div>
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
      <div class="row letsgrid">
         <?php if($project) {
            foreach ($project as $key => $value) {
               ?>
               <div class="letsgrid__item">
                  <a href="<?php echo base_url('assets/images/project/'.$value['image']) ?>" class="thumbnail" data-lightbox="project" data-title="<?php echo strip_tags($value['text']) ?>">
                     <div class="thumb-overlay"><span><?php echo $value['title'] ?></span></div>
                     <img src="<?php echo base_url('assets/images/project/'.$value['image']) ?>">
                  </a>
               </div>
               <?php
            }
         } ?>
      </div>
      <div class="col-md-24 text-center"><a href="<?php echo base_url('project') ?>" class="btn btnmore">see More</a></div>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-md-24 WrapTitle">
         <div class="IconTitle"><img src="<?php echo base_url('assets/images/icon-client.png') ?>" alt=""></div>
         <div class="MainTitle">
            <h1><span>Our</span>Client</h1>
         </div>
         <div class="clearfix"></div>
      </div>
      <div class="col-md-24 clientlisthome">
         <div class="row">
            <?php
            $count_client_list = ($client_list)? count($client_list): 0;
            $flag_i = floor($count_client_list / 4);
            $sisa = $count_client_list % 4;
            $counter_sisa = $sisa;
            ?>
            <?php //echo $flag_i ?>
            <?php
            if($client_list) {
               $start=1;
               for($i=0;$i<4;$i++) {
                  ?>
                  <div class="col-md-6">
                     <ul class="squarelist">
                        <?php for($j=$start;$j<=count($client_list);$j++) { ?>
                           <li><?php echo $client_list[$j-1]['name'] ?></li>
                           <?php 
                              if(($j % $flag_i)==0) {
                                 if($sisa == 3 && $counter_sisa == 3) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    $start = $j+2;
                                    $counter_sisa--;
                                 }elseif($sisa == 3 && $counter_sisa == 2) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+1]['name'].'</li>';
                                    $start = $j+3;
                                    $counter_sisa--;
                                 }elseif($sisa == 3 && $counter_sisa == 1 || $sisa == 3 && $counter_sisa == 0) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+1]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+2]['name'].'</li>';
                                    $start = $j+4;
                                    $counter_sisa--;
                                 }

                                 if($sisa == 2 && $counter_sisa == 2) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    $start = $j+2;
                                    $counter_sisa--;
                                 } elseif($sisa == 2 && $counter_sisa == 1) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+1]['name'].'</li>';
                                    $start = $j+3;
                                    $counter_sisa--;
                                 } elseif($sisa == 2 && $counter_sisa == 0) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+1]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+2]['name'].'</li>';
                                    $start = $j+4;
                                    $counter_sisa--;
                                 } elseif($sisa == 2 && $counter_sisa == -1) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+1]['name'].'</li>';
                                    $start = $j+2;
                                    $counter_sisa--;
                                 }

                                 if($sisa == 1 && $counter_sisa == 1) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    $start = $j+2;
                                    $counter_sisa--;
                                 } elseif($sisa == 1 && $counter_sisa == 0) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+1]['name'].'</li>';
                                    $start = $j+3;
                                    $counter_sisa--;
                                 } elseif($sisa == 1 && $counter_sisa == -1) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+1]['name'].'</li>';
                                    echo '<li>'.$client_list[$j+2]['name'].'</li>';
                                    $start = $j+4;
                                    $counter_sisa--;
                                 } elseif($sisa == 1 && $counter_sisa == -2) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    $start = $j+2;
                                    $counter_sisa--;
                                 }

                                 if($sisa == 0) {
                                    $start = $j+1;
                                 }
                                 break;
                              }
                           ?>
                        <?php } ?>
                     </ul>
                  </div>
                  <?php
               }
            }
            ?> 
         </div>
      </div>
   </div>
</div>