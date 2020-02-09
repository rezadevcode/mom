<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('member') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Profile</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('member/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('member/member') ?>">Profile</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
            if ($this->session->userdata('slideshow_success')) {
                echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('slideshow_success') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
                $this->session->unset_userdata('slideshow_success');
            }
            if ($this->session->userdata('slideshow_error')) {
                echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . $this->session->userdata('slideshow_error') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
                $this->session->unset_userdata('slideshow_error');
            }
            if ($this->session->userdata('error_password')) {
                echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . $this->session->userdata('error_password') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
                $this->session->unset_userdata('error_password');
            }
            if(validation_errors()){
                echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . validation_errors() . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Profile</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('member/profile/edit_password') ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="old_password" placeholder="Old Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" placeholder="New Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="passconf" placeholder="Confirm Password" class="form-control">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>