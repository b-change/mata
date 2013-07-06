<section class="title">
	<h4><?php echo lang('cats:label:respondent_id') .':'. $id;?></h4>
</section>

<section class="item">
	<div class="content">
	
		<div class="tabs">
	
			<ul class="tab-menu">
				<li><a href="#palate_01"><?php echo lang('cats:title:palate_01'); ?></a></li>
                <li><a href="#palate_02"><?php echo lang('cats:title:palate_02'); ?></a></li>
                <li><a href="#palate_03"><?php echo lang('cats:title:palate_03'); ?></a></li>
			</ul>
	
			<!-- Content tab -->
			<div class="form_inputs" id="palate_01">
				<fieldset>
					<ul>
						<?php foreach ($palate_01 as $key => $value): ?>
							<li class="even">
								<label for="orgdb_company"><?php echo $new_fields[$key]; ?></label>
								<div class="input">
									<?php echo $value; ?>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</fieldset>
			</div>
			<div class="form_inputs" id="palate_02">
				<fieldset>
					<ul>
						<?php foreach ($palate_02 as $key => $value): ?>
							<li class="even">
								<label for="orgdb_company"><?php echo $new_fields[$key]; ?></label>
								<div class="input">
									<?php echo $value; ?>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</fieldset>
			</div>
			<div class="form_inputs" id="palate_03">
				<fieldset>
					<ul>
						<?php foreach ($palate_03 as $key => $value): ?>
							<li class="even">
								<label for="orgdb_company"><?php echo $new_fields[$key]; ?></label>
								<div class="input">
									<?php echo $value; ?>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</fieldset>
			</div>
		</div>

		<div class="buttons">
			<?php //$this->load->view('admin/partials/buttons', array('buttons' => array('cancel') )) ?>
			<?php echo anchor('admin/cats/', lang('cats:label:back'), array('class'=>'btn blue view')) ?>
		</div>
	</div>
</section>