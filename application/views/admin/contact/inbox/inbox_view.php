<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/contact/inbox') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a>
            </div>
            <h1>Inbox</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/contact/inbox') ?>">Inbox</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Inbox</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="">
                    
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Name" id="input-name" class="form-control" value="<?php echo $result[0]['name'] ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" placeholder="Email" id="input-email" class="form-control" value="<?php echo $result[0]['email'] ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" name="subject" placeholder="Subject" id="input-subject" class="form-control" value="<?php echo $result[0]['subject'] ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" placeholder="Phone" id="input-phone" class="form-control" value="<?php echo $result[0]['phone'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" readonly><?php echo $result[0]['comment'] ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>