<?php
	$data['title'] = 'Manage Users';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<p class="text-xl font-bold">Users</p>
		<p class="text-sm">Manage the list of users</p>
	</div>
	<hr/>
	<div class="p-5">
		<div class="flex justify-between items-center">
			<form action="<?php echo base_url(); ?>admin/users" method="GET">
				<div class="relative">
					<input name="query" style="padding-left: 40px !important;" class="w-[290px] h-[49px] with-icon" type="text" placeholder="Search Users"/>
					<i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-[#5F6061] text-[20px]"></i>
				</div>
			</form>								
		
			<a href="<?php echo base_url(); ?>admin/user/new"   class="btn-filled w-[159px] h-[49px]"><i class="ph ph-plus mr-2"></i> New User</a>
		</div>
		<div class="overflow-hidden mt-5 admin-table">
			<table class="border-collapse w-full bg-white text-left">
				<thead>
					<tr class="row-border">
						<th scope="col" class="px-6 py-4 font-extrabold text-[#0D2015]">Name</th>
						<th scope="col" class="px-12 py-4 font-extrabold text-[#0D2015]">Role</th>
						<th scope="col" class="px-12 py-4 font-extrabold text-[#0D2015]">Status</th>
						<th scope="col" class="px-6 py-4 font-extrabold"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user): ?>
					<tr class="row-border">
						<th class="flex items-center gap-3 px-6 py-4 font-normal">
								<img
									class="avatar"
									src="<?php echo base_url(); ?>public/profile-images/<?php echo $user['profile_pic'];?>"
									alt=""
								/>
							<div>
								<div class="font-medium leading-4">
									<?php echo $user['complete_name']; ?>
								</div>
								<div class="text-sm text-[#5F6061]"><?php echo $user['email']; ?></div>
							</div>
						</th>
						<td class="px-12 py-4"><?php echo $user['role']; ?></td>
						<td class="px-12 py-4">
							<?php
							if ($user['status'] ==  1) {
		
								echo '<span class="flex justify-center items-center h-[30px] w-[65px] text-sm rounded-full bg-[#D1EDDD] text-[#09532B]">
								Active
							</span>';
							} else {
								// Code to be executed if status is neither  0 nor  1
								echo '<span class="flex justify-center items-center h-[30px] w-[78px] text-sm rounded-full bg-[#EDD1D1] text-[#8E1717]">
								Inactive
							</span>';
							}
							?>

						</td>
						<td class="px-12 py-4">
							<div class="flex justify-end gap-4">
								<a href="<?php echo base_url(); ?>admin/user/<?php echo $user['id'];?>">
									<i class="ph ph-eye text-[28px] text-[#5E5E5E]"></i>
								</a>
								<a href="<?php echo base_url(); ?>admin/user/edit/<?php echo $user['id'];?>">
									<i class="ph ph-pen text-[28px] text-[#5E5E5E]"></i>
								</a>
								<a href="<?php echo base_url(); ?>admin/user/delete/<?php echo $user['id'];?>">
								<i class="ph ph-trash text-[28px] text-[#5E5E5E]"></i>
								</a>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>		
	</div>

</div>
