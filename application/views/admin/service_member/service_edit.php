<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('member') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Service</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('member/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('member/service') ?>">Service</a></li>
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
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Service</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo isset($service[0]['name'])?$service[0]['name']:'' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Talent</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="talent" placeholder="Talent" value="<?php echo isset($service[0]['category'])?$service[0]['category']:'' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">About</label>
                        <div class="col-sm-10">
                            <textarea name="about" placeholder="About" class="input-text-area"><?php echo isset($service[0]['about'])?$service[0]['about']:'' ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Service Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" placeholder="Description" class="input-text-area"><?php echo isset($service[0]['desc'])?$service[0]['desc']:'' ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                            <input name="price" placeholder="Price" class="form-control" type="number" value="<?php echo isset($service[0]['price'])?$service[0]['price']:'' ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="input-status" class="form-control">
                                <option value="1" <?php echo ($service[0]['status'] == '1') ? 'selected':'' ?> >Enabled</option>
                                <option value="0" <?php echo ($service[0]['status'] == '0') ? 'selected':'' ?> >Disabled</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group required <?php echo ($this->session->userdata('error_image')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label" for="input-image">Image</label>
                        <div class="col-sm-10">
                            <div style="display: inline-block; margin-right: 50px">
                                <div id="container-upload-1" class="upload-holder">
                                    <?php if(isset($service[0]['image_service'][0]['image'])) { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-1');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/member_service/'.$service[0]['image_service'][0]['image']) ?>" alt=""></div></figure>
                                        <input name="image[]" value="<?php echo $service[0]['image_service'][0]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-1" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div id="container-upload-2" class="upload-holder">
                                    <?php if(isset($service[0]['image_service'][1]['image'])) { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-2');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/member_service/'.$service[0]['image_service'][1]['image']) ?>" alt=""></div></figure>
                                        <input name="image[]" value="<?php echo $service[0]['image_service'][1]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-2" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div id="container-upload-3" class="upload-holder">
                                    <?php if(isset($service[0]['image_service'][2]['image'])) { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-3');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/member_service/'.$service[0]['image_service'][2]['image']) ?>" alt=""></div></figure>
                                        <input name="image[]" value="<?php echo $service[0]['image_service'][2]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-3" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div id="container-upload-4" class="upload-holder">
                                    <?php if(isset($service[0]['image_service'][3]['image'])) { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-4');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/member_service/'.$service[0]['image_service'][3]['image']) ?>" alt=""></div></figure>
                                        <input name="image[]" value="<?php echo $service[0]['image_service'][3]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-4" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div id="container-upload-5" class="upload-holder">
                                    <?php if(isset($service[0]['image_service'][4]['image'])) { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-5');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/member_service/'.$service[0]['image_service'][4]['image']) ?>" alt=""></div></figure>
                                        <input name="image[]" value="<?php echo $service[0]['image_service'][4]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-5" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div id="container-upload-6" class="upload-holder">
                                    <?php if(isset($service[0]['image_service'][5]['image'])) { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-6');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/member_service/'.$service[0]['image_service'][5]['image']) ?>" alt=""></div></figure>
                                        <input name="image[]" value="<?php echo $service[0]['image_service'][5]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-6" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">
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

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    tinymce.init({
        selector: ".input-text-area", theme: "modern", height: 300,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        relative_urls: false,
        remove_script_host: false
    });

    function ajaxFileUpload(id) {
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

                    html += '<div class="remove"><a href="javascript:void(0);" onclick="removeFile('+ row +');" class="thumbnail-close">&times;</a></div>';
                    html += '<figure>';

                    if(data['ext'].toLowerCase() == '.jpg' || data['ext'].toLowerCase() == '.png' || data['ext'].toLowerCase() == '.jpeg') {
                            html += '<div><img src="<?php echo base_url('assets/tmp').'/' ?>'+ data['filename'] +'" alt=""></div>';
                    } else {
                            html += '<div><img src="<?php echo base_url('assets/admin/ajaxupload/assets/images/File-icon.png') ?>" alt=""></div>';
                    }

                    html += '</figure>';
                    html += '<input name="image[]" value="'+ data['filename'] +'" type="hidden">';

                    $('#container-'+id).html(html);
                } else {

                    html = '';

                    html += '<span>';
                    html += '<input id="'+ id +'" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">';
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
                html += '<input id="'+ id +'" name="image[]" onchange="ajaxFileUpload(this.id)" type="file">';
                html += '</span>';

                $('#container-'+id).html(html);
            }
        }

    //--></script>