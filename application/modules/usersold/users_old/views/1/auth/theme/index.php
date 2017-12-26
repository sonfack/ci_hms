<?php 
 echo "ici"; 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AGP-Administration</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>"  rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/sb-admin.css'; ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url().'assets/css/plugins/morris.css'; ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">

</head>

<body>
	<?php 
		echo $content;
	?>
    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url().'assets/js/plugins/morris/raphael.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/plugins/morris/morris.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/plugins/morris/morris-data.js'; ?>"></script>

</body>

</html>
