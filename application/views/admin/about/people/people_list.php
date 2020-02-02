<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/about/people/add') ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form').submit() : false;"><i class="fa fa-trash-o"></i></button>
            </div>
            <h1>People</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/about/people') ?>">People</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('about_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> '.$this->session->userdata('about_success').'<button data-dismiss="alert" class="close" type="button">&times;</button></div>';
            $this->session->unset_userdata('about_success');
        }
        if ($this->session->userdata('about_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i> '.$this->session->userdata('about_error').'<button data-dismiss="alert" class="close" type="button">&times;</button></div>';
            $this->session->unset_userdata('about_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> About List</h3>
            </div>
            <div class="panel-body">
                
                <form action="<?php echo base_url('admin/about/people/delete') ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                    <td class="text-center">Image</td>
                                    <td class="text-left">Name</td>
                                    <td class="text-left">Position</td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($results){
                                foreach ($results as $row) {
                                    ?>

                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['about_people_id'] ?>" /></td>
                                        <td class="text-center"><img src="<?php echo base_url('assets/images/about/' . $row['image']) ?>" alt="" class="img-thumbnail" width="40" height="40" /></td>
                                        <td class="text-left"><?php echo $row['name'] ?></td>
                                        <td class="text-left"><?php echo $row['position'] ?></td>
                                        <td class="text-right"><a href="<?php echo base_url('admin/about/people/edit/' . $row['about_people_id']) ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                    </tr>

                                    <?php
                                }
                                } else {
                                    ?>
                                    <tr>
                                        <td class="text-center" colspan="5">No Result!</td>
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