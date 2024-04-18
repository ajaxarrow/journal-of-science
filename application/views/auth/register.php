<div class="center">
	<div class="register-sheet p-10 ">
		<div class="flex justify-center">
		<a href="<?php echo base_url(); ?>" class="text-logo"><i class="ph ph-files ph-fill text-[28px]"></i>Journal of Science</a>
		</div>
		<p class="font-bold text-[32px] text-center mt-1 mb-8">Create Your Account</p>
		<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-4">
			<div class="my-3 lg:my-0">
				<p class="font-medium">First Name</p>
				<input type="text" placeholder="Enter Your First Name"/>
			</div>
			<div class="my-3 lg:my-0">
				<p class="font-medium">Last Name</p>
				<input type="text" placeholder="Enter Your Last Name"/>
			</div>
		</div>
		<div class="my-4">
			<p class="font-medium">Email</p>
			<input type="text" placeholder="Enter Your Email"/>
		</div>
		<div class="my-4">
			<p class="font-medium">Password</p>
			<input type="text" placeholder="Enter Your Password"/>
		</div>
		<div class="my-5 flex justify-center">
			<p class="font-light">Already a User? <a href="<?php echo base_url(); ?>auth/login" class="underline" >Login Here</a></p>
		</div>
		<button class="btn-filled w-full rounded-[10px] h-[44px]">Register</button>
	</div>
</div>
