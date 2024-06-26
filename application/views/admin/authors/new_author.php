<?php
$data['title'] = 'New Author';
$this->load->view('./components/admin/admin-sidebar.php');
$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
    <div class="p-5">
        <p class="text-xl font-bold">New Author</p>
        <p class="text-sm">Fill up the following details to add a new author</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/author/add" method="POST" enctype="multipart/form-data">
            <div class="my-4">
                <p class="font-medium mb-2">Author Name</p>
                <input name="author_name" class="w-full h-[45px]" type="text" placeholder="Enter Author Name" value="<?php echo set_value('author_name'); ?>"/>
                <?php echo form_error('author_name', '<div class="error">', '</div>'); ?> <!-- Display title validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Author Title</p>
                <input name="author_title" class="w-full h-[45px]" type="text" placeholder="E.g. Mr, Mrs, Dr" value="<?php echo set_value('author_title'); ?>"/>
                <?php echo form_error('author_title', '<div class="error">', '</div>'); ?> <!-- Display keywords validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Email</p>
                <input name="author_email" class="w-full h-[45px]" type="text" placeholder="Enter email" value="<?php echo set_value('author_email'); ?>"/>
                <?php echo form_error('author_email', '<div class="error">', '</div>'); ?> <!-- Display abstract validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Contact</p>
                <input name="author_contact" class="w-full h-[45px]" type="text" placeholder="Enter author contact number" value="<?php echo set_value('author_contact'); ?>"/>
                <?php echo form_error('author_contact', '<div class="error">', '</div>'); ?> <!-- Display doi validation error -->
            </div>
			<div class="my-4">
				<p class="font-medium mb-2">Image</p>
				<input name="author_image" class="w-full h-[45px]" accept=".jpg, .jpeg, .png" type="file" placeholder="Select File"/>
				<?php echo form_error('author_image', '<div class="error">', '</div>'); ?> 
				<?php if(isset($error)): ?>
					<div class="error">
						<?php echo $error; ?>
					</div>
				<?php endif; ?>
			</div>
            <div class="flex justify-end">
                <button type="submit" class="btn-filled w-[159px] h-[44px]">Submit</button>
            </div>
        </form>
    </div>
</div>
