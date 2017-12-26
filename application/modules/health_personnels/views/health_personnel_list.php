<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead style="font-size:130%;">
			<tr>
				<td>Matricul</td>
				<td>Name</td>
				<td>Speciality</td>
				<td>Phone</td>
				<td>Address</td>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach($personnel_list as $personnel){
		?>	
			<tr>
				<td><?php echo $personnel['health_personnel_matricul'] ; ?></td>
				<td><?php echo $personnel['health_personnel_name'] ;?></td>
				<td>speciality</td>
				<td><?php echo $personnel['health_personnel_phone'] ; ?></td>
				<td><?php echo $personnel['health_personnel_address'] ; ?></td>
			</tr>
				
		<?php	}?>
			
		</tbody>
	</table>
</div>
