<?php
$data['title'] = 'Assign New Author';
$this->load->view('./components/admin/admin-sidebar.php');
$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
    <div class="p-5">
				<a href="<?php echo base_url(); ?>admin/article/<?php echo $id; ?>/authors" class="text-sm text-[#5E5E5E]"> 
						<i class="ph ph-arrow-left"></i>
						Back to article-author lists
				</a>
        <p class="text-xl font-bold mt-4">Assign Author</p>
        <p class="text-sm">Assign new author to this article</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/article/<?php echo $id; ?>/add-assign-authors" method="POST">
				<div class="my-4">
						<p class="font-medium mb-2">Author</p>
						<select name="author_id" class="select w-full h-[45px]">
								<?php foreach ($authors as $author): ?>
										<option value="<?php echo $author['author_id']; ?>"><?php echo $author['author_name']; ?></option>
								<?php endforeach; ?>
						</select>
						<?php echo form_error('author_id', '<div class="error">', '</div>'); ?> <!-- Display volume_id validation error -->
				</div>
				<div class="flex justify-end">
						<button type="submit" class="btn-filled w-[159px] h-[44px]">Submit</button>
				</div>
        </form>
    </div>
</div>
