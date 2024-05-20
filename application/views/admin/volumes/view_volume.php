<?php
	$data['title'] = 'Volume Details';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<a href="<?php echo base_url(); ?>admin/volumes/" class="text-sm text-[#5E5E5E]"> 
			<i class="ph ph-arrow-left"></i>
			Back to volume lists
		</a>
		<div class="mt-4">
			<p class="text-xl font-bold"><?php echo $volume['vol_name']; ?></p>
			<p class="text-sm"><?php echo $volume['vol_description']; ?></p>
		</div>
	</div>
	<hr/>
	<div class="p-5">
    <p class="font-medium text-lg">List of Articles</p>
    <?php if (empty($volume['articles'])): ?>
        <p class="mt-5 text-center">No articles found</p>
    <?php else: ?>
        <?php foreach ($volume['articles'] as $article): ?>
					<div class="my-2">
						<div class="flex items-center justify-between">
							<div class="flex items-center justify-start ">
								<img class="h-[40px] w-[40px]" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRywif2d8vrcx80-X-o-u8xeiaLgZOAZQlI7hsnCuITQA&s"/>
								<div class="leading-[18px]">
									<p class="text-medium"><a href="#"><?php echo $article['title'];?></a></p>
									<p class="font-light text-sm"><?php echo $article['doi']; ?></p>
								</div>
							</div>
							<a href="<?php echo base_url(); ?>admin/article/<?php echo $article['article_id'];?>">
								View Details
							</a>
						</div>
						<hr/>
					</div>
        <?php endforeach; ?>
    <?php endif; ?>
	</div>
</div>
