<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/about/people') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>People</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/about/people') ?>">People</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add People</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/about/people/save') ?>">
                    
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

                    <div class="form-group required <?php echo ($this->session->userdata('error_name')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Name" id="input-name" class="form-control" />
                            <?php if ($this->session->userdata('error_name')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_name') ?></div>
                                <?php $this->session->unset_userdata('error_name') ?>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group required <?php echo ($this->session->userdata('error_position')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Position</label>
                        <div class="col-sm-10">
                            <input type="text" name="position" placeholder="Position" id="input-position" class="form-control" />
                            <?php if ($this->session->userdata('error_position')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_position') ?></div>
                                <?php $this->session->unset_userdata('error_position') ?>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"><!--

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