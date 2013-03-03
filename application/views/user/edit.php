<div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo site_url('home')?>">Assembly Bills v1.1</a>
          <div class="btn-group pull-right">
            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> username
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">Sign Out</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="<?php echo site_url("home") ?>">Home</a></li>
              <li><a href="#">View Bills</a></li>
              <!-- <li><a href="#">Register</a></li> -->
              <li class="active"><a href="#">Edit Profile</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid">
      		<div class="span1"></div>
      		<div class="span11"><h2><span class='text-white-shadw'>Profile Update</span></h2></div>
      	</div>
       
        <div class='row-fluid'>
        	<!-- <div class="span1"></div>
        	<div class='span6'>
	        	<p>
	        		<span class='text-white-shadw'>Edit your profile.
	        			Make neccessary changes and click update to save your profile.<br />
	        		</span>
	        	</p>
	        	
        	</div>
        	<div class='span6'>
	        	<div class="space-pad">	
	        		<!-- <img src="<?php //echo $img . '/stripe-photo.png'; ?>" alt='assembly-bills-scroll' />
	        	</div>
        	</div> -->
        </div>
        <hr>
        <form class="form-capsule form-horizontal" name="user-reg" id="user-reg" action="<?php echo site_url('user/register');?>" method="post">
		  <fieldset>
		    
		    <legend><span style="font-size: 16px; font-weight: bold;">Edit User Information</span></legend>
		    <div id='form-user-reg' class='span6'>
		    <span class="help-inline">Edit profile and click 'update'.</span>
		  	<div class="control-group">
		      	<div class="controls">
		      		<label class="control-label" for="input01">First name</label>
		        	<input type="text" class="input" placeholder="First name…" name="firstname" value="<?php echo set_value('firstname'); ?>" />
		      	</div>
		   		
				<div class="controls">
					<label class="control-label" for="input01">Last name</label>
			    	<input type="text" class="input" placeholder="Last Name…" name="lastname" value="<?php echo set_value('lastname'); ?>" />
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
			  	
				<div class="controls">
					<label class="control-label" for="input01">User Email</label>
			    	<input type="text" class="input" placeholder="Email…">
			  	</div>
			  	
				<div class="controls">
					<label class="control-label" for="input01">Username</label>
			    	<input type="text" class="input" placeholder="Username…">
			  	</div>
			  	
				<div class="controls">
					<label class="control-label" for="input01">Password</label>
			    	<input type="password" class="input" placeholder="Password…">
			  	</div>
			  	<br />
			  	<div class="offset2" ><button type="submit" class="btn btn-primary" style="margin-left:55px;">update &raquo;</button></div>
			  	<br />
			  	
		    </div>
		    	
		    
		    </div>
		  </fieldset>
		  
		</form>
        </div>
		<?php //echo validation_errors(); ?>
	
	</div>
<div style="clear: both"></div>
