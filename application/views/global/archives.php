<?php $this->load->view('./components/global/navbar.php'); ?>
<div class="landing-main w-3/4 mx-auto">
<div class="flex">
		<?php echo $sidebar ?>
		<div class="w-[700px] ml-[100px]" >
			<div class="mt-10">
				<p class="text-2xl font-semibold ">
					<?php echo $volume['vol_name']; ?>
				</p>
				<p class="text-gray-600 ">
					<?php echo $volume['vol_description']; ?>
				</p>
			</div>
			<?php foreach ($volume['articles'] as $article): ?>
				<article class="p-6 bg-white rounded-2xl border border-gray-200 shadow-md my-5">
					<p class="my-2 text-[20px] font-extrabold tracking-tight text-gray-900 "><a href="#"><?php echo $article['title'];?></a></p>
					<p class="my-1 font-light text-[#5F6061] "><?php echo $article['abstract']; ?></p>
					<p class="my-3 font-light"><span class="font-medium">Keywords: </span> <?php echo $article['keywords']; ?></p>
					<div class="flex justify-between items-center">
						<div class="flex items-center space-x-2">
						<?php if (!empty($article['author_image'])): ?>
							<img class="avatar" src="<?php echo base_url(); ?>public/profile-images/<?php echo $article['author_image']; ?>" alt="<?php echo $article['author_name'];?>" />
						<?php else: ?>
							<img class="avatar" src="https://hwchamber.co.uk/wp-content/uploads/2022/04/avatar-placeholder.gif" alt="<?php echo $article['author_name'];?>" />
						<?php endif; ?>
							<div>
								<p class="font-medium leading-4">
									<?php echo $article['author_name'];?>
								</p>
								<p class="text-sm text-[#5F6061]">
									<?php echo mdate('%F %d, %Y', strtotime($article['date_published'])); ?>
								</p>
							</div>
						</div>
						<a href="#" class="read-more-btn text-sm font-medium h-[35px] w-[125px]">
							Read more
						</a>
					</div>
				</article>
			<?php endforeach; ?>

		</div>
	</div>
</div>
