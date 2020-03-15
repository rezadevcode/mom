<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="UTF-8" />
        <?php  
        $web_title = $config_name;
        if ($title != '') {
            $web_title = $title . ' - ' . $config_name;
        }
        ?>
        <title><?php echo $web_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('assets/admin/javascript/jquery/jquery-2.1.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/javascript/bootstrap/js/bootstrap.min.js') ?>"></script>
        <link href="<?php echo base_url('assets/admin/javascript/bootstrap/opencart/opencart.css') ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin/javascript/font-awesome/css/font-awesome.min.css') ?>" type="text/css" rel="stylesheet" />
        <script src="<?php echo base_url('assets/admin/javascript/jquery/datetimepicker/moment.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js') ?>" type="text/javascript"></script>
        <link href="<?php echo base_url('assets/admin/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css') ?>" type="text/css" rel="stylesheet" media="screen" />
        <link type="text/css" href="<?php echo base_url('assets/admin/stylesheet/stylesheet.css') ?>" rel="stylesheet" media="screen" />
        <link type="text/css" href="<?php echo base_url('assets/admin/ajaxupload/ajaxupload.css') ?>" rel="stylesheet" media="screen" />
        <script src="<?php echo base_url('assets/admin/javascript/common.js') ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/javascript/tinymce/tinymce.min.js'); ?>"></script>
    </head>
    <body>
        <div id="container">
            <?php
            //header
            if (($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '') || $this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'forgotten') {
                $this->load->view('admin/section/login_header');
            } else {
                $this->load->view('admin/section/header');
                $this->load->view('admin/section/navigation');
            }

            //content
            $this->load->view($load_view);

            //footer
            $this->load->view('admin/section/footer');
            ?>
        </div>
        
    </body>
</html>