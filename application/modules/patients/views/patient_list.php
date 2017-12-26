<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead style="font-size:130%;">
			<tr>
				<td>Matricul</td>
				<td>Name</td>
				<td>Age</td>
				<td>Phone</td>
				<td>Address</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach($patient_list as $patient){
		?>	
			<tr>
				<td><?php echo $patient['patient_matricul'] ; ?></td>
				<td><?php echo $patient['patient_first_name'].' '.$patient['patient_last_name'] ?></td>
				<td><?php 
					$year = explode('-', $patient['patient_birth']) ; 
					echo (int)date("Y")-(int)$year[0] ; ?></td>
				<td><?php echo $patient['patient_phone'] ; ?></td>
				<td><?php echo $patient['patient_address'] ; ?></td>
				<td><a href="<?php echo base_url().'index.php/patients/patient_controller/add/'.$patient['patient_id'] ; ?>" style="margin-right:10%;"><button>Modify</button></a><a href="<?php echo base_url().'index.php/patients/patient_controller/consult/'.$patient['patient_id'] ; ?>"><button>Consult</button></a></td>
			</tr>
				
		<?php	}?>
			
		</tbody>
	</table>
</div>
