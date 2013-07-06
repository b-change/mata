<?php if (!empty($cats)): ?>
	<table id="sort_table">
		<thead>
			<tr>
				<th width="30"></th>
				<th><?php echo lang('cats:label:respondent_id'); ?></th>
				<th><?php echo lang('cats:label:respondent_serial_number'); ?></th>
				<th><?php echo lang('cats:label:site_code'); ?></th>
				<th><?php echo lang('cats:label:data_collector_code'); ?></th>
				<th><?php echo lang('cats:label:place_of_enrollment'); ?></th>
				<th><?php echo lang('orgdb:label:orgdb_country'); ?></th>
				<th><?php echo lang('orgdb:label:orgdb_action'); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="8">
					<div class="inner"><?php $this->load->view('admin/partials/pagination') ?></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach ($cats as $_data): ?>
				<tr>
					<td class="align-center"><?php echo form_checkbox('action_to[]', bin2hex($_data->catsdb_id)) ?></td>
					<td><?php echo $_data->rid; ?></td>
					<td><?php echo $_data->rsn; ?></td>
					<td><?php echo $_data->stcde; ?></td>
					<td><?php echo $_data->dccde; ?></td>
					<td><?php echo $place_name[$_data->p1_a2]; ?></td>
					<td><?php echo $country_name[$_data->ctcde]; ?></td>
					<td class="actions">
						<?php echo anchor('admin/cats/view/' . $_data->rid, lang('global:view'), array('class'=>'btn blue view')) ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<div class="no_data"><?php echo lang('orgdb:label:no_data');?></div>
<?php endif ?>
<script>
$(function() {
	$('#sort_table').tablesorter({headers:{0:{sorter:false},8:{sorter:false}}, widgets:["saveSort"]});
});
</script>