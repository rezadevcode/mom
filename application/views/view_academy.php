<div id="content-wrapper">
    <div class="parallax-img position-relative">
        <div class="img"><img src="<?php echo base_url('assets/images/banner/'.$banner['image']) ?>" alt="" class="img-fluid"></div>
        <div class="overlay position-absolute w-100 h-100">
        <div class="txt text-center wow fadeInUp" data-wow-duration="2s"><?php echo $banner['title']; ?></div>
        </div>
    </div>
    <div class="content-center-wrapper py-5 bg-white position-relative">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="block py-5 position-relative">
                <div class="d-flex flex-column">
                <h2 class="title-section mb-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s"><?php echo $content[12]['title'] ?></h2>
                <div class="desc wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1s">
                <?php echo $content[12]['desc'] ?>
                </div>
                </div>
            </div>
            </div>
        </div>            
        </div>
    </div>
    <div class="bg-grey-wrapper py-5">
        <div class="container">
        <h1 class="title-section text-center pt-5 pb-5 wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">Program MoM Academy</h1>
        <div class="column-block">
            <div class="row">
                <?php 
                $count = 1;
                    foreach ($program as $value) {
                        echo '<div class="col-md-4">
                                <div class="block mb-5 wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.2s">
                                <div class="d-flex mb-3">
                                    <div class="no d-flex align-items-center justify-content-center text-center mr-3">'.$count.'</div>
                                    <div class="title d-flex align-items-center">'.$value['title'].'</div>
                                </div>
                                <div class="short-desc">
                                    '.$value['desc'].'
                                </div>
                                </div>
                            </div>';
                        $count++;
                    }
                ?>
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