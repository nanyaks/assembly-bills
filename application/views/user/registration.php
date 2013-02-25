<div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo site_url('home')?>">Assembly Bills v1.1</a>
          <!-- <div class="btn-group pull-right">
            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> nanyaks
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">Sign Out</a></li>
            </ul>
          </div>  -->
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="<?php echo site_url("home") ?>">Home</a></li>
              <li><a href="#">View Bills</a></li>
              <li class="active"><a href="#">Register</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">

      <!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<div class="row-fluid">
      		<div class="span3 "></div>
      		<div class="span5 ">
      			<span class='large-txt text-white-shadw'>Create an account</span>
      			<span class="offset1"><span class="large-txt">(</span>or <a href="#">login</a><span class="large-txt">)</span></span>
      		</div>
      		<div class="span4 "></div>
      	</div>
        <hr>
        <?php 
        	if(isset($error)){
        		echo $error; // @TODO: Add styling for the error
        	}
        ?>
        
        <div class="row-fluid">
        	<div class="span2 "></div>
        	<div class="span8 ">
        		<div class="row-fluid">
        			<div class="span3 "></div>
        			<div class="span6 ">
				        <form class="form-horizontal" name="user-reg" id="user-reg" action="<?php echo site_url('user/register');?>" method="post">	      	
					      	<div class="control-group">
					      		<label class="control-label" for="inputFirstname">First name</label>
					      		<div class="controls">
					        		<input type="text" class="input-large" id="inputFirstname" placeholder="First name…" name="firstname" value="<?php echo set_value('firstname'); ?>" />
					        	</div>
					      	</div>
						   		
							<div class="control-group">
								<label class="control-label" for="inputLastname">Last name</label>
						    	<div class="controls">
						    		<input type="text" class="input-large" id="inputLastname" placeholder="Last Name…" name="lastname" value="<?php echo set_value('lastname'); ?>" />
						    	</div>
						  	</div>
						  	<div class="controls">
						  	<span class="help-block">Gender</span>
						  		<label class="radio">
						    		<span style="margin-left:20px;">
						    			<input type="radio" name="gender" value="1" <?php echo set_radio('gender', '1'); ?> /> Male
						    		</span>
						  		</label>
						  		<label class="radio">
						    		<span style="margin-left:20px;">
						    			<input type="radio" name="gender" value="2" <?php echo set_radio('gender', '2'); ?> /> Female
						    		</span>
						  		</label>
						  	</div>
							  	
							<div class="control-group">
								<label class="control-label" for="inputEmail">Email</label>
								<div class="controls">
						    		<input type="email" class="input-large" id="inputEmail" placeholder="Email…" name="email" value="<?php echo set_value('email'); ?>" />
						    	</div>
						  	</div>
						  	
							<div class="control-group">
								<label class="control-label" for="inputUsername">Username</label>
								<div class="controls">
						    		<input type="text" class="input-large" id="inputUsername" placeholder="Username…" name="username" value="<?php echo set_value('username'); ?>" />
						    	</div>
						  	</div>
						  	
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
						    		<input type="password" name="password" id="inputPassword" class="input-large" placeholder="Password…">
						    	</div>
						  	</div>
						  	<br />
						  	<div class="offset2">
						  		<input type="submit" name="register" class="btn btn-large btn-primary" value="Register" />
						  	</div>
						  	<br />
						  	<small class="span6">
						  		By clicking register you agree to the <a href="#">Terms of Service</a>
						  	</small>
						</form>
					</div>
					<div class="span3 "></div>
				</div>
			</div>
			<div class="span2 "></div>
		</div>
	</div>
		<?php //echo validation_errors(); ?>
	
	</div>
<div style="clear: both"></div>
