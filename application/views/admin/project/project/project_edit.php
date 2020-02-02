<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/project/project') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Project</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/project/project') ?>">Project</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Project</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/project/project/update') ?>">
                    <input type="hidden" name="id" value="<?php echo $result[0]['project_id'] ?>">
                    
                    <div class="form-group required <?php echo ($this->session->userdata('error_image')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label" for="input-image">Image</label>
                        <div class="col-sm-10">
                            <div style="display: inline-block; margin-right: 50px">
                                <div id="container-upload-1" class="upload-holder">
                                    <?php if($result[0]['image'] != '') { ?>
                                        <div class="remove"><a href="javascript:void(0);" onclick="removeFile('upload-1');" class="thumbnail-close">&times;</a></div>
                                        <figure><div><img src="<?php echo base_url('assets/images/project/'.$result[0]['image']) ?>" alt=""></div></figure>
                                        <input name="image" value="<?php echo $result[0]['image'] ?>" type="hidden">
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

                    <div class="form-group required <?php echo ($this->session->userdata('error_title')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" placeholder="Title" id="input-title" class="form-control" value="<?php echo $result[0]['title'] ?>" />
                            <?php if ($this->session->userdata('error_title')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_title') ?></div>
                                <?php $this->session->unset_userdata('error_title') ?>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group required <?php echo ($this->session->userdata('error_text')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Text</label>
                        <div class="col-sm-10">
                            <textarea name="text" placeholder="Text" id="input-text" class="input-text-area"><?php echo $result[0]['text'] ?></textarea>
                            <?php if ($this->session->userdata('error_text')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_text') ?></div>
                                <?php $this->session->unset_userdata('error_text') ?>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group required <?php echo ($this->session->userdata('error_category')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category" id="input-category" class="form-control">
                                <option value="" >- Category -</option>
                                <?php if($category) {
                                    foreach ($category as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value['category_id'] ?>" <?php echo ($result[0]['category_id'] == $value['category_id'])? 'selected':'' ?> ><?php echo $value['name'] ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                            <?php if ($this->session->userdata('error_category')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_category') ?></div>
                                <?php $this->session->unset_userdata('error_category') ?>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="input-status" class="form-control">
                                <option value="1" <?php echo ($result[0]['category_id'] == 1)? 'selected':'' ?> >Enabled</option>
                                <option value="0" <?php echo ($result[0]['category_id'] == 0)? 'selected':'' ?> >Disabled</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Note</label>
                        <div class="col-sm-10">
                            <p>
                            Recomended Resolution:<br>
                            - Image 1 = 517 x 357<br>
                            - Image 2 = 459 x 639<br>
                            - Image 3 = 459 x 639<br>
                            - Image 4 = 517 x 357<br>
                            - Image 5 = 517 x 357<br>
                            - Image 6 = 459 x 639<br>
                            - Image 7 = 517 x 357<br>
                            - Image 8 = 459 x 639<br>
                            </p>
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