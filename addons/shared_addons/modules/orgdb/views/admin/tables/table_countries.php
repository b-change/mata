<?php if (!empty($orgdb_countries)): ?>
	<table border="0" class="table-list" cellpadding="0" cellspacing="0">
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
						<?php echo anchor('admin/orgdb/edit/' . $_orgdb_data_countries->orgdb_country_id, lang('global:edit'), array('class'=>'button edit')) ?>
						<?php echo anchor('admin/orgdb/delete/' . $_orgdb_data_countries->orgdb_country_id, lang('global:delete'), array('class'=>'confirm button delete')) ?>
						<?php 
							if($_orgdb_data_countries->orgdb_country_status == TRUE) {
								echo anchor('admin/orgdb/countries/deactivate/' . $_orgdb_data_countries->orgdb_country_id, lang('orgdb:label:button:deactivate'), array('class' => 'button deactivate'));
							}
							else {
								echo anchor('admin/orgdb/countries/activate/'. $_orgdb_data_countries->orgdb_country_id, lang('orgdb:label:button:activate'), array('class'=> 'button activate'));
							}
						?>
					</td>
				</tr>
			<?php endforeach ?>
			<?php else: ?>
				<div class="no_data"><?php echo lang('orgdb:label:no_data');?></div>
		</tbody>
	</table>
<?php endif ?>