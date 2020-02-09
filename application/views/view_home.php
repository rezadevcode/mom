<div id="content-wrapper">
	<div class="slide-banner">
		<div class="block position-relative">
		<div class="img"><img src="<?php echo base_url('assets/images/banner/'.$banner['image']) ?>" alt="" class="img-fluid w-100 home-postiotn1"></div>
		<div class="floating-column home-float position-absolute w-100">
			<div class="container">
			<div class="row">
				<div class="col-md-7 col-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
					<?php echo $banner['caption']; ?>
				</div>
			</div>
			</div>
		</div>            
		</div>
	</div>
	<div class="sponsor text-center py-4">
		<div class="container">
		<div class="sponsor-slide-wrapper wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="slider sponsor-slider">
				<?php 
					foreach ($sponsore as $value) {
						echo '<div class="column"><img src="assets/images/sponsor/'.$value['image'].'" alt="" class="img-fluid"></div>';
					}
				?>
			</div>
		</div>
		</div>
	</div>
	<div class="home-about-wrapper py-5">
		<div class="container py-5">
		<div class="row w-100">
			<div class="column-left col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
			<div class="tag-section">About us</div>
			<h2 class="title-section"><?php echo $content[1]['title'] ?></h2>  
			<div class="desc my-3">
			<?php echo $content[1]['desc'] ?>
			</div>
			<div class="more-section"><a href="#" class="hvr-float-shadow">more information <i class="fas fa-angle-right"></i></a></div>
			</div>
			<div class="column-right col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">
			<div class="img-column position-relative">
				<div class="img-pattern position-absolute"><img src="<?php echo base_url('assets/images/content'.$content[1]['image']) ?>" alt="" class="img-fluid"></div>
				<div class="img"><img src="<?php echo base_url('assets/images/home-1.jpg') ?>" alt="" class="img-fluid pr-4 pt-5"></div>
			</div>                
			</div>
		</div>
		</div>
	</div>
	<div class="home-service-wrapper py-5">
		<div class="container">
		<div class="title-section text-center text-capitalize">our services</div>            
		<div class="column-list my-5">
			<div class="row">
				<?php 
					foreach ($service as $row) {
						echo '<div class="columns col-md-4 col-12 wow fadeInUp mb-5" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="block p-5 mb-3 hvr-float-shadow h-100">
						<a href="'.$row['link'].'" target="_blank" class="position-relative h-100">
							<div class="row mb-3">
							<div class="icon col-md-3"><img src="assets/images/content/'.$row['image'].'" alt="" class="img-fluid"></div>
							<div class="name col-md-9 d-flex align-items-center">'.$row['title'].'</div>
							</div>
							<div class="short-desc">
							'.$row['desc'].'
							</div>
							<div class="button position-absolute w-100">
							<button class="btn text-white w-100 text-uppercase">Hubungi Kami</button>
							</div>
						</a>
						</div>
					</div>';
					}
				?>
			</div>
		</div>
		</div>
	</div>
	<div class="home-academy-wrapper py-5">
		<div class="container position-relative column-academy py-5">
		<div class="row">
			<div class="col-md-6 pt-md-5 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.4s">
			<div class="tag-section">mom academy</div>
			<h2 class="title-section"><?php echo $content[3]['title'] ?></h2>
			<div class="desc my-3">
			<?php echo $content[3]['desc'] ?>

			</div>
			<div class="more-section mt-5"><a href="#" class="hvr-float-shadow">more information <i class="fas fa-angle-right"></i></a></div>
			</div>
			<div class="col-md-6 wow fadeInRight pt-md-5 mt-md-5" data-wow-duration="2s" data-wow-delay="0.4s">
			<div class="slider multiple-items pb-5">
				<?php
					foreach ($slideshow as $row) {
						echo '<div>
								<img src="assets/images/slideshow/'.$row['image'].'" alt="" class="img-fluid">
							</div>';
					}
				?>
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="home-portfolio-wrapper py-5">
		<div class="container py-5">
		<div class="row">
			<div class="column-left col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.5s">
			<div class="img-first position-relative">
				<div class="d-flex">
				<div class="img col mb-3"><img src="<?php echo base_url('assets/images/event-1.jpg') ?>" alt="" class="img-fluid"></div>
				<div class="img col mb-3"><img src="<?php echo base_url('assets/images/event-2.jpg') ?>" alt="" class="img-fluid"></div>
				</div>
			</div>
			<div class="img-second position-relative">
				<div class="d-flex">
				<div class="img col"><img src="<?php echo base_url('assets/images/event-3.jpg') ?>" alt="" class="img-fluid"></div>
				<div class="img col"><img src="<?php echo base_url('assets/images/event-4.jpg') ?>" alt="" class="img-fluid"></div>
				</div>
			</div>
			</div>
			<div class="column-right col-md-6 pl-md-5 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.5s">
			<div class="block pl-md-5">
				<div class="tag-section">MoM Project</div>
				<h2 class="title-section"><?php echo $content[2]['title'] ?></h2>
				<div class="desc my-3">
					<?php echo $content[2]['desc'] ?>
				</div>
				<div class="more-section mt-5"><a href="#" class="hvr-float-shadow">more information <i class="fas fa-angle-right"></i></a></div>
			</div>                
			</div>
		</div>
		</div>
	</div>
	<div class="before-footer-wrapper position-relative">
		<div class="bg-img"><img src="<?php echo base_url('assets/images/footer-banner.jpg') ?>" alt="" class="img-fluid w-100"></div>
		<div class="overlay text-center position-absolute w-100 h-100">
		<div class="tag wow fadeInUp">join with us</div>
		<div class="title wow fadeInUp">Anda tertarik dengan kami? Gabung sekarang juga.</div>
		<div class="menu-act my-4">
			<div class="d-flex justify-content-center">
			<div class="column wow fadeInLeft"><a data-target="#registPopUp" data-toggle="modal" class="btn bg-white px-4">Register Here</a></div>
			<div class="column wow fadeInRight"><a href="https://wa.me/6281381532383" class="btn bg-none px-4" target="_blank">Contact Us</a></div>
			</div>
		</div>
		</div>
	</div>
</div>