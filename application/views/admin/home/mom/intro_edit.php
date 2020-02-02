<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/home/intro') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Intro</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/home/intro') ?>">Intro</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('intro_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('intro_success') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('intro_success');
        }
        if ($this->session->userdata('intro_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . $this->session->userdata('intro_error') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('intro_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Intro</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/home/intro/update') ?>">
                    
                    <div class="form-group required <?php echo ($this->session->userdata('error_text')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Intro</label>
                        <div class="col-sm-10">
                            <textarea name="text" placeholder="Intro" id="input-intro" class="input-text-area"><?php echo ($results)? $results[0]['text']:'' ?></textarea>
                            <?php if ($this->session->userdata('error_text')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_text') ?></div>
                                <?php $this->session->unset_userdata('error_text') ?>
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

    //--></script>