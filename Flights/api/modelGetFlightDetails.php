<?php 
	include_once "../inc/incSession.php";
	include_once '../connection.php';

	$flight_list_array = array();
	//fetch flight data
	$sql_input_data="SELECT details_json,login_id FROM `tbl_flight_details` WHERE login_id=".$_SESSION['login_id'].";";
	  $result_data = mysqli_query($con,$sql_input_data);
	if($result_data && mysqli_num_rows($result_data)>0) 
	{
		$temp = array();
		$row_data=mysqli_fetch_assoc($result_data);
		$json = json_decode($row_data['details_json']);
		$arr1=array($json->data->data->travel->data->result->flight_data->flights->from[0]->flights[0]);
		$arr2=array($json->data->data->travel->data->result->flight_data->flights->from[1]->flights[0]);
		$arr3=array($json->data->data->travel->data->result->flight_data->flights->from[2]->flights[0]);
		$arr4=array($json->data->data->travel->data->result->flight_data->flights->from[3]->flights[0]);
		$arr5=array($json->data->data->travel->data->result->flight_data->flights->from[4]->flights[0]);
		$main_arr= array_merge($arr1,$arr2,$arr3,$arr4,$arr5);
		// print_r($main_arr);
		foreach ($main_arr as $key => $value) {
			$temp['flight_name']=$value->carrier_name;
			$temp['carrier_id']=$value->carrier_id;
			$temp['to']=$value->to;
			$temp['from']=$value->from;
			$temp['arrival_date_time']=$value->arrival_date_time;
			$temp['departure_date_time']=$value->departure_date_time;
			$flight_list_array[] = $temp;
		}
		
	}
	mysqli_close($con);
	die(json_encode(array("apiError"=>"","flight_list_array"=>$flight_list_array)));

?>
