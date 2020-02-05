<head>
  <meta charset="utf-8">
  <meta name="title" content="<?php echo $meta_title ?>">
  <meta name="description" content="<?php echo $meta_description ?>">
  <meta name="keywords" content="<?php echo $meta_keyword ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  	<?php  
		$web_title = $config_name;
		if ($title != '') {
		    $web_title = $title . ' - ' . $config_name;
		}
	?>
  <title><?php echo $web_title ?></title>
  <link rel="apple-touch-icon" href="<?php echo base_url('assets/icon/apple-touch-icon.png') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/styles/vendor.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/styles/main.css') ?>">
  <script src="<?php echo base_url('assets/scripts/vendor/modernizr.js') ?>"></script>
</head>