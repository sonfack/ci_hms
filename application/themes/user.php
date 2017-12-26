<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>"  rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/bootstrap-theme.css'; ?>"  rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery-ui.theme.css'; ?>"  rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/jquery-ui.structure.css'; ?>"  rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
    <?php if(isset($css)){ 
				foreach($css as $css_file){?>
			<link href="<?php echo $css_file; ?>"  rel="stylesheet">
	<?php } } ?>

</head>

<body class="container">
	<?php echo $horizontal_menu ; ?>
	<?php echo $output; ?>
		
    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'; ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
    
    <?php 
		if(isset($js)){
			foreach($js as $js_file){ 
	?>
		<script src="<?php echo $js_file ; ?>" ></script>		
	<?php		}	
		}
    ?>

</body>

</html>
