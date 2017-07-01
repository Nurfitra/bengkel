<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Management Bengkel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style type="text/css">
  .simpleCart_items table{width:100%}

  .simpleCart_items {background-color: #ffffff;}
  .itemRow .item-remove a{
    color:#ddd;
  }
  .simpleCart_shelfItem .item_Quantity {width:50px}

  .headerRow{background-color:#c5c4be;color:#ffffff;padding:3px}
  .simpleCart_quantity, .simpleCart_total{
    font-size:25px;
    color:#000;
  }
  .simpleCart_grandTotal{
    padding:10px;
    padding-right:14%;
    font-size:18px;
    text-align: right;
    color:#000;
    background-color: #c5c4be;
  }
  .headerRow .item-name,
  .headerRow .item-price,
  .itemRow .item-name,
  .itemRow .item-price,
  .itemRow .item-remove,
  .headerRow .item-quantity,
  .itemRow .item-quantity
  {
    

    font-size:18px;
    padding:10px;
    color:#222222;
  } 
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">