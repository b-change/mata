<PRE>
<?php 
		print_r ($orgdb);
?>
</PRE>
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
							<label for="orgdb_country"><?php echo lang('orgdb:label:orgdb_country') ?></label>
							<div class="input">
								<?php echo form_dropdown('orgdb_country', $this->template->_country_select, $orgdb['orgdb_country']) ?>
							</div>
						</li>
						<li class="even">
							<label for="active"><?php echo lang('user:activate_label') ?></label>
							<div class="input">
								
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