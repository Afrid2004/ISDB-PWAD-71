<?php
class RoleApi{
	public function __construct(){
	}
	
    public function index(){
		echo  json_encode(["roles" => Role::all()]);
	}


}
?>
