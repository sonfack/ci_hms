<div class="row">
		<div class="row col-lg-12">	
			<div style="text-align:center; font-size:160%; margin-bottom:2%; margin-top:2%;">
				<p><?php echo lang('create_user_subheading');?></p>

				<div id="infoMessage"><?php echo $message;?></div>
			</div>
		</div>
		<div class="row col-lg-12">
			
				<?php echo form_open("index.php/users/auth/create_user", array('class'=>'form-horizontal', 'role'=>'form'));?>
		<div class="form-group">
			<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
           			 <?php echo lang('create_user_fname_label', 'first_name');?>
			</div>
			<div class="col-lg-7">
            			<?php echo form_input($first_name);?>
     			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
            			<?php echo lang('create_user_lname_label', 'last_name');?> 
			</div>
			<div class="col-lg-7">
            			<?php echo form_input($last_name);?>
     			</div>
      		</div>
      <?php
      if($identity_column!=='email') {
          echo '<p>'; 
      ?>
	<div class="form-group">
      	<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
	<?php 
          echo lang('create_user_identity_label', 'identity');
        ?>
      </div>
	<div class="col-lg-7">
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
		<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
           		 <?php echo lang('create_user_company_label', 'company');?> 
		</div>
		<div class="col-lg-7">
            		<?php echo form_input($company);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
           		 <?php echo lang('create_user_email_label', 'email');?> 
		</div>
		<div class="col-lg-7">
           		 <?php echo form_input($email);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
           		 <?php echo lang('create_user_phone_label', 'phone');?>
		</div>
		<div class="col-lg-7">
            		<?php echo form_input($phone);?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
           		 <?php echo lang('create_user_password_label', 'password');?> 
		</div>
		<div class="col-lg-7">
          		  <?php echo form_input($password);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-3" style="padding-left:4%; font-size:125%;">
           		 <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> 
		</div>
		<div class="col-lg-7">
            		<?php echo form_input($password_confirm);?>
      		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-8 col-lg-offset-4" style="font-size:135%;">
			<?php echo form_submit('submit', lang('create_user_submit_btn'));?>
		</div>
	</div>

<?php echo form_close();?>
</div>
