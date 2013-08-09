<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link href="<?php echo URL; ?>public/css/main.css" type="text/css" rel="stylesheet" /> 
    	<script type="text/javascript" ></script>
    </head>
    <body>
    	<!-- header -->
    	<header>
    		<a href="<?php echo URL; ?>index">Home</a>
    		<a href="<?php echo URL; ?>help">Help</a>
            <?php if(Session::get("is_logged_in")): ?>
                <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
            <?php else: ?>
                <a href="<?php echo URL; ?>login">Login</a>
            <?php endif; ?>
    	</header>
    	<!-- /Page Wrap -->
    	<!-- Page Wrap -->
    	<div class="page-wrap">