<div class="card">
	<div class="card-header">
		<div class="row align-items-center">
			<a href="<?php echo base_url(); ?>users" class="btn btn-outline-secondary">
				<i class="fas fa-arrow-left"></i>
				Back page
			</a>
			<h3 class="text-center ml-3">Details of <?php echo $user->name; ?></h3>
		</div>
	</div>
	<div class="card-body">
		<h5>Id: <?php echo $user->id; ?></h5>
		<h5>Name: <?php echo $user->name; ?></h5>
		<h5>Email: <?php echo $user->email; ?></h5>

		<div class="row justify-content-center">
			<a href="<?php echo base_url(); ?>users/edit/<?php echo $user->id; ?>" class="btn btn-outline-primary">
				<i class="fas fa-edit"></i>
				Edit User
			</a>
			&nbsp;
			<a
		  	onclick="return confirm('Você tem certeza que quer excluir o <?php echo $user->name; ?>?');"
		  	href="<?php echo base_url(); ?>users/delete/<?php echo $user->id; ?>"
		  	class="btn btn-outline-danger">
				<i class="fas fa-trash-alt"></i>
				Delete User
			</a>
		</div>
	</div>
</div>