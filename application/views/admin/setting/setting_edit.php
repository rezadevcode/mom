<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
            </div>
            <h1>Setting</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/setting') ?>">Setting</a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">

        <?php
        if ($this->session->userdata('notif_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('notif_success') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('notif_success');
        }
        if ($this->session->userdata('notif_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('notif_error') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('notif_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Setting</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url('admin/setting/update') ?>" method="post" enctype="multipart/form-data" id="form" class="form-horizontal">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-data" data-toggle="tab">Data</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="tab-data">

                            <div class="form-group required <?php if ($this->session->userdata('error_name')) echo 'has_error'; ?>">
                                <label class="col-sm-2 control-label" for="input-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="<?php echo $name ?>" placeholder="Name" id="input-name" class="form-control" />
                                    <?php
                                    if ($this->session->userdata('name')) {
                                        echo '<div class="text-danger">' . $this->session->userdata('name') . '</div>';
                                        $this->session->unset_userdata('name');
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group required <?php echo ($this->session->userdata('error_logo')) ? 'has-error' : ''; ?>">
                                <label class="col-sm-2 control-label">Logo</label>
                                <div class="col-sm-10">
                                    <div style="display: inline-block; margin-right: 50px">
                                        <div id="container-upload-1" class="upload-holder">
                                            <?php if($logo != '') { ?>
                                                <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-1', 'logo');" class="thumbnail-close">&times;</a></div>
                                                <figure><div><img src="<?php echo base_url('assets/images/'.$logo) ?>" alt=""></div></figure>
                                                <input name="logo" value="<?php echo $logo ?>" type="hidden">
                                            <?php } else { ?>
                                                <span>
                                                    <input id="upload-1" name="logo" onchange="ajaxFileUpload(this.id, 'logo')" type="file">
                                                </span>
                                            <?php } ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php if ($this->session->userdata('error_logo')) { ?>
                                        <div class="text-danger"><?php echo $this->session->userdata('error_logo') ?></div>
                                        <?php $this->session->unset_userdata('error_logo') ?>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group required <?php if ($this->session->userdata('error_contact_email')) echo 'has_error'; ?>">
                                <label class="col-sm-2 control-label">Contact Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="contact_email" value="<?php echo $contact_email ?>" placeholder="Contact Email" id="input-contact-email" class="form-control" />
                                    <?php
                                    if ($this->session->userdata('error_contact_email')) {
                                        echo '<div class="text-danger">' . $this->session->userdata('error_contact_email') . '</div>';
                                        $this->session->unset_userdata('error_contact_email');
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Home Meta Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="home_meta_title" value="<?php echo $home_meta_title ?>" placeholder="Home Meta Title" id="input-home-meta-title" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Home Meta Tag Description</label>
                                <div class="col-sm-10">
                                    <textarea name="home_meta_description" id="input-home-meta-description" class="form-control"><?php echo $home_meta_description ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Home Meta Tag Keywords</label>
                                <div class="col-sm-10">
                                    <textarea name="home_meta_keyword" id="input-home-meta-keyword" class="form-control"><?php echo $home_meta_keyword ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Project Meta Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="project_meta_title" value="<?php echo $project_meta_title ?>" placeholder="Project Meta Title" id="input-project-meta-title" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Project Meta Tag Description</label>
                                <div class="col-sm-10">
                                    <textarea name="project_meta_description" id="input-project-meta-description" class="form-control"><?php echo $project_meta_description ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Project Meta Tag Keywords</label>
                                <div class="col-sm-10">
                                    <textarea name="project_meta_keyword" id="input-project-meta-keyword" class="form-control"><?php echo $project_meta_keyword ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Client Meta Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="client_meta_title" value="<?php echo $client_meta_title ?>" placeholder="Client Meta Title" id="input-client-meta-title" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Client Meta Tag Description</label>
                                <div class="col-sm-10">
                                    <textarea name="client_meta_description" id="input-client-meta-description" class="form-control"><?php echo $client_meta_description ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Client Meta Tag Keywords</label>
                                <div class="col-sm-10">
                                    <textarea name="client_meta_keyword" id="input-client-meta-keyword" class="form-control"><?php echo $client_meta_keyword ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">About Meta Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="about_meta_title" value="<?php echo $about_meta_title ?>" placeholder="About Meta Title" id="input-about-meta-title" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">About Meta Tag Description</label>
                                <div class="col-sm-10">
                                    <textarea name="about_meta_description" id="input-about-meta-description" class="form-control"><?php echo $about_meta_description ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">About Meta Tag Keywords</label>
                                <div class="col-sm-10">
                                    <textarea name="about_meta_keyword" id="input-about-meta-keyword" class="form-control"><?php echo $about_meta_keyword ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Contact Meta Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="contact_meta_title" value="<?php echo $contact_meta_title ?>" placeholder="Contact Meta Title" id="input-contact-meta-title" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Contact Meta Tag Description</label>
                                <div class="col-sm-10">
                                    <textarea name="contact_meta_description" id="input-contact-meta-description" class="form-control"><?php echo $contact_meta_description ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Contact Meta Tag Keywords</label>
                                <div class="col-sm-10">
                                    <textarea name="contact_meta_keyword" id="input-contact-meta-keyword" class="form-control"><?php echo $contact_meta_keyword ?></textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Footer</label>
                                <div class="col-sm-10">
                                    <textarea name="footer" id="input-footer" class="form-control input-text-area"><?php echo $footer ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

	tinymce.init({
        selector: ".input-text-area", theme: "modern", height: 300,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        relative_urls: false,
        remove_script_host: false,
		paste_as_text: true
    });

    function ajaxFileUpload(id, type) {
        var row = "'" + id + "'";

        var formData = new FormData();
        formData.append('document', $('#'+id)[0].files[0]);

        $.ajax({
        url : '<?php echo base_url('admin/ajax/upload') ?>',
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

                html += '<div class="remove"><a href="javascript:void(0);" onclick="removeFile('+ row +', \''+ type +'\');" class="thumbnail-close">&times;</a></div>';
                html += '<figure>';

                if(data['ext'].toLowerCase() == '.jpg' || data['ext'].toLowerCase() == '.png' || data['ext'].toLowerCase() == '.jpeg') {
                        html += '<div><img src="<?php echo base_url('assets/tmp').'/' ?>'+ data['filename'] +'" alt=""></div>';
                } else {
                        html += '<div><img src="<?php echo base_url('assets/admin/ajaxupload/assets/images/File-icon.png') ?>" alt=""></div>';
                }

                html += '</figure>';
                html += '<input name="'+type+'" value="'+ data['filename'] +'" type="hidden">';

                $('#container-'+id).html(html);
            } else {

                html = '';

                html += '<span>';
                html += '<input id="'+ id +'" name="'+type+'" onchange="ajaxFileUpload(this.id, \''+ type +'\')" type="file">';
                html += '</span>';

                $('#container-'+id).html(html);

                alert(data['msg']);
            }

        }
        });
    }
    
    function removeFile(id, type) {
        var r = confirm("Apakah Anda yakin menghapus file ini ?");
        if (r == true) {
            html = '';

            html += '<span>';
            html += '<input id="'+ id +'" name="'+ type +'" onchange="ajaxFileUpload(this.id, \''+ type +'\')" type="file">';
            html += '</span>';

            $('#container-'+id).html(html);
        }
    }
</script>