<form class="form-horizontal" name="user-reg" id="user-reg" action="<?php echo site_url('auth/login');?>" method="post">
	<div>
		<input type="text" name="username" placeholder="username" />
	</div>
	<div>
		<input type="password" name="password" placeholder="password" />
	</div>
	<div>
		<input type="submit" name="login" value="Login" />
	</div>
</form>