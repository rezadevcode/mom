<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/home/slideshow/add') ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-slideshow').submit() : false;"><i class="fa fa-trash-o"></i></button>
            </div>
            <h1>Slideshow</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/home/slideshow') ?>">Slideshow</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('slideshow_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $this->session->userdata('slideshow_success') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('slideshow_success');
        }
        if ($this->session->userdata('slideshow_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i>' . $this->session->userdata('slideshow_error') . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
            $this->session->unset_userdata('slideshow_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Slideshow List</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url('admin/home/slideshow/delete') ?>" method="post" enctype="multipart/form-data" id="form-slideshow">
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
                                        Status
                                    </td>
                                    <td class="text-left">                    
                                        Added
                                    </td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // echo '<pre>';
                                // print_r($results);exit;
                                if ($results) {
                                    foreach ($results as $row) {
                                        ?>

                                        <tr>
                                            <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['slideshow_id'] ?>" /></td>
                                            <td class="text-center"><img src="<?php echo base_url('assets/images/slideshow/' . $row['image']) ?>" alt="" class="img-thumbnail" width="40" height="40" /></td>
                                            <td class="text-left"><?php echo $row['title'] ?></td>
                                            <td class="text-left"><?php echo $row['status'] == 1 ? 'enabled' : 'disabled' ?></td>
                                            <td class="text-left"><?php echo $row['added'] ?></td>
                                            <td class="text-right"><a class="btn btn-primary" title="" data-toggle="tooltip" href="<?php echo base_url('admin/home/slideshow/edit/' . $row['slideshow_id']) ?>" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
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