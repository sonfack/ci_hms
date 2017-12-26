<div class="row">
	<div class="col-sm-9">

	</div>
	<div class="col-sm-5 pull-right" style="text-align:right;  margin-top: 1%;">
	<i style="margin-right:8%;">	welcome <b><?php  echo $personnel_speciality[0]['personnel_speciality'].' '.$health_personnel[0]['health_personnel_name'] ; ?></b></i>
	<a href="<?php echo base_url().'index.php/users/auth/logout' ; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
</div>
</div>
<div class="row container" style="margin-top:5%; text-align:center; font-size:130%;">
	<div class="col-lg-4">
		<div class="thumbnail">
			<a href="<?php echo base_url().'index.php/patients/patient_controller' ; ?>">
				Patient
			</a>
			<div>
			
			</div>
		</div><!-- .thumbnail -->
	</div>
	<div class="col-lg-4">
		<div class="thumbnail">
			<a href="#">
				Laboratory
			</a>
		</div><!-- .thumbnail -->
	</div>
	<div class="col-lg-4">
		<div class="thumbnail">
			<a href="#">
				Pharmacy
			</a>
		</div><!-- .thumbnail -->
	</div>
</div>
<div class="row container" style="margin-top:5%; text-align:center; font-size:130%;">
	<div class="col-lg-4">
		<div class="thumbnail">
			<a href="#">
				Inventory
			</a>
		</div><!-- .thumbnail -->
	</div>
	<div class="col-lg-4">
		<div class="thumbnail">
			<a href="#">
				Biling
			</a>
		</div><!-- .thumbnail -->
	</div>
	<div class="col-lg-4">
		<div class="thumbnail">
			<a href="<?php echo base_url()."index.php/health_personnels/health_personnel_controller/" ; ?>">
				Health personnel
			</a>
		</div><!-- .thumbnail -->
	</div>
</div>
<?php // var_dump($this->session->all_userdata()) ; ?>
