<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/contact/intro') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Contact</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/contact/intro') ?>">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Contact</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/contact/intro/update') ?>">
                    
                    <div class="form-group required <?php echo ($this->session->userdata('error_image')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label" for="input-image">Image</label>
                        <div class="col-sm-10">
                            <div style="display: inline-block; margin-right: 50px">
                                <div id="container-upload-1" class="upload-holder">
                                    <?php if($result[0]['image'] != '') { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-1', 'image');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/contact/'.$result[0]['image']) ?>" alt=""></div></figure>
                                        <input name="image" value="<?php echo $result[0]['image'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-1" name="image" onchange="ajaxFileUpload(this.id, 'image')" type="file">
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

                    <div class="form-group required <?php echo ($this->session->userdata('error_map')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label" for="input-image">Map</label>
                        <div class="col-sm-10">
                            <textarea name="map" placeholder="Map" id="input-map" class="form-control"><?php echo $result[0]['map'] ?></textarea>
                            <?php if ($this->session->userdata('error_map')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_map') ?></div>
                                <?php $this->session->unset_userdata('error_map') ?>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-group required <?php echo ($this->session->userdata('error_address')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="address" placeholder="Address" id="input-address" class="input-text-area"><?php echo $result[0]['address'] ?></textarea>
                            <?php if ($this->session->userdata('error_address')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_address') ?></div>
                                <?php $this->session->unset_userdata('error_address') ?>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group required <?php echo ($this->session->userdata('error_pdf')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label" for="input-image">PDF</label>
                        <div class="col-sm-10">
                            <div style="display: inline-block; margin-right: 50px">
                                <div id="container-upload-3" class="upload-holder">
                                    <?php if($result[0]['pdf'] != '') { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-3', 'pdf');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/admin/ajaxupload/assets/images/File-icon.png') ?>" alt=""></div></figure>
                                        <input name="pdf" value="<?php echo $result[0]['pdf'] ?>" type="hidden">
                                    <?php } else { ?>
                                        <span>
                                            <input id="upload-3" name="pdf" onchange="ajaxFileUpload(this.id, 'pdf')" type="file">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php if ($this->session->userdata('error_pdf')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_pdf') ?></div>
                                <?php $this->session->unset_userdata('error_pdf') ?>
                            <?php } ?>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"><!--
    
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

    //--></script>