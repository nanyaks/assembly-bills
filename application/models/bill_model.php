<?php
class Bill_model extends CI_Model{
	/*
	 * Call constructor to handle loading the database
	 */
	public function __construct(){
		$this->load->database();
	}
	
	/*
	 * function enroll_customer
	 * Uses the codeigniter api to capture the $_POST array and inserts into the database
	 */
	public function register_bill(){		
		$data = array(
				'billTitle' => $this->input->post('bill_title'),
				'billSponsor' => $this->input->post('bill_sponsor'),
				'billCoSponsor' => $this->input->post('co_sponsor'),
				'billDetail' => $this->input->post('bill_contents'),
				
				'isDeleted'=>'',
				);
		
		return $this->db->insert('bill_details', $data);
	}
	
	public function get_bill_id($title = NULL, $sponsor = NULL, $cosponsor = NULL){
		/*
		 * This function gets the bill id of a particular bill given the title of the bill, the sponsor and the cosponsor
		 * @todo proper checking to ensure proper variables are being passed and that ir returns as expected
		 **/
		if(($title == FALSE) && ($sponsor == FALSE) && $cosponsor == FALSE){
			return FALSE;
		}
		else {
			$st = sprintf("SELECT id from bills.bill_details WHERE billTitle='%s' AND billSponsor='%s' AND billCoSponsor='%s'", $title, $sponsor, $cosponsor);
			$query = $this->db->query($st);
			if($query == FALSE && !is_object($query)){
				// When no result...
				return FALSE;
			}
			return $query->row();
		}
	}
	
	/*
	 * function get_view($id)
	 * It gets bill info from the database; if !isset($id), all the bills are fetched, else only bill with $id is retrieved
	 */
	public function fetch_bill($bill_id = NULL){
		// If $user_id exists and is set,
		if(!isset($bill_id) || $bill_id === FALSE){
			$query = $this->db->get('bill_details');
			
			return $query->result_array();
		}
		else {
			$query = $this->db->get_where('bill_details', array('id'=>$bill_id));
			
			return $query->row_array();
		}
	}
}