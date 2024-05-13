<?php
	$data['title'] = 'Manage Volumes';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<p class="text-xl font-bold">Volumes</p>
		<p class="text-sm">Manage the list of volumes</p>
	</div>
	<hr/>
	<div class="p-5">
		<div class="flex justify-between items-center">
			<form action="<?php echo base_url(); ?>admin/volumes" method="GET">
			<div class="relative">
				<input name="query" style="padding-left: 40px !important;" class="w-[290px] h-[49px] with-icon" type="text" placeholder="Search Volumes"/>
				<i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-[#5F6061] text-[20px]"></i>
			</div>
			</form>
			<a href="<?php echo base_url(); ?>admin/volume/new"  class="btn-filled w-[159px] h-[49px]"><i class="ph ph-plus mr-2"></i> New Volume</a>
		</div>						
		<div class="overflow-hidden mt-5 admin-table">
			<table class="border-collapse w-full bg-white text-left">
				<thead>
					<tr class="row-border">
						<th scope="col" class="px-6 py-4 font-extrabold text-[#0D2015]">Volume Name</th>
						<th scope="col" class="px-16 py-4 font-extrabold text-[#0D2015]">Description</th>
						<th scope="col" class="px-16 py-4 font-extrabold text-[#0D2015]">Status</th>
						<th scope="col" class="px-12 py-4 font-extrabold"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($volumes as $volume): ?>
					<tr class="row-border">
						<th class="flex items-center gap-3 px-6 py-4 font-normal">
							<?php echo $volume['vol_name']; ?>
						</th>
						<td class="px-16 py-4"><?php echo $volume['vol_description']; ?></td>
						<td class="px-16 py-4">
							<?php
							if ($volume['archived'] ==  1) {
								echo '<span class="flex justify-center items-center h-[30px] w-[84px] text-sm rounded-full bg-[#D1DEED] text-[#091053]">
								Archived
								</span>';
							} else {
								if ($volume['published'] ==  1) {
			
									echo '<span class="flex justify-center items-center h-[30px] w-[84px] text-sm rounded-full bg-[#D1EDDD] text-[#09532B]">
									Published
								</span>';
								} else {
									// Code to be executed if status is neither  0 nor  1
									echo '<span class="flex justify-center items-center h-[30px] w-[90px] text-sm rounded-full bg-[#EDD1D1] text-[#8E1717]">
									Unpublished
								</span>';
								}
							}
							?>

						</td>
						<td class="px-6 py-4">
							<div class="flex justify-end gap-4">
								<a href="<?php echo base_url(); ?>admin/volume/<?php echo $volume['vol_id'];?>">
									<i class="ph ph-eye text-[28px] text-[#5E5E5E]"></i>
								</a>
								<a href="<?php echo base_url(); ?>admin/volume/edit/<?php echo $volume['vol_id'];?>">
									<i class="ph ph-pen text-[28px] text-[#5E5E5E]"></i>
								</a>
								<a href="<?php echo base_url(); ?>admin/volume/delete/<?php echo $volume['vol_id'];?>">
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
