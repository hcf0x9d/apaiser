<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<?php include('../Library/dochead.php');?>
<style>
    html{margin-top:0 !important;}
    h3.widget-title{
        color: #fff;
        margin-bottom: 20px !important;
        display: block;
        font-size: 12px;
        font-weight: normal;
        letter-spacing: normal;
    }
    h3.page-title{
        color: #b0d136;
        font-family: 'Century Gothic', CenturyGothicPro,sans-serif;
        font-weight: bold;
        font-size: 1.542em;
        text-transform:lowercase;
        margin:20px 0 !important;   
    }
    h1.entry-title{margin:0 0 5px 0 !important;}
    
        h1.entry-title a{color:#fff;text-decoration:none;}
    
    .entry-header{padding-top:0;}
    
    .post{border-bottom:1px solid #fff;}
    
    .widget li{margin-bottom:10px;color:#fff;}
    .widget a{color:#fff;}
    .assistive-text{display:none;}
    .navigation, .nav-single{padding-top:20px;padding-bottom:20px;}
</style>

</head>

<body <?php body_class(); ?>>

<?php include('../Library/header.php');?>

<div id="page" class="hfeed container_12">
	<div id="main" class="wrapper">