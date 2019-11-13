<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

    // Genarated Test Data
    public function testdata_restudents_list(){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $open = array_column($db_data, 'open');
        $bestmatch = array_column($db_data, 'bestMatch');
        array_multisort($open, SORT_DESC, $bestmatch, SORT_DESC, $db_data);
        $response['data']=$db_data;
        return json_encode($response);

    }

    public function testdata_bestmatch(){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $bestmatch = array_column($db_data, 'bestMatch');
        array_multisort($bestmatch, SORT_DESC, $db_data);
        $response['data']=$db_data;
        return json_encode($response);

    }

    public function testdata_sortbynewest(){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $newestScore = array_column($db_data, 'newestScore');
        array_multisort($newestScore, SORT_DESC, $db_data);
        $response['data']=$db_data;
        return json_encode($response);
    }


    public function testdata_sortbyratingavarage(){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $ratingAverage = array_column($db_data, 'ratingAverage');
        array_multisort($ratingAverage, SORT_DESC, $db_data);
        $response['data']=$db_data;
        return json_encode($response);
    }

    public function testdata_sortbypopularity(){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $popularity = array_column($db_data, 'popularity');
        array_multisort($popularity, SORT_DESC, $db_data);
        $response['data']=$db_data;
        return json_encode($response);
    }

    public function testdata_sortbyaverageproductprice(){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $averageProductPrice = array_column($db_data, 'averageProductPrice');
        array_multisort($averageProductPrice, SORT_DESC, $db_data);
        $response['data']=$db_data;
        return json_encode($response);
    }

    public function testdata_sortbydeliverycostsh2l(){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $deliveryCosts = array_column($db_data, 'deliveryCosts');
        array_multisort($deliveryCosts, SORT_DESC, $db_data);
        $response['data']=$db_data;
        return json_encode($response);
    }

    public function testdata_search_data($restudents_name){
        $response['success']=true;
        $response['message']=true;
        $db_data=$this->Common->get_data('resturents')->result();
        $i=0;
        foreach($db_data as $row){
            if (strpos($row->name, $restudents_name) !== false) {
                $search_result[$i++]=$row;
             }
        }

        $bestMatch = array_column($search_result, 'bestMatch');
        array_multisort($bestMatch, SORT_DESC, $search_result);

        $response['data']=$search_result;
        return json_encode($response);
    }

    // Testing Functions
    
    public function restudentslist(){
		$this->load->library('unit_test');
		$url = 'http://localhost/restudents/restudentslist';
		$short = curl_init($url);
		curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        $main_data = curl_exec($short);
        $test_data=$this->testdata_restudents_list();
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        
        
        $test_name="Restudents List Test With Open and Best Match Sort";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $test = count(array_intersect($main_data_array, $test_data_array));
        $expected_result=count($main_data_array);
        $this->unit->run($test,$expected_result,$test_name);
 
    }
   


    public function bestmatch(){
		$this->load->library('unit_test');
		$url = 'http://localhost/restudents/sortbybestmatch';
		$short = curl_init($url);
		curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        $main_data = curl_exec($short);
        $test_data=$this->testdata_bestmatch();
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="bestmatch Data Test";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $test = count(array_intersect($main_data_array, $test_data_array));
        $expected_result=count($main_data_array);
        $this->unit->run($test,$expected_result,$test_name);

    }

    public function sortbynewest(){
		$this->load->library('unit_test');
		$url = 'http://localhost/restudents/sortbynewest';
		$short = curl_init($url);
		curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        $main_data = curl_exec($short);
        $test_data=$this->testdata_sortbynewest();
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="sortbynewest Data Test";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $test = count(array_intersect($main_data_array, $test_data_array));
        $expected_result=count($main_data_array);
        $this->unit->run($test,$expected_result,$test_name);

    }


    public function sortbyratingavarage(){
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/sortbyratingavarage';
		$short = curl_init($url);
		curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        $main_data = curl_exec($short);
        $test_data=$this->testdata_sortbyratingavarage();
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="sortbynewest Data Test";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $test = count(array_intersect($main_data_array, $test_data_array));
        $expected_result=count($main_data_array);
        $this->unit->run($test,$expected_result,$test_name);
    }

    public function sortbypopularity(){
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/sortbypopularity';
		$short = curl_init($url);
		curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        $main_data = curl_exec($short);
        $test_data=$this->testdata_sortbypopularity();
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="sortbynewest Data Test";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $test = count(array_intersect($main_data_array, $test_data_array));
        $expected_result=count($main_data_array);
        $this->unit->run($test,$expected_result,$test_name);
    }

    public function sortbyaverageproductprice(){
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/sortbyaverageproductprice';
		$short = curl_init($url);
		curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        $main_data = curl_exec($short);
        $test_data=$this->testdata_sortbyaverageproductprice();
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="sortbynewest Data Test";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $test = count(array_intersect($main_data_array, $test_data_array));
        $expected_result=count($main_data_array);
        $this->unit->run($test,$expected_result,$test_name);
    }


    public function sortbydeliverycostsh2l(){
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/sortbydeliverycostsh2l';
		$short = curl_init($url);
		curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        $main_data = curl_exec($short);
        $test_data=$this->testdata_sortbydeliverycostsh2l();
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="sortbynewest Data Test";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $test = count(array_intersect($main_data_array, $test_data_array));
        $expected_result=count($main_data_array);
        $this->unit->run($test,$expected_result,$test_name);
    }


    public function search_restudent(){
        $post = [
            'restudent_name' => 'Oen',
            
        ];
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/search_restudent';
		$short = curl_init($url);
        curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($short, CURLOPT_POSTFIELDS, $post);
        $main_data = curl_exec($short);
        $restudents_name='Oen';
        $test_data=$this->testdata_search_data($restudents_name);
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="Test Search Restudent Case 1";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $this->unit->run($main_data_array,$test_data_array,$test_name);



        $post = [
            'restudent_name' => 'Surakarta Express',
            
        ];
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/search_restudent';
		$short = curl_init($url);
        curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($short, CURLOPT_POSTFIELDS, $post);
        $main_data = curl_exec($short);
        $restudents_name='Surakarta Express';
        $test_data=$this->testdata_search_data($restudents_name);
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="Test Search Restudent Case 2";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $this->unit->run($main_data_array,$test_data_array,$test_name);



        $post = [
            'restudent_name' => 'Griek',
            
        ];
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/search_restudent';
		$short = curl_init($url);
        curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($short, CURLOPT_POSTFIELDS, $post);
        $main_data = curl_exec($short);
        $restudents_name='Griek';
        $test_data=$this->testdata_search_data($restudents_name);
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="Test Search Restudent Case 3";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $this->unit->run($main_data_array,$test_data_array,$test_name);



        $post = [
            'restudent_name' => 'iek',
            
        ];
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/search_restudent';
		$short = curl_init($url);
        curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($short, CURLOPT_POSTFIELDS, $post);
        $main_data = curl_exec($short);
        $restudents_name='iek';
        $test_data=$this->testdata_search_data($restudents_name);
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="Test Search Restudent Case 4";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $this->unit->run($main_data_array,$test_data_array,$test_name);


        $post = [
            'restudent_name' => '',
            
        ];
        $this->load->library('unit_test');
		$url = 'http://localhost/restudents/search_restudent';
		$short = curl_init($url);
        curl_setopt($short, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($short, CURLOPT_POSTFIELDS, $post);
        $main_data = curl_exec($short);
        $restudents_name='';
        $test_data=$this->testdata_search_data($restudents_name);
        $test_data=json_decode($test_data);
        $main_data=json_decode($main_data);
        $test_name="Test Search Restudent Case 5";
        $main_data_array = (array) $main_data->data;
        $test_data_array = (array) $test_data->data;
        $this->unit->run($main_data_array,$test_data_array,$test_name);

    }

    public function unit_test_report(){
        $this->restudentslist();
        $this->bestmatch();
        $this->sortbynewest();
        $this->sortbyratingavarage();
        $this->sortbypopularity();
        $this->sortbyaverageproductprice();
        $this->sortbydeliverycostsh2l();
        $this->search_restudent();
        echo $this->unit->report();
    }


}