<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/home/service/add') ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form').submit() : false;"><i class="fa fa-trash-o"></i></button>
            </div>
            <h1>Service</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/home/service') ?>">Service</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('service_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('service_success') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('service_success');
        }
        if ($this->session->userdata('service_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . $this->session->userdata('service_error') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('service_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Service List</h3>
            </div>
            <div class="panel-body">

                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/home/service/update_text') ?>">
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Intro</label>
                        <div class="col-sm-10">
                            <textarea name="text" placeholder="Intro" id="input-intro" class="input-text-area"><?php echo ($text)? $text[0]['text']:'' ?></textarea>
                            <br>
                            <button class="btn btn-primary" title="" data-toggle="tooltip" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </form>

                <form action="<?php echo base_url('admin/home/service/delete') ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                    <td class="text-center">
                                        Image
                                    </td>
                                    <td class="text-left">                    
                                        Title
                                    </td>
                                    <td class="text-left">                    
                                        Text
                                    </td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($list) {
                                    foreach ($list as $row) {
                                        ?>

                                        <tr>
                                            <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['home_service_id'] ?>" /></td>
                                            <td class="text-center"><img src="<?php echo base_url('assets/images/service/' . $row['image']) ?>" alt="" class="img-thumbnail" width="40" height="40" /></td>
                                            <td class="text-left"><?php echo strip_tags($row['title']) ?></td>
                                            <td class="text-left"><?php echo strip_tags($row['text']) ?></td>
                                            <td class="text-right"><a class="btn btn-primary" title="" data-toggle="tooltip" href="<?php echo base_url('admin/home/service/edit/' . $row['home_service_id']) ?>" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                                        </tr>

                                        <?php
                                    }
                                } else {
                                    echo '<tr>';
                                    echo '<td class="text-center" colspan="5">No Results!</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
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

    //--></script>