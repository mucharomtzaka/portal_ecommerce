<!DOCTYPE html>
<html>
<head>
  <title><?php echo ucfirst($titled);?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,Mozila,Opera,Chrome">
  <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <meta name="description" content="<?php echo $description ?>" />
   <meta name="keyword" content="<?php echo $keyword ?>">
   <meta name="author" content="Mucharom" />
   <link rel="icon" type="image/png" href="<?php echo base_url('doc/images/favicon');?>/<?php echo $favicon;?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>">
<!--     <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/animate.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/misc.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/color-scheme.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/responsive.css');?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('dist/css/skins/_all-skins.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/ionicons.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/select2/select2.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/pace/pace.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/datepicker3.css');?>">
     <link rel="stylesheet" href="<?php echo base_url('plugins/datatables/dataTables.bootstrap.css');?>">
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-red sidebar-collapse sidebar-mini">