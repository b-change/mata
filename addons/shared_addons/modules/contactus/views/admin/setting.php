<section class="title">
	<h4><?php echo lang('contactus:title:contact');?></h4>
</section>
<section class="item">
	<div class="content">
		<?php echo form_open_multipart($this->uri->uri_string(), 'class="crud"'); ?>
			<div class="span">
				<label for="name"><?php echo lang('contactus:label:email_destination') ?> <span>*</span></label>
				<?php echo form_input($template_style['email'], set_value('email', $emails[0]->email)) ?>
			</div>
			<div class="cleardiv"></div>
			<div>
				<?php echo form_submit('btnSubmit',lang('contactus:button:save')) ?>
				<?php echo form_reset('btnReset',lang('contactus:button:reset')) ?>
			</div>
		<?php echo form_close() ?>
	</div>
</section>