<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead style="font-size:130%;">
			<tr>
				<td>Date</td>
				<td>Patient matricul</td>
				<td>Patient name</td>
				<td>Health personnel</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach($consultation_list as $consultation){
		?>	
			<tr>
				<td><?php echo $consultation['patient_parameter_date']?></td>
				<td><?php echo $consultation['patient_matricul'] ;?></td>
				<td><?php echo $consultation['patient_first_name'].' '.$consultation['patient_last_name']; ?></td>
				<td><?php echo $consultation['patient_parameter_consultation'] ;  ?>
				</td>
				<td><a href="<?php echo base_url().'index.php/patients/patient_controller/view_consultation/'.$consultation['patient_parameter_id'] ; ?>"><button>View consultation</button></a></td>
			</tr>
				
		<?php	}?>
			
		</tbody>
	</table>
</div>
