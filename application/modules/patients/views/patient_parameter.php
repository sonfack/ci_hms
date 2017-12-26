<div class="row" style="background-color:lightgray; font-weight:bold; font-size:120%; padding : 2%; margin:2%;" >
	<div class="col-sm-6" >
		<div class="col-sm-4" style="text-align: right;">Matricul:</div>
		<div class="col-sm-8"><?php echo $patient[0]['patient_matricul'] ; ?></div><br>
		<div class="col-sm-4" style="text-align: right;">Name:</div>
		<div class="col-sm-8"><?php echo $patient[0]['patient_first_name'].' '. $patient[0]['patient_last_name'] ; ?></div><br>
		<div class="col-sm-4" style="text-align: right;">Age:</div>
		<div class="col-sm-8"><?php $year = explode('-', $patient[0]['patient_birth']) ; 
					echo (int)date("Y")-(int)$year[0] ; ?></div>
	</div>
	<div class="col-sm-6">
		<div class="col-sm-4" style="text-align: right;">Sexe:</div>
		<div class="col-sm-8"><?php echo $patient[0]['patient_sexe'] ; ?></div><br>
		<div class="col-sm-4" style="text-align: right;">Phone:</div>
		<div class="col-sm-8"><?php echo $patient[0]['patient_phone'] ; ?></div><br>
		<div class="col-sm-4" style="text-align: right;">Address:</div>
		<div class="col-sm-8"><?php echo $patient[0]['patient_address'] ; ?></div>
	</div>
</div>
<?php echo validation_errors(); ?>
<form class="form-horizontal" action="<?php echo base_url().'index.php/patients/patient_controller/consult/'.$patient[0]['patient_id'] ; ?>" method="POST">
	<div class="row">
	<fieldset>
		<legend>Patient parameters</legend>
		
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-4 "  for="height">Height</label>
						<div class="controls col-sm-8">
							<input type="text"  id="height" class="form-control" name="height" value="<?php echo set_value('height') ; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4 "  for="weight">Weight</label>
						<div class="controls col-sm-8">
							<input type="text"  id="weight" class="form-control" name="weight" value="<?php echo set_value('weight') ; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4 "  for="temperature">Temperature</label>
						<div class="controls col-sm-8">
							<input type="text"  id="temperature" class="form-control" name="temperature" value="<?php echo set_value('temperature') ; ?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-4 "  for="rhesus">Rhesus</label>
						<div class="controls col-sm-8">
							<input type="text"  id="rhesus" class="form-control" name="rhesus" value="<?php echo set_value('rhesus') ; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4 "  for="blood_pressure">Blood pressure</label>
						<div class="controls col-sm-8">
							<input type="text"  id="blood_pressure" class="form-control" name="blood_pressure" value="<?php echo set_value('blood_pressure') ; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4 "  for="heartbeat">Heartbeat</label>
						<div class="controls col-sm-8">
							<input type="text"  id="heartbeat" class="form-control" name="heartbeat" value="<?php echo set_value('heartbeat') ; ?>">
						</div>
					</div>
				</div>
			
	</fieldset>
</div>
	<div class="row">
		<fieldset>
			<legend>Consultation reason</legend>
			<div class="form-group">
				<label class="control-label col-sm-12 " style="text-align:center;"  for="reason">Reason</label>
				<div class="controls col-sm-12">
					<textarea name="reason" class="form-control" rows="5" id="reason" value="<?php echo set_value('reason') ; ?>"></textarea>
				</div>
			</div>
		</fieldset>
	</div>
	
	<div class="row">
		<div class="form-group">
			<div class="controls" style="text-align:center; margin-top:2%;">
				<input class="btn btn-primary" type="submit" value="Register" style="font-size:150%;">
			</div>
			
		</div>
		
	</div>
	
</form>
