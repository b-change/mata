<section class="title">
	<h4><?php echo lang('orgdb:title:countries'); ?></h4>
	<a class="tooltip-s show-filter" original-title="<?php echo lang('firesale:label_showfilter'); ?>"></a>
</section>

<section class="item">
	<div class="content">
	
		<?php template_partial('filters') ?>
	
		<?php echo form_open('admin/orgdb/countries/action') ?>
		
			<div class="table_action_buttons">
				<button class="btn green" name="btnAction" value="activate"><span><?php echo lang('orgdb:label:button:activate'); ?></span></button>
                <button class="btn red" name="btnAction" value="deactivate"><?php echo lang('orgdb:label:button:deactivate'); ?></button>
                <button class="btn orange confirm" name="btnAction" value="delete"><?php echo lang('global:delete'); ?></button>  
			</div> <br />
		
			<div id="filter-stage">
				<?php template_partial('tables/table_countries') ?>
			</div>
		
			<div class="table_action_buttons">
				<button class="btn green" name="btnAction" value="activate"><span><?php echo lang('orgdb:label:button:activate'); ?></span></button>
                <button class="btn red" name="btnAction" value="deactivate"><?php echo lang('orgdb:label:button:deactivate'); ?></button>
                <button class="btn orange confirm" name="btnAction" value="delete"><?php echo lang('global:delete'); ?></button>  
			</div>
	
		<?php echo form_close() ?>
	</div>
</section>
