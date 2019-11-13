<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	

	public function index(){
		echo "Hello World";
	}

	// get the restudents list
	public function restudentsList()
	{
		$response['success']=true;
		
		$get_data=$this->Common->get_restuent();
		if($get_data==FALSE){
			$response['message']=false;
		}
		else{
			$response['message']=true;
			$get_data=$get_data->result();
		}	
		$response['data']=$get_data;

		$this->genarateJson($response);
	}

		// For Sorting
	public function sortRestudent()
	{
		$requst= $this->uri->slash_segment(1);

		if('sortbybestmatch/'==$requst)
		{
			$orderCol="bestMatch";
			$value="desc";
			$response['success']=true;
		}
		elseif('sortbynewest/'==$requst)
		{
			$orderCol="newestScore";
			$value="desc";
			$response['success']=true;
		}
		elseif('sortbyratingavarage/'==$requst)
		{
			$orderCol="ratingAverage";
			$value="desc";
			$response['success']=true;
		}
		elseif('sortbypopularity/'==$requst)
		{
			$orderCol="popularity";
			$value="desc";
			$response['success']=true;
		}
		elseif('sortbyaverageproductprice/'==$requst)
		{
			$orderCol="averageProductPrice";
			$value="desc";
			$response['success']=true;
		}
		elseif('sortbydeliverycostsh2l/'==$requst)
		{
			$orderCol="deliveryCosts";
			$value="desc";
			$response['success']=true;
		}
		elseif('sortbydeliverycostsl2h/'==$requst)
		{
			$orderCol="deliveryCosts";
			$value="asc";
			$response['success']=true;
		}
		else{
			$response['success']=false;
		}
		if($response['success']==false){
			$response['message']='Invalid URL';
			$this->genarateJson($response);
		}
		else{
			$get_data=$this->Common->sort_restudent($orderCol,$value);
			if($get_data==FALSE){
				$response['message']=false;
			}
			else{
				$response['message']=true;
				$get_data=$get_data->result();
			}	
			$response['data']=$get_data;

			$this->genarateJson($response);
		}	
	}

		// For Searching
	public function searchRestudents()
	{
		if($this->input->post('restudent_name')==""){
			$response['success']=false;
			$response['message']='Please Sent Restudent Name';
			$this->genarateJson($response);
		}
		else{
			$response['success']=true;
			$restudentName=$this->input->post('restudent_name');
			$get_data=$this->Common->searchRestudents($restudentName);
			if($get_data==FALSE){
				$response['message']=false;
			}
			else{
				$response['message']=true;
				$get_data=$get_data->result();
			}	
			$response['data']=$get_data;

			$this->genarateJson($response);
		}
		
	}
	// For Genarate Output
	public function genarateJson($responseData){
		if($this->input->post('app_version')=="5.12.300"){
			$responseData['data']=$this->json_change_key($responseData['data'],'name','RestaurantName ');
		}
		
		echo json_encode($responseData);

	}

	
	// For error Reporting
	public function errorRequest(){
		$response['success']=false;
		$response['message']='404 Page not found';
		echo json_encode($response);
	}

	// For Object Tittle Name Changer 
	public function json_change_key($arr, $oldkey, $newkey) {
		$json = str_replace('"'.$oldkey.'":', '"'.$newkey.'":', json_encode($arr));
		return json_decode($json); 
	}


}