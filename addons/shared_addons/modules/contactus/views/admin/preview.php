<section class="title">
	<h4><?php echo lang('contactus:title:contact');?></h4>
</section>
<section class="item">
	<div class="content">
		<div class="field">
			<label for="name" class="preview-label"><?php echo lang('contactus:label:name') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->name ?></span>
		</div>
		<div class="field">
			<label for="company_name" class="preview-label"><?php echo lang('contactus:label:company_name') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->company_name ?></span>
		</div>
		<div class="field">
			<label for="company_website" class="preview-label"><?php echo lang('contactus:label:company_website') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->company_website ?></span>
		</div>
		<div class="field">
			<label for="email" class="preview-label"><?php echo lang('contactus:label:email') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->email ?></span>
		</div>
		<div class="field">
			<label for="telephone" class="preview-label"><?php echo lang('contactus:label:telephone') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->telephone ?></span>
		</div>
		<div class="field">
			<label for="country" class="preview-label"><?php echo lang('contactus:label:country') ?>:</label>
			<span class="preview-span"><?php echo $contacts[0]->country ?></span>
		</div>
		<div class="field">
			<label for="interested" class="preview-label"><?php echo lang('contactus:label:interested') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->interested ?></span>
		</div>
		<div class="field">
			<label for="preferred" class="preview-label"><?php echo lang('contactus:label:preferred') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->preferred ?></span>
		</div>
		<div class="field">
			<label for="comment" class="preview-label"><?php echo lang('contactus:label:comment') ?>: </label>
			<span class="preview-span"><?php echo $contacts[0]->comment ?></span>
		</div>
		<div class="table_action_buttons">
			<?php $this->load->view('admin/partials/buttons', array('buttons' => array('cancel') )) ?>
		</div>
	</div>
</section>