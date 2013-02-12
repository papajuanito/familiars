<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		// Initialize DB connection
		$this->load->database();
	}

	public function search_with_terms($term){
		if(isset($term)){

			$query = $this->db->select('id, name')->like('name', $term);

			$search_results = $this->db->get('dwc_items');

			$the_results = array();

			foreach($search_results->result() as $result){
				$temp = array(
					'value' => $result->id,
					'label' => $result->name
				);

				$the_results[] = $temp;
			}



			return $the_results;
		}

		return false;
	}

	public function get_item_with_sub_type($sub_type){
		if(!isset($sub_type))
			return false;

		// echo $type;

		$query = $this->db->get_where('dwc_items', array('sub_type' => $sub_type));

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;


	}

	public function get_familiar($id){
		if(!isset($id))
			return false;

		$query = $this->db->where('id', $id)->get('dwc_familiars_copy');

		if($query->num_rows() > 0){
			$familiar = $query->row();
			$familiar->tricks = $this->get_tricks($familiar->id);
			$familiar->family = $this->get_familiar_family($familiar->id);

			return $familiar;
		}else{
			return false;
		}
		

	}

	public function get_tricks($id){
		$query = $this->db->select('*')->join('dwc_tricks', 'dwc_familiar_tricks.trick_id = dwc_tricks.id', 'left')->where('dwc_familiar_tricks.familiar_id', $id)->get('dwc_familiar_tricks');

		// echo $this->db->last_query();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}

	public function get_familiar_family($id){
		if(!isset($id))
			return false;

		$query = $this->db->select('dwc_2.*')->join('dwc_familiars_copy AS dwc_2', 'dwc_1.family = dwc_2.family')->where('dwc_1.id', $id)->get('dwc_familiars_copy AS dwc_1');

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;

	}

	public function morph(){

		$count = 0;
		$family = 0;

		for ($i=1; $i <= 308 ; $i++) {

			$data = array(
		               'family' => $family
		            );
			if($count == 2){

				$data['morph_lvl'] = 2;

				$this->db->where('id', $i);
				$this->db->update('dwc_familiars_copy', $data);
				$this->db->where('id', $i+ 1);
				$this->db->update('dwc_familiars_copy', $data);

				// echo "2<br>";
				// echo "2<br>";
				// echo "Family : " . $family . "<br>";
				$count = 0;
				$i = $i + 1;
				$family++;
			}
			else{
				$data['morph_lvl'] = $count;
				$this->db->where('id', $i);
				$this->db->update('dwc_familiars_copy', $data);
				$count++;
			}

		}
	}

}

/* End of file app_model.php */
/* Location: ./application/models/app_model.php */
