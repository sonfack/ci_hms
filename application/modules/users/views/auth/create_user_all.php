<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <?php var_dump(base_url()); ?> 
    <link href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet" />
 <link href="<?php echo base_url().'assets/css/bootstrap-theme.css'; ?>" rel="stylesheet" />
        <script src="<?php echo base_url().'assets/js/jquery.js' ; ?>" ></script>
        <script src="<?php echo base_url().'assets/js/boostrap.js' ; ?>" ></script>
    <title>HMS</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queri
es --> 
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><
/script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js
"></script>
    <![endif]-->

</head>

<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
       <a class="navbar-brand" href="<?php echo site_url().'/index.php/blog/'.'welcome' ; ?>"><?php   echo $site_name ; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collaps
-1">

<?php if($this->session->user_id){ ?>
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon
-user"></span>Profile</a></li>
                        <li><a href="<?php echo base_url().'index.php/us
ers/auth/logout' ; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout
</a></li>
               </ul>
<?php }else{ ?>
         <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url().'index.php/us
ers/auth/login' ; ?>"><span class="glyphicon glyphicon-log-in"></span> Login
</a></li>
          </ul>

<?php } ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<br><br><br>
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
