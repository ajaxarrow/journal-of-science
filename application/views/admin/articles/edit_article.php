<?php
$data['title'] = 'Edit Article';
$this->load->view('./components/admin/admin-sidebar.php');
$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
    <div class="p-5">
        <p class="text-xl font-bold">Edit Article</p>
        <p class="text-sm">Update the following details of the article</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/article/update/<?php echo $article['article_id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="my-4">
                <p class="font-medium mb-2">Title</p>
                <input name="title" class="w-full h-[45px]" type="text" placeholder="Enter Article Title" value="<?php echo set_value('title', $article['title']); ?>"/>
                <?php echo form_error('title', '<div class="error">', '</div>'); ?> <!-- Display title validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Keywords</p>
                <input name="keywords" class="w-full h-[45px]" type="text" placeholder="Provide related keywords" value="<?php echo set_value('keywords', $article['keywords']); ?>"/>
                <?php echo form_error('keywords', '<div class="error">', '</div>'); ?> <!-- Display keywords validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Abstract</p>
                <textarea id="editor1" name="abstract" class="w-full h-[45px]" type="text" placeholder="Provide an abstract"><?php echo set_value('abstract', $article['abstract']); ?></textarea>
                <?php echo form_error('abstract', '<div class="error">', '</div>'); ?> <!-- Display abstract validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">DOI</p>
                <input name="doi" class="w-full h-[45px]" type="text" placeholder="Enter the DOI of the article" value="<?php echo set_value('doi', $article['doi']); ?>"/>
                <?php echo form_error('doi', '<div class="error">', '</div>'); ?> <!-- Display doi validation error -->
            </div>
						<div class="my-4">
								<p class="font-medium mb-2">Volume</p>
								<select name="volume_id" class="select w-full h-[45px]">
										<?php foreach ($volumes as $volume): ?>
												<option value="<?php echo $volume['vol_id']; ?>" <?php echo ($article['volumeid'] == $volume['vol_id']) ? 'selected' : ''; ?>>
														<?php echo $volume['vol_name']; ?>
												</option>
										<?php endforeach; ?>
								</select>
								<?php echo form_error('volume_id', '<div class="error">', '</div>'); ?> <!-- Display volume_id validation error -->
						</div>
						<div class="my-4">
								<p class="font-medium mb-2">File</p>
								<input name="filename" class="w-full h-[45px]" type="file" placeholder="Select File"/>
								<?php echo form_error('filename', '<div class="error">', '</div>'); ?> <!-- Display filename validation error -->
						</div>

            <div class="my-4">
                <p class="font-medium mb-2">Date Published</p>
                <input name="date-published" class="w-full h-[45px]" type="datetime-local" value="<?php echo set_value('date-published', $article['date_published']); ?>"/>
                <?php echo form_error('date-published', '<div class="error">', '</div>'); ?> <!-- Display date-published validation error -->
            </div>
            <div class="my-4 flex items-center gap-2">
                <input name="published" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('published', '1', $article['published'] == 1); ?> />
                <label class="font-medium">Published</label>
                <?php echo form_error('published', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn-filled w-[159px] h-[44px]">Submit</button>
            </div>
        </form>
    </div>
</div>
