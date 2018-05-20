<div class="card">
	<div class="card-header bg-light">
		<h2 class="text-primary text-center">Update <?php echo $user->name; ?></h2>
	</div>
	<div class="card-body">
				
		<?php echo validation_errors("<p class='alert alert-danger'>"); ?>

		<?php echo form_open('users/edit/'.$user->id, array('id' => 'edit_form')); ?>

				<div class="form-group">
					<?php echo form_label('Name'); ?>
					<?php 
						$data = array(
							'class' => 'form-control',
							'name' => 'name',
							'value' => $user->name,
							'placeholder' => 'Enter Name'
						);
					?>
					<?php echo form_input($data); ?>
				</div>

				<div class="form-group">
					<?php echo form_label('Email'); ?>
					<?php 
						$data = array(
							'class' => 'form-control',
							'name' => 'email',
							'type' => 'email',
							'value' => $user->email,
							'placeholder' => 'Enter Email'
						);
					?>
					<?php echo form_input($data); ?>
				</div>

				<div class="form-group d-flex justify-content-center">
					<a href="<?php echo base_url(); ?>users" class="btn btn-outline-secondary">
						Voltar
					</a>
					&nbsp;
					<?php 
						$data = array(
							'class' => 'btn btn-outline-primary',
							'name' => 'submit',
							'value' => 'Atualizar'
						);
					?>
					<?php echo form_submit($data); ?>
				</div>


		<?php echo form_close(); ?>
	</div>
</div>