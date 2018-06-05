<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-light">
			<h2 class="text-primary text-center">Login Form</h2>
		</div>
		<div class="card-body">

			<?php if($this->session->flashdata('login_error')): ?>
				<p class="alert alert-danger">
					<?php echo $this->session->flashdata('login_error'); ?>
				</p>
			<?php endif; ?>
					
			<?php echo validation_errors("<p class='alert alert-danger'>"); ?>

			<?php if($this->session->flashdata('message')): ?>
				<p class="alert alert-success">
					<?php echo $this->session->flashdata('message'); ?>
				</p>
			<?php endif; ?>

			<?php echo form_open('login', array('id' => 'login_form')); ?>

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

					<div class="form-group d-flex justify-content-center">
						<a href="<?php echo base_url(); ?>register" class="btn btn-outline-secondary">
							Register
						</a>
						&nbsp;
						<?php 
							$data = array(
								'class' => 'btn btn-outline-primary',
								'name' => 'submit',
								'value' => 'Login'
							);
						?>
						<?php echo form_submit($data); ?>
					</div>


			<?php echo form_close(); ?>
		</div>
	</div>
</div>