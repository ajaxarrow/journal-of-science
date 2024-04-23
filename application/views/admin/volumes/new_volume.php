<?php
$data['title'] = 'New Volume';
$this->load->view('./components/admin/admin-sidebar.php');
$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
    <div class="p-5">
        <p class="text-xl font-bold">New Volume</p>
        <p class="text-sm">Fill up the following details to add a new volume</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/volume/add" method="POST">
            <div class="my-4">
                <p class="font-medium mb-2">Volume Name</p>
                <input name="vol_name" class="w-full h-[45px]" type="text" placeholder="Enter Volume Name" value="<?php echo set_value('vol_name'); ?>"/>
                <?php echo form_error('vol_name', '<div class="error">', '</div>'); ?> <!-- Display title validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Volume Description</p>
                <input name="vol_desc" class="w-full h-[45px]" type="text" placeholder="Provide volume description" value="<?php echo set_value('vol_desc'); ?>"/>
                <?php echo form_error('vol_description', '<div class="error">', '</div>'); ?> <!-- Display keywords validation error -->
            </div>
            <div class="my-4 flex items-center gap-2">
                <input name="published" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('published', '1'); ?> />
                <label class="font-medium">Published</label>
                <?php echo form_error('published', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div>
						<div class="my-4 flex items-center gap-2">
                <input name="archived" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('published', '1'); ?> />
                <label class="font-medium">Archived</label>
                <?php echo form_error('archived', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn-filled w-[159px] h-[44px]">Submit</button>
            </div>
        </form>
    </div>
</div>
