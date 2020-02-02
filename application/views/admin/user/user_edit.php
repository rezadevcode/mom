<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-user" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo base_url('admin/user') ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1>Users</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/user') ?>">Users</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit User</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url('admin/user/update') ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
                    <input type="hidden" name="user_id" value="<?php echo $user[0]['user_id'] ?>">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-data" data-toggle="tab">Data</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="tab-data">
                            <div class="form-group required <?php if($this->session->userdata('username_error')) echo 'has_error'; ?>">
                                <label class="col-sm-2 control-label" for="input-username">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" value="<?php echo $user[0]['username'] ?>" placeholder="Username" id="input-username" class="form-control" />
                                    <?php if($this->session->userdata('username_error')) {
                                        echo '<div class="text-danger">'.$this->session->userdata('username_error').'</div>';
                                        $this->session->unset_userdata('username_error');
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group required <?php if($this->session->userdata('email_error')) echo 'has_error'; ?>">
                                <label class="col-sm-2 control-label" for="input-email">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" value="<?php echo $user[0]['email'] ?>" placeholder="Email" id="input-email" class="form-control" />
                                    <?php if($this->session->userdata('email_error')) {
                                        echo '<div class="text-danger">'.$this->session->userdata('email_error').'</div>';
                                        $this->session->unset_userdata('email_error');
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group <?php if($this->session->userdata('confirm_error')) echo 'has_error'; ?>">
                                <label class="col-sm-2 control-label" for="input-confirm">Confirm</label>
                                <div class="col-sm-10">
                                    <input type="password" name="confirm" value="" placeholder="Confirm" id="input-confirm" class="form-control" />
                                    <?php if($this->session->userdata('confirm_error')) {
                                        echo '<div class="text-danger">'.$this->session->userdata('confirm_error').'</div>';
                                        $this->session->unset_userdata('confirm_error');
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-status">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="input-status" class="form-control">
                                        <option value="1" <?php echo ($user[0]['status']==1)? 'selected':'' ?>>Enabled</option>
                                        <option value="0" <?php echo ($user[0]['status']==0)? 'selected':'' ?>>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>