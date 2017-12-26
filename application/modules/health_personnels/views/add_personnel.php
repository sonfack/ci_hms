
<form class="form-horizontal" method="POST" action="<?php echo base_url().'index.php/health_personnels/health_personnel_controller/add_personnel' ; ?>">
	<fieldset>
		<legend>Personnel</legend>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label col-sm-4 "  for="personnel_matricul">Personnel matricul</label>
					<div class="controls col-sm-8">
						<input type="text"  id="personnel_matricul" class="form-control" name="personnel_matricul" value="<?php echo set_value('personnel_matricul') ; ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label col-sm-4 "  for="personnel_name">Personnel name</label>
					<div class="controls col-sm-8">
						<input type="text"  id="personnel_name" class="form-control" name="personnel_name" value="<?php echo set_value('personnel_name') ; ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label col-sm-4 "  for="personnel_speciality">Personnel speciality</label>
					<div class="controls col-sm-8">
						<select name="personnel_speciality">
							<?php foreach($list_speciality as $speciality){ ?>
								<option value="<?php echo $speciality['personnel_speciality_id'] ; ?>"><?php echo   $speciality['personnel_speciality'] ; ?></option>
							<?php	} ?>
						</select>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label col-sm-4 "  for="personnel_phone">Personnel phone</label>
					<div class="controls col-sm-8">
						<input type="text"  id="personnel_phone" class="form-control" name="personnel_phone" value="<?php echo set_value('personnel_phone') ; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 "  for="personnel_email">Personnel email</label>
					<div class="controls col-sm-8">
						<input type="text"  id="personnel_email" class="form-control" name="personnel_email" value="<?php echo set_value('personnel_email') ; ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label col-sm-4 "  for="personnel_phone">Personnel address</label>
					<div class="controls col-sm-8">
						<textarea  id="personnel_address" class="form-control" name="personnel_address" value="<?php echo set_value('personnel_address') ; ?>"></textarea>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
	<div class="row">
		<div class="form-group">
			<div class="controls" style="text-align:center; margin-top:2%;">
				<input class="btn btn-primary" type="submit" value="Register" style="font-size:150%;">
			</div>
			
		</div>
		
	</div>
</form>
