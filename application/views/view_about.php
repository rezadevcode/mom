<div id="content-wrapper">
      <div class="slide-banner">
          <div class="block position-relative">
            <div class="img">
              <!-- <video id="my-player" class="video-js vjs-default-skin vjs-big-play-centered" controls>
                <source src="video/video.mp4" type="video/mp4">
              </video> -->
              <video id="my-player" class="video-js vjs-default-skin vjs-big-play-centered h-100 w-100"
              controls>
                <source src="<?php echo base_url('assets/video/video.mp4') ?>" type='video/mp4'>
                <source src=""<?php echo base_url('assets/video/video.ogg') ?>" type="video/ogg">
                <source src=""<?php echo base_url('assets/video/video.webm') ?>" type="video/webm">
              </video>
            </div>
          </div>            
      </div>
    <div class="home-about-wrapper py-5">
      <div class="container py-5 border-bottom">
        <div class="row w-100">
          <div class="column-left col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
            <div class="tag-section">Our Story</div>
            <h2 class="title-section"><?php echo $content[6]['title'] ?></h2>  
          </div>
          <div class="column-right col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
            <div class="desc my-4">
                <?php echo $content[6]['desc'] ?>
            </div>            
          </div>
        </div>
      </div>
    </div>
    <div class="milestone-wrapper text-center py-5 d-none">
		<div class="container">
            <div class="tag-section wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">Our Progress</div>
            <h2 class="title-section mb-5 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"><?php echo $content[15]['title'] ?></h2>
            <div class="desc wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s"><?php echo $content[15]['desc'] ?></div>
            <div class="milestone mt-5">
                <ul class="timeline">
					<?php 
						$x = 20;
						foreach ($milestone as $row) {
							if ($x % 2 == 0) {
								echo '<li>
										<div class="timeline-badge"></div>
										<div class="timeline-panel text-left wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.6s">
											<div class="timeline-heading">
												<h4 class="timeline-title">'.$row['title'].'</h4>
											</div>
											<div class="timeline-body">
											'.$row['desc'].'
											</div>
										</div>
									</li>';
							}else{
								echo '<li class="timeline-inverted">
										<div class="timeline-badge"></div>
										<div class="timeline-panel text-right wow slideInRight" data-wow-duration="2s" data-wow-delay="0.8s">
											<div class="timeline-heading">
												<h4 class="timeline-title">'.$row['title'].'</h4>
											</div>
											<div class="timeline-body">
											'.$row['desc'].'
											</div>
										</div>
									</li>';
							}
							
							$x++;
						}
					?>
                </ul>
            </div>
          </div>
        </div>
        <div class="home-about-wrapper py-5 d-none">
          <div class="container position-relative column-academy py-5 border-top">
            <div class="row w-100 pt-4">
                <div class="column-left col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1.4s">
                  <div class="tag-section">Our Value</div>
                  <h2 class="title-section"><?php echo $content[14]['title'] ?></h2>  
                </div>
                <div class="column-right col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-delay="1.6s">
                  <div class="desc my-4">
                    <?php echo $content[14]['desc'] ?> 
                  </div>            
                </div>
              </div>
          </div>
        </div>
    <div class="bg-grey-wrapper py-5 text-center">
        <div class="container position-relative column-academy py-5">
          <div class="pt-md-5">
            <div class="tag-section wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">Team</div>
            <h2 class="title-section wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">Our Great Team</h2>
          </div>
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="team-list my-3 py-3">
                  	<div class="row">
						<?php 
							foreach ($team as $row) {
								echo '<div class="col-md-4 col-12">
										<div class="block mb-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">
											<div class="img"><img src="assets/images/team/'.$row['image'].'" alt="" class="img-fluid"></div>
											<div class="txt-bottom py-3">
												<div class="name">'.$row['title'].'</div>
												<div class="position py-2">'.$row['position'].'</div>
												<div class="sosmed">
												<ul class="m-0 d-flex align-items-center justify-content-center">
													<li><a href="'.$row['ig_link'].'" target="_blank" class="hvr-push"><i class="fab fa-instagram"></i></a></li>
													<li><a href="'.$row['wa_link'].'" target="_blank" class="hvr-push"><i class="fab fa-whatsapp"></i></a></li>
												</ul>
												</div>
											</div>
										</div>
									</div>';
							}
						?>
                  	</div>
              </div>
              </div>
            </div>
        </div>
      </div>
      <div class="before-footer-wrapper position-relative">
      <div class="bg-img"><img src="<?php echo base_url('assets/images/footer-banner.jpg') ?>" alt="" class="img-fluid w-100"></div>
      <div class="overlay text-center position-absolute w-100 h-100">
        <div class="tag wow fadeInUp">join with us</div>
        <div class="title wow fadeInUp">Ingin bergabung dengan <br> Mothers on Mission?</div>
        <div class="menu-act my-4">
          <div class="d-flex justify-content-center">
          <div class="column wow fadeInLeft"><a data-target="#registPopUp" data-toggle="modal" class="btn bg-white px-4">Daftar Sekarang</a></div>
          <div class="column wow fadeInRight d-none"><a href="https://wa.me/6281381532383" class="btn bg-none px-4" target="_blank">Contact Us</a></div>
          </div>
        </div>
      </div>
    </div>
</div>