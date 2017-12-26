
<form class="form-horizontal" method="POST" action="<?php echo base_url().'index.php/health_personnels/health_personnel_controller/add_speciality' ; ?>">
	<fieldset>
		<legend>Health speciality</legend>
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label col-sm-4 "  for="speciality">Speciality name</label>
				<div class="controls col-sm-8">
					<input type="text"  id="speciality" class="form-control" name="speciality" value="<?php echo set_value('speciality') ; ?>">
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label col-sm-4 "  for="sp_description">Speciality description</label>
				<div class="controls col-sm-8">
					<textarea  id="sp_description" class="form-control" name="sp_description" value="<?php echo set_value('sp_description') ; ?>"></textarea>
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
