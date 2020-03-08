  <head>
  <meta charset="utf-8">
  <meta name="title" content="<?php echo $meta_title ?>">
  <meta name="description" content="<?php echo $meta_description ?>">
  <meta name="keywords" content="<?php echo $meta_keyword ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<?php  
		$web_title = $config_name;
		if ($title != '') {
		    $web_title = $title . ' - ' . $config_name;
		}
	?>
  <title><?php echo $web_title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" />
  <link rel="apple-touch-icon" href="<?php echo base_url('assets/images/favicon.ico') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/styles/vendor.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/styles/main.css') ?>">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159862861-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-159862861-1');
  </script>
  <script src="<?php echo base_url('assets/scripts/modernizr.js') ?>"></script>
  <style>
    .notif-error p {
      font-size: 12px;
      margin: 0;
      color: red;
    }
  </style>
</head>