<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form').submit() : false;"><i class="fa fa-trash-o"></i></button>
            </div>
            <h1>Inbox</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/contact/inbox') ?>">Inbox</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if ($this->session->userdata('inbox_success')) {
            echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> '.$this->session->userdata('inbox_success').'<button data-dismiss="alert" class="close" type="button">&times;</button></div>';
            $this->session->unset_userdata('inbox_success');
        }
        if ($this->session->userdata('inbox_error')) {
            echo '<div class="alert alert-danger"><i class="fa fa-check-circle"></i> '.$this->session->userdata('inbox_error').'<button data-dismiss="alert" class="close" type="button">&times;</button></div>';
            $this->session->unset_userdata('inbox_error');
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Inbox List</h3>
            </div>
            <div class="panel-body">
                
                <form action="<?php echo base_url('admin/contact/inbox/delete') ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                    <td class="text-left">Name</td>
                                    <td class="text-left">Email</td>
                                    <td class="text-left">Subject</td>
                                    <td class="text-left">Phone</td>
                                    <td class="text-left">Comment</td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($results){
                                foreach ($results as $row) {
                                    ?>

                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['contact_inbox_id'] ?>" /></td>
                                        <td class="text-left"><?php echo $row['name'] ?></td>
                                        <td class="text-left"><?php echo $row['email'] ?></td>
                                        <td class="text-left"><?php echo $row['subject'] ?></td>
                                        <td class="text-left"><?php echo $row['phone'] ?></td>
                                        <?php $out = strlen($row['comment']) > 50 ? substr($in,0,50)."..." : $row['comment']; ?>
                                        <td class="text-left"><?php echo $out ?></td>
                                        <td class="text-right"><a href="<?php echo base_url('admin/contact/inbox/view/' . $row['contact_inbox_id']) ?>" data-toggle="tooltip" title="View" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
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