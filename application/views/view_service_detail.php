<div id="content-wrapper">
	<div class="page-detail-wrapper mt-3 mb-5 pt-3 pb-5">
		<div class="container">
			<div class="row">
				<div class="column-left-wrapper col-md-4 col-12">
					<div class="column-left border rounded p-4">
						<div class="profile-wrapper text-center">
						<?php 
							if (!empty($result[0]['member_img'])) {
								echo '<div class="img mb-3"><img src="'. base_url('assets/images/member/'.$result[0]['member_img']).'" alt="" class="img-fluid"></div>';
							}else if(!empty($result[0]['image_service'])){
								echo '<div class="img mb-3"><img src="'. base_url('assets/images/member_service/'.$result[0]['image_service'][0]['image']).'" alt="" class="img-fluid"></div>';
							}else{
								echo '<div class="img mb-3"><img src="'. base_url('assets/images/no-image.png').'" alt="" class="img-fluid" width="200"></div>';
							}
						?>
						
						<div class="nama mb-2"><?php echo $result[0]['name'] ?></div>
						<div class="bio mb-4"><?php echo $result[0]['category'] ?></div>
						</div>
						<div class="about-wrapper border-top pt-3 mt-3">
						<h4>About</h4>
						<?php echo $result[0]['about'] ?>
						<div class="text-center price mt-5 mb-4"><h4>Rp. <?php echo number_format($result[0]['price'],0,'.','.')?>,-</h4></div>
						<div class="order text-center"><a href="#" class="py-3 btn">order now</a></div>
						</div>
					</div>
				</div>
				<div class="column-right-wrapper col-md-8 col-12">
				<div class="column-right border">
					<div class="slider slider-single">
						<?php
							if(!empty($result[0]['image_service'])){
								foreach ($result[0]['image_service'] as $row) {
									echo '<div class="imgs"><img src="'.base_url('assets/images/member_service/'.$row['image']).'" alt="" class="img-fluid"></div>';
								}
							}
						?>
					</div>
					<div class="container">
						<div class="column-box px-3">
							<div class="slider slider-nav mb-5">
							<?php
								if(!empty($result[0]['image_service'])){
									foreach ($result[0]['image_service'] as $row) {
										echo '<div class="thumb-img"><img src="'.base_url('assets/images/member_service/'.$row['image']).'" alt="" class="img-fluid"></div>';
									}
								}
							?>
							</div>
							<h4 class="mb-5 titlex">Service Description</h4>
							<?php echo $result[0]['desc'] ?>
						</div>
					</div>                
				</div>
				</div>
			</div>
		</div>
	</div>
	<div class="before-footer-wrapper position-relative">
		<div class="bg-img"><img src="<?php echo base_url('assets/images/footer-banner.jpg') ?>" alt="" class="img-fluid w-100"></div>
		<div class="overlay text-center position-absolute w-100 h-100">
		<div class="tag">join with us</div>
		<div class="title">Anda tertarik dengan kami? Gabung sekarang juga.</div>
		<div class="menu-act my-4">
			<div class="d-flex justify-content-center">
			<div class="column wow fadeInLeft"><a data-target="#registPopUp" data-toggle="modal" class="btn bg-white px-4">Register Here</a></div>
			<div class="column wow fadeInRight"><a href="https://wa.me/6281381532383" class="btn bg-none px-4" target="_blank">Contact Us</a></div>
			</div>
		</div>
		</div>
	</div>
</div>