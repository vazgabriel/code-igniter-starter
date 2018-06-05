<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-light">
			<h2 class="text-primary text-center">Register Form</h2>
		</div>
		<div class="card-body">
					
			<?php echo validation_errors("<p class='alert alert-danger'>"); ?>

			<?php echo form_open('register', array('id' => 'register_form')); ?>

					<div class="form-group">
						<?php echo form_label('Name'); ?>
						<?php 
							$data = array(
								'class' => 'form-control',
								'name' => 'name',
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
								'placeholder' => 'Enter Email'
							);
						?>
						<?php echo form_input($data); ?>
					</div>

					<div class="form-group">
						<?php echo form_label('Password'); ?>
						<?php 
							$data = array(
								'class' => 'form-control',
								'name' => 'password',
								'placeholder' => 'Enter Password'
							);
						?>
						<?php echo form_password($data); ?>
					</div>

					<div class="form-group">
						<?php echo form_label('Confirm Password'); ?>
						<?php 
							$data = array(
								'class' => 'form-control',
								'name' => 'confirm_password',
								'placeholder' => 'Confirm Password'
							);
						?>
						<?php echo form_password($data); ?>
					</div>

					<div class="form-group d-flex justify-content-center">
						<a href="<?php echo base_url(); ?>login" class="btn btn-outline-secondary">
							Login
						</a>
						&nbsp;
						<?php 
							$data = array(
								'class' => 'btn btn-outline-primary',
								'name' => 'submit',
								'value' => 'Register'
							);
						?>
						<?php echo form_submit($data); ?>
					</div>


			<?php echo form_close(); ?>
		</div>
	</div>
</div>