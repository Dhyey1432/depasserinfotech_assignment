<?php 

class Form_validation extends Connection
{
	public function execute($data , $image , $user_id = 0)
	{
		$flag = true ;
		if ($data['firstname'] == '') {
			$message['firstname'] = "<p>firstname is required</p>";
			$flag = false ; 
		}

		if ($image == '' && $user_id == 0) {
			$message['image'] = "<p>Image is Not present</p>";
			$flag = false ; 
		}

		if ($data['lastname'] == '') {
			$message['lastname'] = "<p>lastname is required</p>";
			$flag = false ; 
		}

		if ($data['email'] == '') {
			$message['email'] = "<p>email is required</p>";
			$flag = false ; 
		}

		if ($data['contact'] == '') {
			$message['contact'] = "<p>contact is required</p>";
			$flag = false ; 
		}
		if ($data['password'] == '') {
			$message['password'] = "<p>password is required</p>";
			$flag = false ; 
		}

		if ($data['cpassword'] == '') {
			$message['cpassword'] = "<p>confirm Password is required</p>";
			$flag = false ; 
		} elseif ($data['cpassword'] != $data['password']){
			$message['cpassword'] = "<p>confirm Password is required</p>";
			$flag = false ; 
		}

		if ($data['address_1'] == '') {
			$message['address_1'] = "<p>address_1 is required</p>";
			$flag = false ; 
		}

		if ($data['address_2'] == '') {
			$message['address_2'] = "<p>address_2 is required</p>";
			$flag = false ; 
		}

		if ($data['country_id'] == '' || $data['country_id'] == 0) {
			$message['country_id'] = "<p>country is required</p>";
			$flag = false ; 
		}

		if ($data['state_id'] == '' || $data['state_id'] == 0) {
			$message['state_id'] = "<p>state is required</p>";
			$flag = false ; 
		}

		if ($data['city_id'] == '' || $data['city_id'] == 0) {
			$message['city_id'] = "<p>city is required</p>";
			$flag = false ; 
		}


		if ($flag == false) {
			return json_encode(array('status'=>false,'message'=> $message));
		} else {
			return json_encode(array('status'=>true));
		}
	}
}