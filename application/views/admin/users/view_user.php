<?php
	$data['title'] = 'User Details';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<a href="<?php echo base_url(); ?>admin/users/" class="text-sm text-[#5E5E5E]"> 
			<i class="ph ph-arrow-left"></i>
			Back to user lists
		</a>
		<div class="mt-4 flex items-center gap-2">
			<img
				class="profile"
				src="<?php echo base_url(); ?>public/profile-images/<?php echo $user['profile_pic'];?>"
				alt=""
			/>
			<div>
				<p class="text-xl font-bold"><?php echo $user['complete_name']; ?></p>
				<p class="text-sm"><?php echo $user['email']; ?></p>
			</div>
		</div>
	</div>
	<hr/>
	<div class="p-5">
		<p class="text-lg font-medium bg-[#f5f7f9] rounded-lg p-2 w-full mb-2">User Information</p>
		<div class="p-2 my-2 grid grid-cols-1 lg:grid-cols-2">
			<div>
				<p class="text-[#4F545A]">Complete Name</p>
				<p ><?php echo $user['complete_name'];?></p>
			</div>
			<div>
				<p class="text-[#4F545A]">Email</p>
				<p ><?php echo $user['email'];?></p>
			</div>
		</div>
		<div class="p-2 my-2 grid grid-cols-1 lg:grid-cols-2">
			<div>
				<p class="text-[#4F545A]">Role</p>
				<p ><?php echo $user['role'];?></p>
			</div>
			<div>
				<p class="text-[#4F545A]">Status</p>
				<?php echo ($user['status'] == 1) ? "Active" : "Inactive"; ?>
			</div>
		</div>
	</div>
</div>
