<?php
class Visa extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $country;
	public $visa_type;
	public $status;

	public function __construct(){
	}
	public function set($id,$customer_id,$country,$visa_type,$status){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->country=$country;
		$this->visa_type=$visa_type;
		$this->status=$status;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}visa(customer_id,country,visa_type,status)values('$this->customer_id','$this->country','$this->visa_type','$this->status')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}visa set customer_id='$this->customer_id',country='$this->country',visa_type='$this->visa_type',status='$this->status' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}visa where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,country,visa_type,status from {$tx}visa");
		$data=[];
		while($visa=$result->fetch_object()){
			$data[]=$visa;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,country,visa_type,status from {$tx}visa $criteria limit $top,$perpage");
		$data=[];
		while($visa=$result->fetch_object()){
			$data[]=$visa;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}visa $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,country,visa_type,status from {$tx}visa where id='$id'");
		$visa=$result->fetch_object();
			return $visa;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}visa");
		$visa =$result->fetch_object();
		return $visa->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Country:$this->country<br> 
		Visa Type:$this->visa_type<br> 
		Status:$this->status<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbVisa"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}visa");
		while($visa=$result->fetch_object()){
			$html.="<option value ='$visa->id'>$visa->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}visa $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,country,visa_type,status from {$tx}visa $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"visa/create","text"=>"New Visa"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Country</th><th>Visa Type</th><th>Status</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Country</th><th>Visa Type</th><th>Status</th></tr>";
		}
		while($visa=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"visa/show/$visa->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"visa/edit/$visa->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"visa/confirm/$visa->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$visa->id</td><td>$visa->customer_id</td><td>$visa->country</td><td>$visa->visa_type</td><td>$visa->status</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,country,visa_type,status from {$tx}visa where id={$id}");
		$visa=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Visa Show</th></tr>";
		$html.="<tr><th>Id</th><td>$visa->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$visa->customer_id</td></tr>";
		$html.="<tr><th>Country</th><td>$visa->country</td></tr>";
		$html.="<tr><th>Visa Type</th><td>$visa->visa_type</td></tr>";
		$html.="<tr><th>Status</th><td>$visa->status</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
