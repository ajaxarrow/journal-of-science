<?php
	$data['title'] = 'Manage Authors';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<p class="text-xl font-bold">Authors</p>
		<p class="text-sm">Manage the list of authors</p>
	</div>
	<hr/>
	<div class="p-5">
		<div class="flex justify-between items-center">
			<form action="<?php echo base_url(); ?>admin/authors" method="GET">
				<div class="relative">
					<input name="query" style="padding-left: 40px !important;" class="w-[290px] h-[49px] with-icon" type="text" placeholder="Search Authors"/>
					<i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-[#5F6061] text-[20px]"></i>
				</div>
			</form>
			
			<a href="<?php echo base_url(); ?>admin/author/new"  class="btn-filled w-[159px] h-[49px]"><i class="ph ph-plus mr-2"></i> New Author</a>
		</div>
		<div class="overflow-hidden mt-5 admin-table">
			<table class="border-collapse w-full bg-white text-left">
				<thead>
					<tr class="row-border">
						<th scope="col" class="px-6 py-4 font-extrabold text-[#0D2015]">Name</th>
						<th scope="col" class="px-12 py-4 font-extrabold text-[#0D2015]">Contact</th>
						<th scope="col" class="px-12 py-4 font-extrabold"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($authors as $author): ?>
					<tr class="row-border">
						<th class="flex items-center gap-3 px-6 py-4 font-normal">
								<img
									class="avatar"
									src="<?php echo base_url(); ?>public/profile-images/<?php echo $author['author_image']; ?>"
									alt=""
								/>
							<div>
								<div class="font-medium leading-4">
								<?php echo $author['author_title']; ?> <?php echo $author['author_name']; ?>
								</div>
								<div class="text-sm text-[#5F6061]"><?php echo $author['author_email']; ?></div>
							</div>
						</th>
						<td class="px-12 py-4"><?php echo $author['author_contact']; ?></td>
						<td class="px-12 py-4">
							<div class="flex justify-end gap-4">
							<a href="<?php echo base_url(); ?>admin/author/edit/<?php echo $author['author_id'];?>">
									<i class="ph ph-pen text-[28px] text-[#5E5E5E]"></i>
								</a>
								<a href="<?php echo base_url(); ?>admin/author/delete/<?php echo $author['author_id'];?>">
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
