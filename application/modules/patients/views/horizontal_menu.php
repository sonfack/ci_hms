<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class=" col-sm-1 navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu_collaps" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 </button>
			<a class="navbar-brand" href="#">PM</a>
		</div>
		<div class="collapse navbar-collapse" id="menu_collaps">
			<ul class="col-sm-8 nav navbar-nav">
				<li class="active"><a href="<?php echo base_url()."index.php/patients/patient_controller/" ; ?>">Patients</a></li>
				<li><a href="<?php echo base_url().'index.php/patients/patient_controller/add' ; ?>">Register new patient</a></li>
				<li><a href="<?php echo base_url().'index.php/patients/patient_controller/consult' ; ?>">Consult patient</a></li>
				<li><a href="#">Patient diagnostic</a></li>
				<li><a href="#">Patient medication</a></li>
			</ul>
			<div class="col-sm-3 pull-right" style="text-align:right;  margin-top: 1%;">
				
				<a href="<?php echo base_url().'index.php/users/auth/logout' ; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
		
			</div>
		</di>
	</div>
</nav>
<diV>
	<form class="navbar-form" role="search">
		<div class="input-group col-sm-6">
			<input type="text" class="form-control" placeholder="Search" name="search_patient" id="search_patient" >
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>
	</form>
</diV>
