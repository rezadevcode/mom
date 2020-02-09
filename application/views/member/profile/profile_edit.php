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
            if(validation_errors()){
                echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . validation_errors() . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Profile</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('member/profile') ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" placeholder="Name" class="form-control" value="<?php echo $profil[0]['name'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" placeholder="Email" class="form-control" value="<?php echo $profil[0]['email'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Instagram Account</label>
                        <div class="col-sm-10">
                            <input name="ig_account" placeholder="Instagram" class="form-control" value="<?php echo $profil[0]['ig_account'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Facebook Account</label>
                        <div class="col-sm-10">
                            <input name="fb_account" placeholder="Facebook" class="form-control" value="<?php echo $profil[0]['fb_account'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Community</label>
                        <div class="col-sm-10">
                            <select name="comunity" id="input-status" class="form-control">
                                <option value="" >Select</option>    
                                <option value="community marketing" <?php echo ($profil[0]['comunity']== 'community marketing') ? 'selected':'' ?> >Community Marketing</option>
                                <option value="community management" <?php echo ($profil[0]['comunity']== 'community management') ? 'selected':'' ?> >Community Management</option>
                                <option value="community building" <?php echo ($profil[0]['comunity']== 'community building') ? 'selected':'' ?> >Community Building</option>
                                <option value="talent management" <?php echo ($profil[0]['comunity']== 'talent management') ? 'selected':'' ?> >Talent Management</option>
                                <option value="training center" <?php echo ($profil[0]['comunity']== 'training center') ? 'selected':'' ?> >Training Center</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Member Type</label>
                        <div class="col-sm-10">
                            <select name="type" id="input-status" class="form-control">
                                <option value="" >Select</option>   
                                <option value="freelancer" <?php echo ($profil[0]['member_type']== 'freelancer') ? 'selected':'' ?> >Freelancer</option>
                                <option value="influencer" <?php echo ($profil[0]['member_type']== 'influencer') ? 'selected':'' ?> >Influencer</option>
                                <option value="community" <?php echo ($profil[0]['member_type']== 'community') ? 'selected':'' ?> >Community</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group required <?php echo ($this->session->userdata('error_image')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label" for="input-image">Image</label>
                        <div class="col-sm-10">
                            <div style="display: inline-block; margin-right: 50px">
                                <div id="container-upload-1" class="upload-holder">
                                    <?php if($profil[0]['image'] != '') { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-1');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/member/'.$profil[0]['image']) ?>" alt=""></div></figure>
                                        <input name="image" value="<?php echo $profil[0]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-1" name="image" onchange="ajaxFileUpload(this.id)" type="file">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php if ($this->session->userdata('error_image')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_image') ?></div>
                                <?php $this->session->unset_userdata('error_image') ?>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="input-status" class="form-control">
                                <option value="1" <?php echo ($profil[0]['status']==1)? 'selected':'' ?> >Enabled</option>
                                <option value="0" <?php echo ($profil[0]['status']==0)? 'selected':'' ?> >Disabled</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function ajaxFileUpload(id) {
            var row = "'" + id + "'";

            var formData = new FormData();
            formData.append('document', $('#'+id)[0].files[0]);

            $.ajax({
            url : '<?php echo base_url('member/ajax/upload') ?>',
            type : 'POST',
            data : formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            beforeSend: function() {
                html = '';

                html += '<figure>';
                html += '<div><img src="<?php echo base_url('assets/admin/ajaxupload/assets/images/loading.gif') ?>" alt=""></div>';
                html += '</figure>';

                $('#container-'+id).html(html);
            },
            success : function(data) {

                if(data['status'] == 'ok') {
                    html = '';

                    html += '<div class="remove"><a href="javascript:void(0);" onclick="removeFile('+ row +');" class="thumbnail-close">&times;</a></div>';
                    html += '<figure>';

                    if(data['ext'].toLowerCase() == '.jpg' || data['ext'].toLowerCase() == '.png' || data['ext'].toLowerCase() == '.jpeg') {
                            html += '<div><img src="<?php echo base_url('assets/tmp').'/' ?>'+ data['filename'] +'" alt=""></div>';
                    } else {
                            html += '<div><img src="<?php echo base_url('assets/admin/ajaxupload/assets/images/File-icon.png') ?>" alt=""></div>';
                    }

                    html += '</figure>';
                    html += '<input name="image" value="'+ data['filename'] +'" type="hidden">';

                    $('#container-'+id).html(html);
                } else {

                    html = '';

                    html += '<span>';
                    html += '<input id="'+ id +'" name="image" onchange="ajaxFileUpload(this.id)" type="file">';
                    html += '</span>';

                    $('#container-'+id).html(html);

                    alert(data['msg']);
                }

            }
            });
        }
        
        function removeFile(id) {
            var r = confirm("Apakah Anda yakin menghapus file ini ?");
            if (r == true) {
                html = '';

                html += '<span>';
                html += '<input id="'+ id +'" name="image" onchange="ajaxFileUpload(this.id)" type="file">';
                html += '</span>';

                $('#container-'+id).html(html);
            }
        }

    //--></script>