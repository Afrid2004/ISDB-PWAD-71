<?php
class Flight extends Model implements JsonSerializable{
	public $id;
	public $airline;
	public $flight_no;
	public $source;
	public $destination;
	public $price;

	public function __construct(){
	}
	public function set($id,$airline,$flight_no,$source,$destination,$price){
		$this->id=$id;
		$this->airline=$airline;
		$this->flight_no=$flight_no;
		$this->source=$source;
		$this->destination=$destination;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}flights(airline,flight_no,source,destination,price)values('$this->airline','$this->flight_no','$this->source','$this->destination','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}flights set airline='$this->airline',flight_no='$this->flight_no',source='$this->source',destination='$this->destination',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}flights where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,airline,flight_no,source,destination,price from {$tx}flights");
		$data=[];
		while($flight=$result->fetch_object()){
			$data[]=$flight;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,airline,flight_no,source,destination,price from {$tx}flights $criteria limit $top,$perpage");
		$data=[];
		while($flight=$result->fetch_object()){
			$data[]=$flight;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}flights $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,airline,flight_no,source,destination,price from {$tx}flights where id='$id'");
		$flight=$result->fetch_object();
			return $flight;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}flights");
		$flight =$result->fetch_object();
		return $flight->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Airline:$this->airline<br> 
		Flight No:$this->flight_no<br> 
		Source:$this->source<br> 
		Destination:$this->destination<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbFlight"){
		global $db,$tx;
		$html="<select class='form-select' id='$name' name='$name'> ";
		$result =$db->query("select id,airline from {$tx}flights");
		while($flight=$result->fetch_object()){
			$html.="<option value ='$flight->id'>$flight->airline</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}flights $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,airline,flight_no,source,destination,price from {$tx}flights $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"flight/create","text"=>"New Flight"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Airline</th><th>Flight No</th><th>Source</th><th>Destination</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Airline</th><th>Flight No</th><th>Source</th><th>Destination</th><th>Price</th></tr>";
		}
		while($flight=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"flight/show/$flight->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"flight/edit/$flight->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"flight/confirm/$flight->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$flight->id</td><td>$flight->airline</td><td>$flight->flight_no</td><td>$flight->source</td><td>$flight->destination</td><td>$flight->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,airline,flight_no,source,destination,price from {$tx}flights where id={$id}");
		$flight=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Flight Show</th></tr>";
		$html.="<tr><th>Id</th><td>$flight->id</td></tr>";
		$html.="<tr><th>Airline</th><td>$flight->airline</td></tr>";
		$html.="<tr><th>Flight No</th><td>$flight->flight_no</td></tr>";
		$html.="<tr><th>Source</th><td>$flight->source</td></tr>";
		$html.="<tr><th>Destination</th><td>$flight->destination</td></tr>";
		$html.="<tr><th>Price</th><td>$flight->price</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
