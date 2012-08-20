<h1>New Bill Proposal</h1>

<?php echo validation_errors();
	
	/*
 	 * Configure form parameters
 	 * 
 	 */
	$bill_textArea = array(
			'name' => 'bill_contents',
			'id' => 'cust_address_textArea',
			'value' => set_value('address'),
			'rows' => 20,
			'cols' => 80,
            'class'=>'bill_txtarea',
			);
	
    $date_now = date('Y-m-d H:i:s');
	/*
	 * End Form Parameters Config
	 */
	
	//	Display New form 
	$attr = array('class'=>'form', 'id'=>'newUserForm');
	echo form_open('bill/register', $attr);
	
	echo "<div style='border:0px solid red;'><ul class='form_list'>" . 
				"<li>" . form_label('Bill Title') . "</li>" . 
				"<li>" . form_input('bill_title', set_value('bill_title')) . "</li>" . 
	"</ul></div>";
	echo "<div ><ul class='form_list'>" .
				"<li class='left_indentLabel'>" . form_label('Sponsor') . "</li>" . 
				"<li>" . form_input('bill_sponsor', set_value('bill_sponsor')) . "</li>" .
	"</ul></div>";
	echo "<div style='border:0px solid red;'><ul class='form_list'>" .
			"<li class='left_indentLabel'>" . form_label('Co Sponsor') . "</li>" .
			"<li>" . form_input('co_sponsor', set_value('co_sponsor')) . "</li>" .
	"</ul></div>";
	
	echo "<div style='clear:both';></div>";
	echo "<div style='border:0px solid red;'><ul class='form_list'>" .
			"<li>" . form_label('Date Proposed') . "</li>" .
			"<li>" . form_input('dt_proposed', set_value('dt_proposed')) . "</li>" .
	"</ul></div>";
    
    echo "<div style='clear:both';></div>";
	
	echo "<div style='border:0px solid red;'><ul class='form_list'>" .
			"<li>" . form_label('Bill Contents') . "</li>" .
			"<li>" . form_textarea($bill_textArea) . "</li>" .
	"</ul></div>";

	
	echo "<div style='clear:both';></div>";
    
	// Submit button
	echo "<div style='border:0px solid red;'>" . form_submit('submit', 'Submit Bill') . "</div>";
	
	// Close the form
	echo form_close();