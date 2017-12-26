<html>
   <head>
	<title>Admin</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet" />
	<link href="<?php echo base_url().'assets/css/bootstrap-theme.css'; ?>" rel="stylesheet" />
	<script src="<?php echo base_url().'assets/js/jquery.js' ; ?>" ></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.js' ; ?>" ></script>
	</head>
   <body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
			<div class="navbar-header">
					<a class="navbar-brand" href="#">EI-Card</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url().'index.php/welcome/admin' ; ?>">Home</a></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
					<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'index.php/users/auth/create_user' ; ?>">Create user</a></li>
							<li><a href="#">Delete user</a></li>
							<li><a href="#">Modify user</a></li> 
					</ul>
					</li>
				<li>
					<a href="<?php echo base_url().'index.php/welcome/admin/new_customer' ; ?>">New customers</a>
				</li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">View carts<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'index.php/welcome/admin/view_assurance' ; ?>">Assurance</a></li>
						<li><a href="<?php echo base_url().'index.php/welcome/admin/view_carte_rose' ; ?>">Carte rose</a></li>
					</ul>
					</li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Edit cart<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'index.php/welcome/admin/edit_assurance' ; ?>">Assurance</a></li>
							<li><a href="<?php echo base_url().'index.php/welcome/admin/edit_carte_rose' ; ?>">Carte rose</a></li>
					</ul>
				</li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
						<li><a href="<?php echo base_url().'index.php/users/auth/logout' ; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
			</div>
		</nav>
		<br>
		<br>
		<div class="row">
			<div style="margin-left:2%;">
			<h1><?php echo lang('deactivate_heading');?></h1>
			<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
			<?php echo form_open("auth/deactivate/".$user->id);?>
			  <p>
				<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
				<input type="radio" name="confirm" value="yes" checked="checked" />
				<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
				<input type="radio" name="confirm" value="no" />
			  </p>

			  <?php echo form_hidden($csrf); ?>
			  <?php echo form_hidden(array('id'=>$user->id)); ?>

			  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

			<?php echo form_close();?>
			</div>
		</div>
</body>
</html>
