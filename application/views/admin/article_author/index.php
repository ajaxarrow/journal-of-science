<?php
	$data['title'] = 'Assign Authors';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<a href="<?php echo base_url(); ?>admin/articles/" class="text-sm text-[#5E5E5E]"> 
				<i class="ph ph-arrow-left"></i>
				Back to article lists
		</a>
		<p class="text-xl font-bold mt-4">Articles</p>
		<p class="text-sm">Assign multiple authors to articles</p>
	</div>
	<hr/>
	<div class="p-5">
		<div class="flex justify-between items-center">
			<div></div>	
			<a href="<?php echo base_url(); ?>admin/article/<?php echo $id;?>/assign-authors" class="btn-filled w-[159px] h-[49px]"><i class="ph ph-user-plus mr-2"></i> Assign Authors</a>
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
				<?php foreach ($articleauthors as $articleauthor): ?>
					<tr class="row-border">
						<th class="flex items-center gap-3 px-6 py-4 font-normal">
								<img
									class="avatar"
									src="<?php echo base_url(); ?>public/profile-images/<?php echo $articleauthor['author']['author_image']; ?>"
									alt=""
								/>
							<div>
								<div class="font-medium leading-4">
								<?php echo  $articleauthor['author']['author_title']; ?> <?php echo  $articleauthor['author']['author_name']; ?>
								</div>
								<div class="text-sm text-[#5F6061]"><?php echo  $articleauthor['author']['author_email']; ?></div>
							</div>
						</th>
						<td class="px-12 py-4"><?php echo  $articleauthor['author']['author_contact']; ?></td>
						<td class="px-12 py-4">
							<div class="flex justify-end gap-4">
								<a href="<?php echo base_url(); ?>admin/author/<?php echo $articleauthor['id'];?>" class="tooltip">
									<i class="ph ph-eye text-[28px] text-[#5E5E5E]"></i>
								</a>
								<a href="<?php echo base_url(); ?>admin/article/<?php echo $articleauthor['article_id'];?>/author/edit/<?php echo $articleauthor['id'];?>">
									<i class="ph ph-pen text-[28px] text-[#5E5E5E]"></i>
								</a>
								<a href="<?php echo base_url(); ?>admin/article/<?php echo $articleauthor['article_id'];?>/author/delete/<?php echo $articleauthor['id'];?>">
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
