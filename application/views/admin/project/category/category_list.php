<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/project/category/add') ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form').submit() : false;"><i class="fa fa-trash-o"></i></button>
            </div>
            <h1>Catrgory</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/project/category') ?>">Category</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('category_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('category_success') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('category_success');
        }
        if ($this->session->userdata('category_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . $this->session->userdata('category_error') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('category_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Category List</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url('admin/project/category/delete') ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                    <td class="text-left">
                                        Name
                                    </td>
                                    <td class="text-left">
                                        Slug
                                    </td>
                                    <td class="text-center">
                                        Date
                                    </td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($results) {
                                    foreach ($results as $row) {
                                        ?>

                                        <tr>
                                            <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['category_id'] ?>" /></td>
                                            <td class="text-left"><?php echo $row['name'] ?></td>
                                            <td class="text-left"><?php echo $row['slug'] ?></td>
                                            <td class="text-center"><?php echo $row['created_at'] ?></td>
                                            <td class="text-right"><a class="btn btn-primary" title="" data-toggle="tooltip" href="<?php echo base_url('admin/project/category/edit/' . $row['category_id']) ?>" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
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