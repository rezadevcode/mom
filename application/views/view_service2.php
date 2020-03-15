<?php
  if (isset($active)) {
      $active = $active;
  }else{
    $active = '';
  }
?>
<div id="content-wrapper">
        <div class="search-page-result">
            <div class="search-form border-bottom">
                <form action="<?php echo base_url('service-result/search') ?>" class="p-5" method="GET">
                    <input name="q" type="text" class="form-control text-center" placeholder="Search the best talent...">
                </form>
            </div>
            <div class="category-menus border-bottom py-3">
              <ul>
                <li class="<?php echo $active == '' ? 'active' : '' ?> "><a href="<?php echo base_url('service-result') ?>">All Service</a></li>
                <li class="<?php echo $active == 'community marketing' ? 'active' : '' ?>"><a href="<?php echo base_url('service-result/search?q=community marketing') ?>">Community Marketing</a></li>
                <li class="<?php echo $active == 'community management' ? 'active' : '' ?>"><a href="<?php echo base_url('service-result/search?q=community management') ?>">Community Management</a></li>
                <li class="<?php echo $active == 'community collaboration' ? 'active' : '' ?>"><a href="<?php echo base_url('service-result/search?q=community collaboration') ?>">Community Collaboration</a></li>
                <li class="<?php echo $active == 'talent management' ? 'active' : '' ?>"><a href="<?php echo base_url('service-result/search?q=talent management') ?>">Talent Management</a></li>
                <li class="<?php echo $active == 'training workshop' ? 'active' : '' ?>"><a href="<?php echo base_url('service-result/search?q=training workshop') ?>">Training & Workshop</a></li>
              </ul>
            </div>
            <div class="search-body">
              <div class="container">                
                <div class="after-category-top py-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-0"><?php echo $count_member; ?> profiles with <?php echo $count_service; ?> services found from selected filter</p>
                        <!-- <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Sort by
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#" data-value="action">Action</a></li>
                              <li><a href="#" data-value="another action">Another action</a></li>
                              <li><a href="#" data-value="something else here">Something else here</a></li>
                              <li><a href="#" data-value="separated link">Separated link</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="result-column-wrapper">
                    <div class="row">
                        <?php
                            if (!empty($content)) {
                                foreach ($content as $row) { ?>
                                    <div class="col-md-3">
                                        <div class="block mb-4">
                                            <a href="<?php echo base_url('service-result/detail/'.$row['id']) ?>">
                                                <div class="img" style="max-height: 170px;
                                                overflow: hidden;">
                                                <?php
                                                    echo (!empty($row['image_service'])) ? '<img src="'.base_url('assets/images/member_service/'.$row['image_service'][0]['image']).'" alt="" class="img-fluid">' : '<img src="'.base_url('assets/images/no_image.jpg').'" alt="" class="img-fluid">';
                                                echo '</div>
                                                <div class="after-img border p-3">
                                                    <div class="name">'.word_limiter($row['name'],2).'</div>
                                                    <div class="job">'.$row['category'].'</div>
                                                    <div class="price">Rp. '.number_format($row['price'],0,'.','.').',-</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>';     
                                }
                            }
                        ?>
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