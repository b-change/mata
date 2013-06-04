<section class="title">
		<h4><?php echo sprintf(lang('orgdb:label:edit_company'), $orgdb['orgdb_company']);?></h4>
		<?php echo form_open_multipart(uri_string(), 'class="crud"') ?>
		<?php echo form_hidden('orgdb_id', $orgdb['orgdb_id']); ?>
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
							<label for="orgdb_company"><?php echo lang('orgdb:label:orgdb_company') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_company'], $orgdb['orgdb_company']); ?>
							</div>
						</li>
						<li>
							<label for="orgdb_address_01"><?php echo lang('orgdb:label:orgdb_address_01'); echo " <span>*</span> / "; echo lang('orgdb:label:orgdb_address_02');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_address_01'], $orgdb['orgdb_address_01']); ?> <br />
								<?php echo form_input($template_style['orgdb_address_02'], $orgdb['orgdb_address_02']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_language"><?php echo lang('orgdb:label:orgdb_languages') ?> <span>*</span></label>
							<div class="input-checkbox">
								<?php  
									$i = 0;
									foreach($this->template->_language_select as $key => $value) {
										if ($i==6) {
											$i = 0;
											$class = 'div-form-clear';
										} else {
											$i++;
											$class = 'div-form';
										}
										echo '<div class="'.$class.'">'.form_checkbox('orgdb_language[]', $key, $orgdb_full[0]->$key) .' <span class="checkbox-span">'.$value.'</span></div>' ;
									}
								?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_country"><?php echo lang('orgdb:label:orgdb_country') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_dropdown('orgdb_country', $this->template->_country_select, $orgdb['orgdb_country']) ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_city"><?php echo lang('orgdb:label:orgdb_city') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_city'], $orgdb['orgdb_city']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_postal"><?php echo lang('orgdb:label:orgdb_postal') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_postal'], $orgdb['orgdb_postal']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_phone_01"><?php echo lang('orgdb:label:orgdb_phone_01'); echo " <span>*</span> / "; echo lang('orgdb:label:orgdb_phone_02');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_phone_01'], $orgdb['orgdb_phone_01']); ?> <br />
								<?php echo form_input($template_style['orgdb_phone_02'], $orgdb['orgdb_phone_02']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_phone_ext"><?php echo lang('orgdb:label:orgdb_phone_ext') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_phone_ext'], $orgdb['orgdb_phone_ext']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_email_01"><?php echo lang('orgdb:label:orgdb_email_01'); echo " <span>*</span> / "; echo lang('orgdb:label:orgdb_email_02');?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_email_01'], $orgdb['orgdb_email_01']); ?> <br />
								<?php echo form_input($template_style['orgdb_email_02'], $orgdb['orgdb_email_02']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_website"><?php echo lang('orgdb:label:orgdb_website') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_website'], $orgdb['orgdb_website']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_comments"><?php echo lang('orgdb:label:orgdb_comments') ?> <span>*</span></label>
							<div class="input">
								<?php echo form_input($template_style['orgdb_comments'], $orgdb['orgdb_comments']); ?>
							</div>
						</li>
						<li class="even">
							<label for="orgdb_status"><?php echo lang('orgdb:label:orgdb_status') ?> <span>*</span></label>
							<div class="input-checkbox">
								<?php echo form_checkbox('orgdb_status', 1, $orgdb['orgdb_status']) .' <span class="checkbox-span">Activate</span>' ;?>
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