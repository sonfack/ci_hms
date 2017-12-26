<?php echo validation_errors(); ?>
<?php // var_dump($medical_background)."<br><br>"; ?><?php // var_dump($background_type) ; ?>
<?php if(isset($patient) && !empty($patient)){ ?>
	<form class="form-horizontal" method="POST" action="<?php echo base_url().'index.php/patients/patient_controller/add/'.$patient[0]['patient_id'] ;?>">
<?php  }else { ?>
 	<form class="form-horizontal" method="POST" action="<?php echo base_url().'index.php/patients/patient_controller/add' ;?>">
<?php	} ?>
	<div class="row">
		<div class="col-sm-6">
			 <fieldset>
				<legend>Patient information</legend>
				<div class="form-group" >
					<label class="control-label col-sm-4 "  for="matricul">Matricul</label>
					<div class="controls col-sm-8">
						<input type="text"  id="matricul" style="background-color:lightgray;" class="form-control" name="matricul" value="<?php if(isset($patient) && !empty($patient)){
							 echo $patient[0]['patient_matricul'] ; }else{echo set_value('matricul') ;} ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 "  for="first_name">First name</label>
					<div class="controls col-sm-8">
						<input type="text"  id="first_name" class="form-control" name="first_name" value="<?php if(isset($patient) && !empty($patient)){
							 echo $patient[0]['patient_first_name'] ; }else{ echo set_value('first_name') ;} ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="last_name">Last name</label>
					<div class="controls col-sm-8">
						<input type="text" id="last_name" class="form-control" name="last_name" value="<?php if(isset($patient) && !empty($patient)){
							 echo $patient[0]['patient_last_name'] ; }else{  echo set_value('last_name') ; }?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="sexe">Sexe</label>
					<div class="controls col-sm-8">
						<select id="sexe" name="sexe">
							<option <?php 
								if(isset($patient) && !empty($patient)){ 
									if($patient[0]['patient_sexe'] == 'M'){ echo 'selected' ;}
								} ?> value="M">M</option>
							<option <?php 
								if(isset($patient) && !empty($patient)){ 
									if($patient[0]['patient_sexe'] == 'F'){ echo 'selected' ;}
								} ?> value="F">F</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="birth">Date of birth</label>
					<div class="controls col-sm-8">
						<input type="text" id="birth" class="form-control" name="birth" value="<?php if(isset($patient) && !empty($patient)){
							$birth = explode('-', $patient[0]['patient_birth']);  echo $birth[2].'-'.$birth[1].'-'.$birth[0] ; }else{  echo set_value('birth') ; } ?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="marital">Marital status</label>
					<div class="controls col-sm-8">
						<select name="marital_status">
							<?php foreach($marital_status as $value){ ?>
								<option <?php if(isset($patient) && !empty($patient)){
													if($patient[0]['marital_status_id'] == $value['marital_status_id']){ echo 'selected' ;}  } ?> value="<?php echo $value['marital_status_id'] ; ?>"><?php echo $value['marital_status'] ; ?></option>
							<?php	} ?>
						</select>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="col-sm-6">
			<fieldset>
				<legend>Patient address</legend>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Email</label>
					<div class="controls col-sm-8">
						<input type="email" id="email" class="form-control" name="email" value="<?php if(isset($patient) && !empty($patient)){
							 echo $patient[0]['patient_email'] ; }else{  echo set_value('email') ; } ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="phone">Phone number</label>
					<div class="controls col-sm-8">
						<input type="tel" id="phone" class="form-control" name="phone" value="<?php if(isset($patient) && !empty($patient)){
							 echo $patient[0]['patient_phone'] ; }else{  echo set_value('phone') ; } ?>">
					</div>
				</div>
				<div class="form-group">
					<label  class="control-label col-sm-4" for="address">Patient address</label>
					<div class="controls col-sm-8">
						<textarea name="address" class="form-control" rows="5" id="address" > 
							<?php 
								if(isset($patient) && !empty($patient)){
									echo $patient[0]['patient_address'] ; }else{  echo set_value('address') ; 
								} ?>
						</textarea>
					</div>
				</div>
			</fieldset>
		</div>
	
	</div>
	<div class="row">
		<div class="col-sm-6">
			<fieldset>
					<legend>Patient medical background</legend>
					<div class="form-group">
					<?php if(!empty($background_type)){ 
						foreach($background_type as $background){
						if($background['type_background_id'] == 1){ ?>
								<label  class="control-label col-sm-4" for="blood"><?php echo  $background['type_background_name'] ; ?></label>
								<div class="controls col-sm-8">
									<select name="blood">
									<?php foreach($blood_group as $blood){ ?> 
										<option <?php if(isset($blood_mg_id) && min($blood_mg_id) == $blood['medical_background_id']){echo 'selected' ;} ?>  value="<?php echo $blood['medical_background_id'] ; ?>"><?php echo $blood['medical_background'] ; ?></option>
									<?php  }?>
									</select>
								</div>
					</div>
					<?php }else{ ?>
						<div class="form-group">
							<label class="control-label col-sm-4" for="<?php echo strtolower(preg_replace('/\s+/', '_', $background['type_background_name'])); ?>"><?php echo  $background['type_background_name'] ; ?></label>
							<div class="controls col-sm-8">
								<?php
								 //var_dump($background); 
								 if(isset($medical_background) && !empty($medical_background)){
										
											foreach($medical_background as $value){ 
										if($background['type_background_id'] == $value['type_background_id']){ ?>
								<input type="text" class="form-control" id="<?php echo strtolower(preg_replace('/\s+/', '_', $background['type_background_name'])); ?>" name="<?php echo strtolower(preg_replace('/\s+/', '_', $background['type_background_name'])); ?>" value="<?php echo $value['medical_background'] ; ?>" >
								<?php } } }else{ ?>
									
									
									<input type="text" class="form-control" id="<?php echo strtolower(preg_replace('/\s+/', '_', $background['type_background_name'])); ?>" name="<?php echo strtolower(preg_replace('/\s+/', '_', $background['type_background_name'])); ?>" value="" >
								
							<?php	}?>
							</div>
						</div>
					<?php 	} 
						
						}
					}elseif(isset($medical_background) && !empty($medical_background)){
							foreach($medical_background as $background){ ?>	
					<?php	
							}
					}?>
			</fieldset>
		</div>
		<div class="col-sm-6">
			<fieldset>
				<legend>Patient relative address</legend> 
				<div class="form-group">
					<label class="control-label col-sm-4" for="rel_name">Relative name</label>
					<div class="controls col-sm-8">
						<input type="text"  class="form-control" name="relative_name" value="<?php if(isset($patient_relative) && !empty($patient_relative)){
							 echo $patient_relative[0]['patient_relative_name'] ; }else{ echo set_value('relative_name') ; }?>">
					</div>
				</div>
				<div class="form-group">	
					<label class="control-label col-sm-4" for="rel_phone">Relative phone number</label>
					<div class="controls col-sm-8">
						<input type="tel" class="form-control" name="relative_phone" value="<?php if(isset($patient_relative) && !empty($patient_relative)){
							 echo $patient_relative[0]['patient_relative_phone'] ; }else{  echo set_value('relative_phone') ; }?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="rel_address">Relative address</label>
					<div class="controls col-sm-8">
						<textarea name="relative_address" class="form-control" rows="5" id="relative_address" >
							<?php if(isset($patient_relative) && !empty($patient_relative)){
							 echo $patient_relative[0]['patient_relative_address'] ; }else{  echo set_value('relative_address') ;} ?> 
						</textarea>
					</div>
				</div>
			</fieldset>
		</div> 
	</div>
	<hr>
	<div class="row">
		<div class="form-group">
			<div class="controls" style="text-align:center;">
				<input class="btn btn-primary" type="submit" value="Register" style="font-size:150%;">
			</div>
			
		</div>
		
	</div>
</form>
