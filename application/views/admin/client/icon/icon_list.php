<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/client/icon/add') ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form').submit() : false;"><i class="fa fa-trash-o"></i></button>
            </div>
            <h1>Icon</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/client/icon') ?>">Icon</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('client_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('client_success') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('client_success');
        }
        if ($this->session->userdata('client_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . $this->session->userdata('client_error') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('client_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Icon List</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url('admin/client/icon/delete') ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                    <td class="text-center">
                                        Image
                                    </td>
                                    <td class="text-center">
                                        Date
                                    </td>
                                    <td class="text-center">
                                        Active
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
                                            <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['client_icon_id'] ?>" /></td>
                                            <td class="text-center"><img src="<?php echo base_url('assets/images/client/' . $row['image']) ?>" alt="" class="img-thumbnail" width="40" height="40" /></td>
                                            <td class="text-center"><?php echo $row['created_at'] ?></td>
                                            <td class="text-center"><?php echo ($row['status']==1)? 'Enabled': 'Disabled' ?></td>
                                            <td class="text-right"><a class="btn btn-primary" title="" data-toggle="tooltip" href="<?php echo base_url('admin/client/icon/edit/' . $row['client_icon_id']) ?>" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
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