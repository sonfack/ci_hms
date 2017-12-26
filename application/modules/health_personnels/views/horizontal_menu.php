<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class=" col-sm-1 navbar-header">
			<a class="navbar-brand" href="#">AM</a>
		</div>
		<ul class="col-sm-8 nav navbar-nav">
			<li class="active"><a href="<?php echo base_url()."index.php/health_personnels/health_personnel_controller/" ; ?>">Health personnels</a></li>
			<li><a href="<?php echo base_url().'index.php/health_personnels/health_personnel_controller/add_speciality' ; ?>">Register new speciality</a></li>
			<li><a href="<?php echo base_url().'index.php/health_personnels/health_personnel_controller/add_personnel' ; ?>">Register new personnel</a></li>
		</ul>
		<div class="col-sm-3 pull-right" style="text-align:right;  margin-top: 1%;">
			
				<a href="<?php echo base_url().'index.php/users/auth/logout' ; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
			
        </div>
	</div>
</nav>
<div class="row">
	<form class="navbar-form" role="search">
		<div class="input-group col-sm-6">
			<input type="text" class="form-control" placeholder="Search" name="search_patient" id="search_patient" >
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>
	</form>
</div>

