<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <a class="btn btn-default" title="" data-toggle="tooltip" href="<?php echo base_url('admin/home/slideshow') ?>" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
            <h1>Content</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/home/content_element') ?>">Content</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Content</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/home/content_element/update') ?>">
                <input type="hidden" name="id" placeholder="Title" class="form-control" value="<?php echo $result[0]['id'] ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" placeholder="Title" class="form-control" value="<?php echo $result[0]['title'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" placeholder="Text Left" id="input-text-left" class="input-text-area">
                                <?php echo $result[0]['desc'] ?>
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Placement</label>
                        <div class="col-sm-10">
                            <select name="placement" id="input-status" class="form-control">
                            <option value="" >--select--</option>
                                <option value="home" <?php echo ($result[0]['placement']== 'home')? 'selected':'' ?> >Home</option>
                                <option value="about us" <?php echo ($result[0]['placement']== 'about us')? 'selected':'' ?> >About us</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="input-status" class="form-control">
                                <option value="1" <?php echo ($result[0]['status']==1)? 'selected':'' ?> >Enabled</option>
                                <option value="0" <?php echo ($result[0]['status']==0)? 'selected':'' ?> >Disabled</option>
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