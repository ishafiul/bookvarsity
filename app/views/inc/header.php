<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $data['info'][0]->title.' - '.$data['page_title']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<?php echo $data['info'][0]->details?>" />
    <meta name="description" content="<?php echo $data['description'].' '.$data['info'][0]->details?>">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="<?php echo URLROOT; ?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="<?php echo URLROOT; ?>/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-1.11.1.min.js"></script>
    <!-- start menu -->
    <link href="<?php echo URLROOT; ?>/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/megamenu.js"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/etalage.css">
    <script src="<?php echo URLROOT; ?>/js/jquery.etalage.min.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <link href="<?php echo URLROOT; ?>/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });

        });
    </script>
</head>
<body>
<div class="wrap">
    <div class="container">