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
<br>
<div class="row">
	<fieldset>
		<legend>Patient parameters</legend>
		
				<div class="col-sm-6">
					<div class="row">
						<label class="control-label col-sm-4 "  for="height">Height</label>
						<div class="controls col-sm-8">
							<?php echo $consultation[0]['patient_parameter_height'] ; ?>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-sm-4 "  for="weight">Weight</label>
						<div class="controls col-sm-8">
							<?php echo $consultation[0]['patient_parameter_weight'] ; ?>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-sm-4 "  for="temperature">Temperature</label>
						<div class="controls col-sm-8">
							<?php echo $consultation[0]['patient_parameter_temperature'] ; ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<label class="control-label col-sm-4 "  for="rhesus">Rhesus</label>
						<div class="controls col-sm-8">
							<?php echo $consultation[0]['patient_parameter_rhesus'] ; ?>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-sm-4 "  for="blood_pressure">Blood pressure</label>
						<div class="controls col-sm-8">
							<?php echo $consultation[0]['patient_parameter_blood_pressure'] ; ?>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-sm-4 "  for="heartbeat">Heartbeat</label>
						<div class="controls col-sm-8">
							<?php echo $consultation[0]['patient_parameter_heartbeat'] ; ?>
						</div>
					</div>
				</div>
			
	</fieldset>
</div>
<br>
<br>
<div class="row">
		<fieldset>
		<legend>Consultation reason</legend>
		<div class="row">
			<label class="control-label col-sm-12 " style="text-align:center;"  for="reason">Reason</label>
			<div class="controls col-sm-12">
				<?php echo $consultation[0]['patient_parameter_consultation'] ; ?>
			</div>
		</div>
	</fieldset>
</div>
<br>
<br>
<div class="row">
	<fieldset>
		<legend>Diagnostics</legend>
		<form class="form-horizontal" method="POST" id="diagnostic" action="<?php echo base_url().'index.php/patients/patient_controller/diagnostic/'.$patient[0]['patient_id'] ;  ?>">
		<div class='form-group'>
		<div class="row" style="text-align:center; font-size:160%; font-weight:bold;">
			<button class="btn btn-primary" id="save_diagnostic">save</button>
		</div>
		</form>
	</fieldset>
</div>

<div class="row">
	<button id="add_diagnostic">Add new diagnostic</button>
</div>
<br>
<br>
