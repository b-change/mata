<section class="title">
	<h4><?php echo lang('orgdb:title:countries'); ?></h4>
</section>

<section class="item">
	<div class="content">
	
		<?php template_partial('filters') ?>
	
		<?php echo form_open('admin/orgdb/countries/action') ?>
		
			<div class="table_action_buttons">
				<?php $this->load->view('admin/partials/buttons', array('buttons' => array('activate', 'deactivate', 'delete') )) ?>
			</div> <br />
		
			<div id="filter-stage">
				<?php template_partial('tables/table_countries') ?>
			</div>
		
			<div class="table_action_buttons">
				<?php $this->load->view('admin/partials/buttons', array('buttons' => array('activate', 'deactivate', 'delete') )) ?>
			</div>
	
		<?php echo form_close() ?>
	</div>
</section>
