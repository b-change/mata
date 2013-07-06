<fieldset id="filters"  style="display: none">

	<legend><?php echo lang('global:filters') ?></legend>
	
	<?php echo form_open('') ?>
	<?php echo form_hidden('f_module', $module_details['slug']) ?>
		<ul>
			<li>
				<?php echo lang('orgdb:label:orgdb_country', 'f_active'); ?>
				<?php echo form_dropdown('f_country', array(0 => lang('global:select-all')) + $country_name) ?>
			</li>
			<li>
				<?php echo lang('cats:label:site_code', 'f_site'); ?>
				<?php echo form_input('f_site'); ?>
			</li>
			<li><?php echo lang('cats:label:data_collector_code', 'f_data_collector');?>
				<?php echo form_input('f_data_collector'); ?>
			</li>
			<li><?php echo lang('cats:label:respondent_serial_number', 'f_respondent_serial_number');?>
				<?php echo form_input('f_respondent_serial_number'); ?>
			</li>
			<li><?php echo lang('cats:label:place_of_enrollment', 'f_place_of_enrollment');?>
				<?php echo form_dropdown('f_place_of_enrollment', array(0 => lang('global:select-all')) + $place_name) ?>
			</li>
			<li><?php echo anchor(current_url(), lang('orgdb:label:button:refresh'), 'class="cancel"') ?></li>
		</ul>
	<?php echo form_close() ?>
</fieldset>