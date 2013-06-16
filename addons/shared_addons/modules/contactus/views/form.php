<section class="title">
	<div class="header">Secretariat Office</div>
	<div class="cleardiv"></div>
	<div class="subheader">Asia Pacific Network of Positive People</div>
	51/2,3rd & 4th floor Ruam Rudee Bldg.III Soi Ruam Rudee,<br />
	Ploenchit Rd., Lumpini,Pathumwan,<br />
	Bangkok 10330 THAILAND
	<div class="cleardiv"></div>
	Tel : +662-2557477, +662-2557478, +662-2557480
	<div class="cleardiv"></div>
	Fax : +662-2557479<br />
	Email:  apnplus.communication@gmail.com<br />
	Website : www.apnplus.org<br /><br />
	<hr /><br />
</section>
<?php
	if (validation_errors('error')) {
		echo '<div class="alert error animated fadeIn">'.validation_errors().'</div>';
	} else {
		echo validation_errors('success');
	}
?>
<section class="item">
	<div class="form-content">
		<?php echo form_open_multipart($this->uri->uri_string(), 'class="crud"'); ?>
			<div class="field">
				<label for="name"><?php echo lang('contactus:label:name') ?> <span>*</span></label>
				<?php echo form_input($template_style['name'], set_value('name', $contactus->name)) ?>
			</div>
			<div class="field">
				<label for="company_name"><?php echo lang('contactus:label:company_name') ?></label>
				<?php echo form_input($template_style['company_name']) ?>
			</div>
			<div class="field">
				<label for="company_website"><?php echo lang('contactus:label:company_website') ?></label>
				<?php echo form_input($template_style['company_website']) ?>
			</div>
			<div class="field">
				<label for="email"><?php echo lang('contactus:label:email') ?> <span>*</span></label>
				<?php echo form_input($template_style['email'], set_value('email', $contactus->email)) ?>
			</div>
			<div class="field">
				<label for="telephone"><?php echo lang('contactus:label:telephone') ?> <span>*</span></label>
				<?php echo form_input($template_style['telephone'], set_value('telephone', $contactus->telephone)) ?>
			</div>
			<div class="field">
				<label for="country"><?php echo lang('contactus:label:country') ?></label>
				<?php echo form_dropdown('country', $this->template->_country_select, 'default', 'style="width: 200px; margin: 0px;"') ?>
			</div>
			<div class="field">
				<label for="interested"><?php echo lang('contactus:label:interested') ?></label>
				<?php echo form_dropdown('interested', $this->template->_interested_select, 'default', 'style="width: 200px; margin: 0px;"') ?>
			</div>
			<div class="field">
				<label for="preferred"><?php echo lang('contactus:label:preferred') ?></label>
				<?php echo form_dropdown('preferred', $this->template->_preferred_select, 'default', 'style="width: 200px; margin: 0px;"') ?>
			</div>
			<div class="field">
				<label for="comment"><?php echo lang('contactus:label:comment') ?> <span>*</span></label>
				<?php echo form_textarea($template_style['comment'], set_value('comment', $contactus->comment)) ?>
			</div>
			<div class="action-button">
				<?php echo form_submit('btnSubmit',lang('contactus:button:submit'), 'style="margin:0"') ?>
				<?php echo form_reset('btnReset',lang('contactus:button:reset'), 'style="margin:0"') ?>
			</div>
		<?php echo form_close() ?>
	</div>
</section>
