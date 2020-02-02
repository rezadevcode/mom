<section class="ClientsPage">
    <div class="container">
        <div class="row">
        <div class="col-md-24 WrapTitle">
            <div class="IconTitle"><img src="<?php echo base_url('assets/images/icon-client.png') ?>" alt=""></div>
            <div class="MainTitle">
                <h1><span>Our</span>Client</h1>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-24 clientlogo">
            <div class="row">
                <?php if($client_icon) {
                    foreach($client_icon as $row) {
                        ?>
                        <div class="col-md-3 col-xs-8 ClientLogoWrap">
                            <div class="ClientLogo"><img src="<?php echo base_url('assets/images/client/'.$row['image']) ?>" alt="<?php echo $row['image'] ?>" class="img-responsive"></div>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-20 col-md-offset-2 clientlist">
            <div class="row">

                <?php
                $count_client_list = ($client_list)? count($client_list): 0;
                $flag_i = floor($count_client_list / 2);
                $sisa = $count_client_list % 2;
                $counter_sisa = $sisa;
                ?>
                <?php
                if($client_list) {
                    $start=1;
                    for($i=0;$i<2;$i++) {
                    ?>
                    <div class="col-md-12">
                        <ul class="squarelist">
                        <?php for($j=$start;$j<=count($client_list);$j++) { ?>
                            <li><?php echo $client_list[$j-1]['name'] ?></li>
                            <?php 
                              if(($j % $flag_i)==0) {
                                 if($sisa == 1 && $counter_sisa == 1) {
                                    echo '<li>'.$client_list[$j]['name'].'</li>';
                                    $start = $j+2;
                                    $counter_sisa--;
                                 } elseif($sisa == 1 && $counter_sisa == 0) {
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
</section>