<section class="title">
		<h4><?php echo sprintf(lang('orgdb:label:edit_country'), $orgdb_country['orgdb_country_sname']);?></h4>
		<?php echo form_open_multipart(uri_string(), 'class="crud"') ?>
		<?php echo form_hidden('orgdb_country_id', $orgdb_country['orgdb_country_id']); ?>
</section>

<section class="item">
	<div class="content">
	
		<div class="tabs">
	
			<ul class="tab-menu">
				<li><a href="#user-basic-data-tab"><span><?php echo lang('profile_user_basic_data_label') ?></span></a></li>
			</ul>
	
			<!-- Content tab -->
			<div class="form_inputs" id="user-basic-data-tab">
				<fieldset>
					<ul>
						<li class="even">
							<label for="orgdb_country_iso_02"><?php echo lang('orgdb:label:orgdb_country_iso_02') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_country_iso_02'], $orgdb_country['orgdb_country_iso_02']); ?>
							</div>
						</li>
						<li>
							<label for="orgdb_country_iso_03"><?php echo lang('orgdb:label:orgdb_country_iso_03');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_country_iso_03'], $orgdb_country['orgdb_country_iso_03']); ?>
							</div>
						</li>
						<li>
							<label for="orgdb_country_iso_00"><?php echo lang('orgdb:label:orgdb_country_iso_00');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_country_iso_00'], $orgdb_country['orgdb_country_iso_00']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_country_sname"><?php echo lang('orgdb:label:orgdb_country_sname') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_country_sname'], $orgdb_country['orgdb_country_sname']); ?>
							</div>
						</li>
						<li>
							<label for="orgdb_country_lname"><?php echo lang('orgdb:label:orgdb_country_lname');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_country_lname'], $orgdb_country['orgdb_country_lname']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_country_is_un"><?php echo lang('orgdb:label:orgdb_country_is_un') ?></label>
							<div class="input-checkbox">
								<?php echo form_checkbox('orgdb_country_is_un', 1, $orgdb_country['orgdb_country_is_un']) .' <span class="checkbox-span">Yes</span>' ;?>
							</div>
						</li>
						<li>
							<label for="orgdb_country_code"><?php echo lang('orgdb:label:orgdb_country_code');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_country_code'], $orgdb_country['orgdb_country_code']); ?>
							</div>
						</li>
						<li>
							<label for="orgdb_country_tld"><?php echo lang('orgdb:label:orgdb_country_tld');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_country_tld'], $orgdb_country['orgdb_country_tld']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_country_status"><?php echo lang('orgdb:label:orgdb_country_status') ?></label>
							<div class="input-checkbox">
								<?php echo form_checkbox('orgdb_country_status', 1, $orgdb_country['orgdb_country_status']) .' <span class="checkbox-span">Activate</span>' ;?>
							</div>
						</li>

					</ul>
				</fieldset>
			</div>
		</div>

		<div class="buttons">
			<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel') )) ?>
		</div>
	
	<?php echo form_close() ?>

	</div>
</section>