<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>content/css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>content/styles/main.css">
		<script src="<?php echo base_url(); ?>content/js/vendor/modernizr-2.6.2.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica:400,400italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />

	</head>
	<body <?php echo(isset($body_class))? 'class="'.$body_class.'"' : '' ; ?>>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<!-- Add your site or application content here -->
		<header>
			<button id="mobile_menu"></button>
			<ul id="main_menu" class="unstyled">
				<li><a href="grid.html">Familiars</a></li>
				<li>Equipment</li>
				<li>Tasks</li>
				<li>Alchemy</li>
			</ul>
		</header>
