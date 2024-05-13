<?php
	$data['title'] = 'Author Details';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<a href="<?php echo base_url(); ?>admin/authors/" class="text-sm text-[#5E5E5E]"> 
			<i class="ph ph-arrow-left"></i>
			Back to author lists
		</a>
		<div class="mt-4 flex items-center gap-2">
			<img
				class="profile"
				src="<?php echo base_url(); ?>public/profile-images/<?php echo $author['author_image'];?>"
				alt=""
			/>
			<div>
				<p class="text-xl font-bold"><?php echo $author['author_title']; ?> <?php echo $author['author_name']; ?></p>
				<p class="text-sm"><?php echo $author['author_email']; ?></p>
			</div>
		</div>
	</div>
	<hr/>
	<div class="p-5">
		<p class="text-lg font-medium bg-[#f5f7f9] rounded-lg p-2 w-full mb-2">Author Information</p>
		<div class="p-2 my-2 grid grid-cols-1 lg:grid-cols-2">
			<div>
				<p class="text-[#4F545A]">Complete Name</p>
				<p ><?php echo $author['author_name'];?></p>
			</div>
			<div>
				<p class="text-[#4F545A]">Email</p>
				<p ><?php echo $author['author_email'];?></p>
			</div>
		</div>
		<div class="p-2 my-2 grid grid-cols-1 lg:grid-cols-2">
			<div>
				<p class="text-[#4F545A]">Contact Number</p>
				<p ><?php echo $author['author_contact'];?></p>
			</div>
		</div>
	</div>
</div>
