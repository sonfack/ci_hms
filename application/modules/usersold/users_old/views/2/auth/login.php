<html>
   <head>
	<title>Admin</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet" />
	<link href="<?php echo base_url().'assets/css/bootstrap-theme.css'; ?>" rel="stylesheet" />
	<script src="<?php echo base_url().'assets/js/boostrap.js' ; ?>" ></script>
	<script src="<?php echo base_url().'assets/js/jquery.js' ; ?>" ></script>
   </head>
   <body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 " style="text-align:center;">
				<h1><?php echo lang('login_heading');?></h1>
				<p><?php echo lang('login_subheading');?></p>
			<div id="infoMessage"><?php echo $message;?></div>
		</div>
	</div>
	<div class="row">
        <div class="col-md-4 col-md-offset-4">
        	<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align:center;":></h3>
                </div>
			<div class="panel-body">
				<?php echo form_open("index.php/users/auth/login");?>
					<fieldset>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
    								<?php echo lang('login_identity_label', 'identity');?>
								</div>
								<div class="col-md-8">
    								<?php echo form_input($identity);?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
    								<?php echo lang('login_password_label', 'password');?>
								</div>
								<div class="col-md-8">
    								<?php echo form_input($password);?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<?php echo lang('login_remember_label', 'remember');?>
    						<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4 col-md-offset-4">
									<?php echo form_submit('submit', lang('login_submit_btn'));?>
								</div>
							</div>
						</div>
					</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	</div>
   </body>
</html>
