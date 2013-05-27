<fieldset id="filters">

	<legend><?php echo lang('global:filters') ?></legend>
	
	<?php echo form_open('') ?>
	<?php echo form_hidden('f_module', $module_details['slug']) ?>
		<ul>
			<li>
				<?php echo lang('orgdb:label:orgdb_active', 'f_active'); ?>
				<?php echo form_dropdown('f_active', array(0 => lang('global:select-all'), 1 => lang('orgdb:label:dropdown:activated'), 2 => lang('orgdb:label:dropdown:deactivated') ), array(0)) ?>
			</li>
			<li>
				<?php echo lang('orgdb:label:orgdb_country', 'f_country'); ?>
				<?php echo form_dropdown('f_country', array(0 => lang('global:select-all')) + $_country_select) ?>
			</li>
			<li><?php echo lang('orgdb:label:orgdb_keywords', 'f_keywords');?>
				<?php echo form_input('f_keywords'); ?>
			</li>
			<li><?php echo anchor(current_url(), lang('orgdb:label:button:refresh'), 'class="cancel"') ?></li>
		</ul>
	<?php echo form_close() ?>
</fieldset>