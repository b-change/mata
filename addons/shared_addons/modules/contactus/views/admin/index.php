<section class="title">
	<h4><?php echo lang('contactus:title:contact');?></h4>
</section>

<section class="item">
	<div class="content">
		<?php echo form_open('admin/contactus/action') ?>
			<?php if (!empty($contacts)): ?>
				<div class="table_action_buttons">
					<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )) ?>
				</div> <br />
			
				<div id="filter-stage">
					<table border="0" class="table-list" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
								<th><?php echo lang('contactus:label:name');?></th>
								<th><?php echo lang('contactus:label:email'); ?></th>
								<th><?php echo lang('contactus:label:interested'); ?></th>
								<th><?php echo lang('contactus:label:date'); ?></th>
								<th width="200" class="align-center"><?php echo lang('contactus:label:action');?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($contacts as $row): ?>
								<tr>
									<td class="align-center"><?php echo form_checkbox('action_to[]', $row->id) ?></td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->email; ?></td>
									<td><?php echo $row->interested; ?></td>
									<td><?php echo $row->date; ?></td>
									<td class="align-center">
										<?php echo anchor('admin/contactus/preview/' . $row->id, lang('global:preview'), array('class'=>'button edit')) ?>
										<?php echo anchor('admin/contactus/delete/' . $row->id, lang('global:delete'), array('class'=>'confirm button delete')) ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="8">
									<div class="inner"><?php $this->load->view('admin/partials/pagination') ?></div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			
				<div class="table_action_buttons">
					<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )) ?>
				</div>
			<?php else: ?>
				<div class="no_data"><?php echo lang('contactus:list:nodata');?></div>
			<?php endif ?>
		<?php echo form_close() ?>
	</div>
</section>
