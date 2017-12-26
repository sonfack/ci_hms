<div class="row">
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
<h1><?php echo lang('reset_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>

	<p>
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>

<?php echo form_close();?>
</div>
