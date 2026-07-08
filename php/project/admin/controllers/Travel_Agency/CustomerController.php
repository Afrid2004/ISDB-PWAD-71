<?php
class TCustomerController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Travel_Agency");
	}
	public function create(){
		view("Travel_Agency");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPassportNo"])){
		$errors["passport_no"]="Invalid passport_no";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}

*/
		if(count($errors)==0){
			$customer=new Customer();
		$customer->name=$data["name"];
		$customer->phone=$data["phone"];
		$customer->email=$data["email"];
		$customer->passport_no=$data["passport_no"];
		$customer->address=$data["address"];

			$customer->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Travel_Agency",Customer::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPassportNo"])){
		$errors["passport_no"]="Invalid passport_no";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}

*/
		if(count($errors)==0){
			$customer=new Customer();
			$customer->id=$data["id"];
		$customer->name=$data["name"];
		$customer->phone=$data["phone"];
		$customer->email=$data["email"];
		$customer->passport_no=$data["passport_no"];
		$customer->address=$data["address"];

		$customer->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Travel_Agency");
	}
	public function delete($id){
		Customer::delete($id);
		redirect();
	}
	public function show($id){
		view("Travel_Agency",Customer::find($id));
	}
}
?>
