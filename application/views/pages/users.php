<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success">
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php else: if ($this->session->flashdata('error')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error'); ?>
	</div>
	<?php endif; ?>
<?php endif; ?>

<h3>Users</h3>
<table class="table">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($users && count($users) > 0): ?>
			<?php foreach($users as $user): ?>
				<tr>
					<td>
						<?php echo $user->id; ?>
					</td>
					<td>
						<?php echo $user->name; ?>
					</td>
					<td>
						<?php echo $user->email; ?>
					</td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
						  <a href="<?php echo base_url(); ?>users/view/<?php echo $user->id; ?>" class="btn btn-outline-primary">
								<i class="fas fa-eye"></i>
						  </a>
						  <a href="<?php echo base_url(); ?>users/edit/<?php echo $user->id; ?>" class="btn btn-outline-warning">
								<i class="fas fa-edit"></i>
						  </a>
						  <a
						  	onclick="return confirm('Você tem certeza que quer excluir o <?php echo $user->name; ?>?');"
						  	href="<?php echo base_url(); ?>users/delete/<?php echo $user->id; ?>"
						  	class="btn btn-outline-danger">
								<i class="fas fa-trash-alt"></i>
						  </a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>