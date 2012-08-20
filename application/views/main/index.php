<h1>Smartbuy Customer Management</h1>

	<div id="body">
		<p>This is the Smartbuy Customer management application. Choose tasks to perform from the links below</p>
		<div id="section">
			<p>To view list of registered users on smartbuy.com.ng</p>
			<code>application/views/main/index.php</code>
			
			<!-- SHOW BUTTONS THAT REDIRECTS TO CONTROLLERS -->
			<a href="<?php echo site_url('customers'); ?>" class=""><button>Customers</button></a>
			<a href="<?php echo site_url('complaint'); ?>" class=""><button>Complaints</button></a>
			<a href="<?php echo site_url('request'); ?>" class=""><button>Requests</button></a>
			<a href="<?php echo site_url('orders'); ?>" class=""><button>Recent Orders</button></a>
			<a href="<?php echo site_url('pss'); ?>" class=""><button>Pay Small Small</button></a>
		</div>
		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/home.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="<?php echo $base ?>user_guide/">User Guide</a>.</p>
	</div>