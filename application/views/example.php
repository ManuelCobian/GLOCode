<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>plantilla/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>plantilla/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>plantilla/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>plantilla/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>plantilla/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo site_url('examples/customers_management')?>'>Customers</a> |
		<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('examples/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
