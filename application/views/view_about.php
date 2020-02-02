<div class="container-fluid top-banner">
    <?php if($about_intro[0]['image'] != '') { ?>
    <div class="bg-img img-responsive" style="height:400px;background-position: center;background-size: 100%;background-repeat: no-repeat;background-attachment: fixed;background-image: url(<?php echo base_url('assets/images/about/'.$about_intro[0]['image']) ?>)"></div>
    <?php } ?>
</div>
<div class="container">
    <div class="row">
    <div class="col-md-24 WrapTitle">
        <div class="MainTitle">
            <h1><span>Our</span>Commitment</h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-24">
        <?php if($about_intro[0]['text'] != '') { ?>
        <?php echo $about_intro[0]['text'] ?>
        <?php } ?>
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-24 WrapTitle">
        <div class="IconTitle"><img src="<?php echo base_url('assets/images/icon-team.png') ?>" alt=""></div>
        <div class="MainTitle">
            <h1><span>Our</span>OUR PEOPLEs</h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-24 TeamMember">
        <div class="row">
            <?php if($about_people) {
                foreach($about_people as $row) {
                    ?>
                    <div class="col-md-6 col-5">
                        <div class="TeamWrap">
                        <img src="<?php echo base_url('assets/images/about/'.$row['image']) ?>" alt="" class="img-responsive">
                        <div class="TeamOverlay">
                            <div class="TeamCaption"><span class="TeamName"><?php echo $row['name'] ?></span> <span class="TeamTitle"><?php echo $row['position'] ?></span></div>
                        </div>
                        </div>
                    </div>
                    <?php
                }
            } ?>
            
            
        </div>
    </div>
    </div>
</div>