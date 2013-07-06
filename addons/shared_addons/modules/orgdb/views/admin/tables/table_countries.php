<?php if (!empty($orgdb_countries)): ?>
	<table id="sort_table">
		<thead>
			<tr>
				<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
				<th class="collapse"><?php echo lang('orgdb:label:orgdb_country_iso_02'); ?></th>
				<th class="collapse"><?php echo lang('orgdb:label:orgdb_country_iso_03'); ?></th>
				<th class="collapse"><?php echo lang('orgdb:label:orgdb_country_flag'); ?></th>
				<th><?php echo lang('orgdb:label:orgdb_country_sname'); ?></th>
				<th><?php echo lang('orgdb:label:orgdb_country_lname'); ?></th>
				<th class="collapse"><?php echo lang('orgdb:label:orgdb_country_status'); ?></th>
				<th width="230" class="align-center"><?php echo lang('orgdb:label:orgdb_action');?></th>
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
		<?php foreach ($orgdb_countries as $_orgdb_data_countries): ?>
				<tr>
					<td class="align-center"><?php echo form_checkbox('action_to[]', $_orgdb_data_countries->orgdb_country_id) ?></td>
					<td><?php echo $_orgdb_data_countries->orgdb_country_iso_02; ?></td>
					<td><?php echo $_orgdb_data_countries->orgdb_country_iso_03; ?></td>
					<td class="collapse"><?php echo img('/addons/shared_addons/modules/orgdb/img/flags/'. $_orgdb_data_countries->orgdb_country_iso_02. '.png', array('alt' => $_orgdb_data_countries->orgdb_country_iso_02));?></td>
					<td><?php echo $_orgdb_data_countries->orgdb_country_sname; ?></td>
					<td><?php echo $_orgdb_data_countries->orgdb_country_lname; ?></td>
        			<td class="collapse"><?php echo ($_orgdb_data_countries->orgdb_country_status == TRUE) ? 'Activated' : 'Deactivated'; ?></td>
					<td class="actions">
						<?php 
							if($_orgdb_data_countries->orgdb_country_status == TRUE) {
								echo anchor('admin/orgdb/countries/deactivate/' . $_orgdb_data_countries->orgdb_country_id, lang('orgdb:label:button:deactivate'), array('class' => 'btn red deactivate'));
							}
							else {
								echo anchor('admin/orgdb/countries/activate/'. $_orgdb_data_countries->orgdb_country_id, lang('orgdb:label:button:activate'), array('class'=> 'btn green activate'));
							}
						?>
						<?php echo anchor('admin/orgdb/countries/edit/' . $_orgdb_data_countries->orgdb_country_id, lang('global:edit'), array('class'=>'btn blue edit')) ?>
						<?php echo anchor('admin/orgdb/countries/delete/' . $_orgdb_data_countries->orgdb_country_id, lang('global:delete'), array('class'=>'btn orange confirm')) ?>
					</td>
				</tr>
			<?php endforeach ?>
			<?php else: ?>
				<div class="no_data"><?php echo lang('orgdb:label:no_data');?></div>
		</tbody>
	</table>
<?php endif ?>
<script>
$(function() {
	$('#sort_table').tablesorter({headers:{0:{sorter:false},8:{sorter:false}}, widgets:["saveSort"]});
});
</script>