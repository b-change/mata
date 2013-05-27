<h2 class="page-title"><?php echo $module_details['name'] . ' : ' . lang('orgdb:title:orgdb') ?></h4>
	
<table border="0" width="100%">
		<?php 
		foreach($orgdb_main_data as $_orgdb_main_data): ?>
			<tr>
			<td>
			<?php echo 'Company : ' . $_orgdb_main_data->orgdb_company; ?> <br />
			<?php echo 'Address1 : ' . $_orgdb_main_data->orgdb_address_01; ?> <br />
			<?php echo 'Address2 : ' . $_orgdb_main_data->orgdb_address_02; ?> <br />
			<?php echo 'City : ' . $_orgdb_main_data->orgdb_city; ?> <br />
			<?php echo 'Postal : ' . $_orgdb_main_data->orgdb_postal; ?> <br />
			<?php echo 'Company : ' . $_orgdb_main_data->orgdb_company; ?> <br />
			<?php echo 'Address1 : ' . $_orgdb_main_data->orgdb_address_01; ?> <br />
			<?php echo 'Address2 : ' . $_orgdb_main_data->orgdb_address_02; ?> <br />
			<?php echo 'City : ' . $_orgdb_main_data->orgdb_city; ?> <br />
			<?php echo 'Postal : ' . $_orgdb_main_data->orgdb_postal; ?> <br />	<hr />
			</td>
			</tr>
		
			<?php endforeach; ?>
		
</table>