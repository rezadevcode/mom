<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/home/banner') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Banner</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/home/banner') ?>">Banner</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Banner</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/home/banner/save') ?>">
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" placeholder="Title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Caption</label>
                        <div class="col-sm-10">
                            <textarea name="caption" placeholder="Text Left" id="input-text-left" class="input-text-area"></textarea>
                        </div>
                    </div>

                    <div class="form-group required <?php echo ($this->session->userdata('error_image')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label" for="input-image">Image</label>
                        <div class="col-sm-10">
                            <div style="display: inline-block; margin-right: 50px">
                                <div id="container-upload-1" class="upload-holder">
                                    <span>
                                        <input id="upload-1" name="image" onchange="ajaxFileUpload(this.id)" type="file">
                                    </span>
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
                        <label class="col-sm-2 control-label" for="input-status">Deployment</label>
                        <div class="col-sm-10">
                            <select name="deployment" id="input-status" class="form-control">
                                <option value="" >--select--</option>
                                <option value="home" >Home</option>
                                <option value="about" >About</option>
                                <option value="service" >Service</option>
                                <option value="mom academy" >Mom academy</option>
                                <option value="mom project" >Mom project</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="input-status" class="form-control">
                                <option value="1" >Enabled</option>
                                <option value="0" >Disabled</option>
                            </select>
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