<html>
   <head>
	<title>Admin</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet" />
	<link href="<?php echo base_url().'assets/css/bootstrap-theme.css'; ?>" rel="stylesheet" />
	<script src="<?php echo base_url().'assets/js/jquery.js' ; ?>" ></script>
	<script src="<?php echo base_url().'assets/js/boostrap.js' ; ?>" ></script>
   </head>
   <body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">EI-Card</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="<?php echo base_url().'index.php/users/auth/create_user' ; ?>">Create user</a></li>
      <li><a href="#">Delete user</a></li>
      <li><a href="#">Modify user</a></li> 
      <li><a href="#">View carts</a></li>
      <li><a href="#">Edite cart</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
      <li><a href="<?php echo base_url().'index.php/users/auth/logout' ; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
	<div class="container">
		<div class="row">	
			<div class="col-lg-12" style="text-align:center; font-size:160%;">
				<p><?php echo lang('create_user_subheading');?></p>

				<div id="infoMessage"><?php echo $message;?></div>
			</div>
		</div>
		<div class="row">
			

				<?php echo form_open("index.php/users/auth/create_user", array('class'=>'form-horizontal', 'role'=>'form'));?>
		<div class="form-group">
			<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
           			 <?php echo lang('create_user_fname_label', 'first_name');?>
			</div>
			<div class="col-lg-8">
            			<?php echo form_input($first_name);?>
     			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
            			<?php echo lang('create_user_lname_label', 'last_name');?> 
			</div>
			<div class="col-lg-8">
            			<?php echo form_input($last_name);?>
     			</div>
      		</div>
      <?php
      if($identity_column!=='email') {
          echo '<p>'; 
      ?>
	<div class="form-group">
      		<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
	<?php 
          echo lang('create_user_identity_label', 'identity');
        ?>
      </div>
	<div class="col-lg-8">
	<?php
          echo form_error('identity');
          echo form_input($identity);
	?>
		</div>
	</div>
	<?php
      }
      ?>
	<div class="form-group">
		<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
           		 <?php echo lang('create_user_company_label', 'company');?> 
		</div>
		<div class="col-lg-8">
            		<?php echo form_input($company);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
           		 <?php echo lang('create_user_email_label', 'email');?> 
		</div>
		<div class="col-lg-8">
           		 <?php echo form_input($email);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
           		 <?php echo lang('create_user_phone_label', 'phone');?>
		</div>
		<div class="col-lg-8">
            		<?php echo form_input($phone);?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
           		 <?php echo lang('create_user_password_label', 'password');?> 
		</div>
		<div class="col-lg-8">
          		  <?php echo form_input($password);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-4" style="padding-left:12%; font-size:125%;">
           		 <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> 
		</div>
		<div class="col-lg-8">
            		<?php echo form_input($password_confirm);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-8 col-lg-offset-4" style="font-size:135%;">
			<?php echo form_submit('submit', lang('create_user_submit_btn'));?>
		</div>
	</div>
</div>
<?php echo form_close();?>
 </body>
</html>
