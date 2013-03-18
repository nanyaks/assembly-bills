/*	Global javascript file for the application	*/

//	Execute file when DOM is fully loaded
//alert(config.base);
$(document).ready(function (){

	// Unique Email Ajax validation
	$('#userRegForm').find("#inputEmail").blur( function () {
		var email = $("#inputEmail").val();
		//	Ajax request sent to the codeigniter Ajax controller
		$.post(config.base + 'index.php/ajax/check_email_exists',
			{'email': email},

			// ..and when web server responds,
			function(result){
				$("#bad_email").replaceWith('');

				// if result is true, write msg on the screen
				if(result) {
					$("#inputEmail").after('<div id="bad_email" style="color:red;">' + '<p>that email is already in use, please choose another</p></div>');
				}
			}
			);
	});
	
	//	Unique username Ajax validator
	$('#userRegForm').find('#inputUsername').blur( function () {
		var username = $('#inputUsername').val();

		//	Post to controller
		$.post(config.base + 'index.php/ajax/check_username_exists',
			{'username': username},
			function(result) {
				$("#bad_username").replaceWith('');

				// if result
				if(result){
					$('#inputUsername').after('<div id="bad_username"><p>That username is already in use</p></div>');
				}
			}
			);
	});

});
