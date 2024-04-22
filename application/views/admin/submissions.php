<?php
	$data['title'] = 'Manage Submissions';
	$this->load->view('./components/admin/admin-sidebar.php');
	$this->load->view('./components/admin/admin-topbar.php', $data);
?>

<div class="main-content-container">
	<div class="p-5">
		<p class="text-xl font-bold">Submissions</p>
		<p class="text-sm">Manage the list of submissions</p>
	</div>
	<hr/>
	<div class="p-5">
	<div class="relative">
		<input style="padding-left: 40px !important;" class="w-[290px] h-[49px] with-icon" type="text" placeholder="Search Submissions"/>
		<i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-[#5F6061] text-[20px]"></i>
	</div>
		
	</div>

</div>
