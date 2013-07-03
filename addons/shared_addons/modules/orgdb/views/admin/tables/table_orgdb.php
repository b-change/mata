<?php if (!empty($orgdb)): ?>
	<table id="sort_table">
		<thead>
			<tr>
				<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
				<th width="200"><?php echo lang('orgdb:label:orgdb_company') . ' / ' . lang('orgdb:label:orgdb_address');?></th>
				<th class="collapse" width="240"><?php echo lang('orgdb:label:orgdb_web'); ?></th>
				<th width="200"><?php echo lang('orgdb:label:orgdb_languages'); ?></th>
				<th width="150"><?php echo lang('orgdb:label:orgdb_country'); ?></th>
				<th width="20"><?php echo lang('orgdb:label:orgdb_status'); ?></th>
				<th class="align-center"><?php echo lang('orgdb:label:orgdb_action');?></th>
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
			<?php foreach ($orgdb as $_orgdb_data): ?>
				<tr>
					<td class="align-center"><?php echo form_checkbox('action_to[]', $_orgdb_data->orgdb_id) ?></td>
					<td><?php echo $_orgdb_data->orgdb_company; ?> <br />
        				<?php echo $_orgdb_data->orgdb_address_01;?><br />
			     		<?php echo $_orgdb_data->orgdb_address_02;?><br />
			        	<?php echo $_orgdb_data->orgdb_city;?><br />
			        	Postal Code : <?php echo $_orgdb_data->orgdb_postal;?> <br />
					</td>
					<td>
						Email 01	: <?php echo $_orgdb_data->orgdb_email_01;?><br />
        				Email 02	: <?php echo $_orgdb_data->orgdb_email_02;?><br />
        				Website		: <?php echo $_orgdb_data->orgdb_website ? $_orgdb_data->orgdb_website : lang('orgdb:label:col_nil'); ?> <br />
        				Phone No. 1 : <?php echo $_orgdb_data->orgdb_phone_01 ? $_orgdb_data->orgdb_phone_01 : lang('orgdb:label:col_nil'); ?> <br />
        				Phone No. 2 : <?php echo $_orgdb_data->orgdb_phone_02 ? $_orgdb_data->orgdb_phone_02 : lang('orgdb:label:col_nil'); ?><br />
        				Phone Ext	: <?php echo $_orgdb_data->orgdb_phone_ext ? $_orgdb_data->orgdb_phone_ext : lang('orgdb:label:col_nil'); ?> <br />
					</td>
					<?php 
		        		$_orgdb_lang_show = NULL;
		        		$_orgdb_lang_all = array('English' => $_orgdb_data->orgdb_lang_english, 'Bangla' => $_orgdb_data->orgdb_lang_bangla,
												'Khmer' => $_orgdb_data->orgdb_lang_khmer, 'Tetum' => $_orgdb_data->orgdb_lang_tetum, 
												'Japanese' => $_orgdb_data->orgdb_lang_japanese, 'Burmese' => $_orgdb_data->orgdb_lang_burmese, 
												'Pidgen' => $_orgdb_data->orgdb_lang_pidgen, 'Motu' => $_orgdb_data->orgdb_lang_motu, 
												'Vietnamese' => $_orgdb_data->orgdb_lang_vietnamese, 'Dzongkha' => $_orgdb_data->orgdb_lang_dzhongka, 
												'Mandarin' => $_orgdb_data->orgdb_lang_mandarin, 'Thai' => $_orgdb_data->orgdb_lang_thai, 
												'Laos' => $_orgdb_data->orgdb_lang_laos, 'Russian' => $_orgdb_data->orgdb_lang_russian, 
												'Nepali' => $_orgdb_data->orgdb_lang_nepali, 'Urdu' => $_orgdb_data->orgdb_lang_urdu, 
												'Sinhala' => $_orgdb_data->orgdb_lang_sinhala										
											);
						
						foreach ($_orgdb_lang_all as $_orgdb_lang_key => $_orgdb_lang_status): ?>
						<?php
							if ($_orgdb_lang_status == TRUE) {
								if (!isset($_orgdb_lang_show)){
									$_orgdb_lang_show .= $_orgdb_lang_key;
								}
								else {
									$_orgdb_lang_show .= ', '. $_orgdb_lang_key;
								} 
							} 
		        			endforeach;
		        		?>
        			<td class="collapse"><?php echo $_orgdb_lang_show; ?></td>
        			<td class="collapse"><?php echo img('/addons/shared_addons/modules/orgdb/img/flags/'. $_orgdb_data->orgdb_country. '.png', array('alt' => $_orgdb_data->orgdb_country));?> <?php echo $_orgdb_data->orgdb_country_sname; ?></td>
					<td class="collapse"><?php echo $_orgdb_data->orgdb_status == TRUE ? 'Activated' : 'Deactivated'; ?></td>
					<td class="actions">
						<?php echo anchor('admin/orgdb/edit/' . $_orgdb_data->orgdb_id, lang('global:edit'), array('class'=>'btn blue edit')) ?>
						<?php echo anchor('admin/orgdb/delete/' . $_orgdb_data->orgdb_id, lang('global:delete'), array('class'=>'btn red confirm')) ?>
						<?php 
							if($_orgdb_data->orgdb_status == TRUE) {
								echo anchor('admin/orgdb/deactivate/' . $_orgdb_data->orgdb_id, lang('orgdb:label:button:deactivate'), array('class' => 'btn red deactivate'));
							}
							else {
								echo anchor('admin/orgdb/activate/'. $_orgdb_data->orgdb_id, lang('orgdb:label:button:activate'), array('class'=> 'btn grees activate'));
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
<script>
$(function() {
	$('#sort_table').tablesorter({headers:{0:{sorter:false},8:{sorter:false}}, widgets:["saveSort"]});
});
</script>