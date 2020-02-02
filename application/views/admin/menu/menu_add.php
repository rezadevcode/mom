<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/menu') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Menu</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/menu') ?>">Menu</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Menu</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/menu/save') ?>">
                    
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

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" placeholder="Slug" id="input-slug" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">HTML</label>
                        <div class="col-sm-10">
                            <textarea name="html" placeholder="HTML" id="input-html" class="input-text-area"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sort Order</label>
                        <div class="col-sm-10">
                            <input type="text" name="sort_order" placeholder="Sort Order" id="input-sort-order" class="form-control" style="width: 100px" />
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