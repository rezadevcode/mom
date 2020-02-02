<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/project/project/add') ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form').submit() : false;"><i class="fa fa-trash-o"></i></button>
            </div>
            <h1>Project</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/project/project') ?>">Project</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('project_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> '.$this->session->userdata('project_success').'<button data-dismiss="alert" class="close" type="button">&times;</button></div>';
            $this->session->unset_userdata('project_success');
        }
        if ($this->session->userdata('project_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i> '.$this->session->userdata('project_error').'<button data-dismiss="alert" class="close" type="button">&times;</button></div>';
            $this->session->unset_userdata('project_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Project List</h3>
            </div>
            <div class="panel-body">
                
                <form action="<?php echo base_url('admin/project/project/delete') ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                    <td class="text-center">Image</td>
                                    <td class="text-left">Title</td>
                                    <td class="text-left">Text</td>
                                    <td class="text-left">Category</td>
                                    <td class="text-left">Status</td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($results){
                                foreach ($results as $row) {
                                    ?>

                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['project_id'] ?>" /></td>
                                        <td class="text-center"><img src="<?php echo base_url('assets/images/project/' . $row['image']) ?>" alt="" class="img-thumbnail" width="40" height="40" /></td>
                                        <td class="text-left"><?php echo $row['title'] ?></td>
                                        <td class="text-left"><?php echo $row['text'] ?></td>
                                        <td class="text-left"><?php echo $row['category_name'] ?></td>
                                        <td class="text-left"><?php echo ($row['status']==1)? 'Enabled':'Disabled' ?></td>
                                        <td class="text-right"><a href="<?php echo base_url('admin/project/project/edit/' . $row['project_id']) ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                    </tr>

                                    <?php
                                }
                                } else {
                                    ?>
                                    <tr>
                                        <td class="text-center" colspan="7">No Result!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-6 text-left"><?php echo $links ?></div>
                    <div class="col-sm-6 text-right">Showing <?php echo $first_result ?> to <?php echo $last_result ?> of <?php echo $total_result ?> (<?php echo $total_page ?> Pages)</div>
                </div>
            </div>
        </div>
    </div>
</div>