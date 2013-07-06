<section class="title">
	<h4><?php echo lang('cats:title:cats') ?></h4>
	<a class="tooltip-s show-filter" original-title="<?php echo lang('cats:label_showfilter'); ?>"></a>
</section>

<section class="item">
	<div class="content">
	
		<?php template_partial('filters') ?>
	
		<?php echo form_open('admin/cats/action') ?>
		
			<div class="table_action_buttons">
				<?php //$this->load->view('admin/partials/buttons', array('buttons' => array('activate', 'deactivate', 'delete') )) ?>
			</div> <br />
		
			<div id="filter-stage">
				<?php template_partial('tables/table_cats') ?>
			</div>
		
			<div class="table_action_buttons">
				<?php //$this->load->view('admin/partials/buttons', array('buttons' => array('activate', 'deactivate', 'delete') )) ?>
			</div>
	
		<?php echo form_close() ?>
	</div>
</section>