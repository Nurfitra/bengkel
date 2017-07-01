<!DOCTYPE html>
<html lang="en">
		<?php $this->load->view('layout/head'); ?>
  	<body class="nav-md">
    	<div class="container body">
      		<div class="main_container">
				<?php $this->load->view('layout/nav'); ?>
				<?php $this->load->view('layout/menu'); ?>
				<?php $this->load->view($konten); ?>
			</div>
		</div>
	</body>
	<?php $this->load->view('layout/js'); ?>
</html>