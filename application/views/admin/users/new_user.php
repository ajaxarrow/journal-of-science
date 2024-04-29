<?php
$data['title'] = 'New User';
$this->load->view('./components/admin/admin-sidebar.php');
$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
    <div class="p-5">
        <p class="text-xl font-bold">New User</p>
        <p class="text-sm">Fill up the following details to add a new user</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/user/add" method="POST" enctype="multipart/form-data">
            <div class="my-4">
                <p class="font-medium mb-2">Complete Name</p>
                <input name="user_name" class="w-full h-[45px]" type="text" placeholder="Enter Author Name" value="<?php echo set_value('user_name'); ?>"/>
                <?php echo form_error('user_name', '<div class="error">', '</div>'); ?> <!-- Display title validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">User Title</p>
                <input name="user_title" class="w-full h-[45px]" type="text" placeholder="E.g. Mr, Mrs, Dr" value="<?php echo set_value('user_title'); ?>"/>
                <?php echo form_error('user_title', '<div class="error">', '</div>'); ?> <!-- Display keywords validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Email</p>
                <input name="user_email" class="w-full h-[45px]" type="text" placeholder="Enter email" value="<?php echo set_value('user_email'); ?>"/>
                <?php echo form_error('user_email', '<div class="error">', '</div>'); ?> <!-- Display abstract validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Password</p>
                <input name="user_password" class="w-full h-[45px]" type="password" placeholder="Enter password" value="<?php echo set_value('user_password'); ?>"/>
                <?php echo form_error('user_password', '<div class="error">', '</div>'); ?> <!-- Display doi validation error -->
            </div>
						<div class="my-4">
                <p class="font-medium mb-2">Role</p>
                <input name="user_role" class="w-full h-[45px]" type="text" placeholder="Enter user role" value="<?php echo set_value('user_role'); ?>"/>
                <?php echo form_error('user_role', '<div class="error">', '</div>'); ?> <!-- Display doi validation error -->
            </div>
						<div class="my-4">
								<p class="font-medium mb-2">Image</p>
								<input name="user_image" class="w-full h-[45px]" type="file" placeholder="Select File"/>
								<?php echo form_error('user_image', '<div class="error">', '</div>'); ?> <!-- Display filename validation error -->
						</div>
						<div class="my-4 flex items-center gap-2">
                <input name="user_status" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('user_status', '1'); ?> />
                <label class="font-medium">Active</label>
                <?php echo form_error('user_status', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn-filled w-[159px] h-[44px]">Submit</button>
            </div>
        </form>
    </div>
</div>
