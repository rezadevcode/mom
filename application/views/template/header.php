<?php
  $uri = $this->uri->segment(1);
?>
<div id="header">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light p-md-0 px-0">
            <div class="row">
                <div class="col-md-2 col-12">
                    <div class="h-100 d-none d-sm-block">
                    <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images/logo.png') ?>" alt="" class="img-fluid"></a>
                    </div>                
                    <div class="top-mobile d-block d-sm-none">
                    <a class="navbar-brand w-100" href="#"><img src="<?php echo base_url('assets/images/logo.png') ?>" alt="" class="img-fluid w-50"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    </div>
                </div>
                <div class="col-md-7 pr-md-0">
                    <div class="collapse navbar-collapse content-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item <?php echo $uri == '' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php echo $uri == 'about' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url('about') ?>">About</a>
                        </li>
                        <li class="nav-item <?php echo $uri == 'service' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url('service') ?>">Service</a>
                        </li>
                        <li class="nav-item <?php echo $uri == 'mom-academy' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url('mom-academy') ?>">MOM Academy</a>
                        </li>
                        <li class="nav-item <?php echo $uri == 'mom-project' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url('mom-project') ?>">MoM Project</a>
                        </li>
                        <li class="d-block d-sm-none nav-item"><a data-toggle="modal" data-target="#loginPopUp" class="nav-link text-capitalize">sign in</a></li>
                        <li class="d-block d-sm-none nav-item"><a data-toggle="modal" data-target="#registPopUp" class="nav-link text-capitalize">join</a></li class="d-block d-sm-none nav-item">
                    </ul>
                    </div>
                </div>
                <div class="col-md-3 d-none d-sm-block">
                    <div class="act-right d-flex mt-3">
                    <ul class="w-100 d-flex justify-content-between">
                        <?php
                            if(!empty($this->session->userdata('member_logged_in'))){
                                echo '<li><a class="btn bg-white">Hi, '.$this->session->userdata('member_data').'</a></li>';
                                echo '<li><a class="btn bg-white" href="'.base_url('signout').'">Signout</a></li>';
                            }else{
                                echo '<li><a data-toggle="modal" data-target="#loginPopUp" class="btn bg-white">sign in</a></li>
                                     <li><a data-toggle="modal" data-target="#registPopUp" class="btn bg-orange">join</a></li>';
                            }
                        ?>
                    </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>