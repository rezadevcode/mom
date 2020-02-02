<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/project/category') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Category</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/project/category') ?>">Category</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Category</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/project/category/update') ?>">
                    <input type="hidden" name="id" value="<?php echo $result[0]['category_id'] ?>">
                    
                    <div class="form-group required <?php echo ($this->session->userdata('error_name')) ? 'has-error' : ''; ?>">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Name" id="input-name" class="form-control" value="<?php echo $result[0]['name'] ?>" />
                            <?php if ($this->session->userdata('error_name')) { ?>
                                <div class="text-danger"><?php echo $this->session->userdata('error_name') ?></div>
                                <?php $this->session->unset_userdata('error_name') ?>
                            <?php } ?>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>