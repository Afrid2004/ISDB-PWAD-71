<?php
class Hotel extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $city;
	public $rating;
	public $price_per_night;

	public function __construct(){
	}
	public function set($id,$name,$city,$rating,$price_per_night){
		$this->id=$id;
		$this->name=$name;
		$this->city=$city;
		$this->rating=$rating;
		$this->price_per_night=$price_per_night;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}hotels(name,city,rating,price_per_night)values('$this->name','$this->city','$this->rating','$this->price_per_night')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}hotels set name='$this->name',city='$this->city',rating='$this->rating',price_per_night='$this->price_per_night' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}hotels where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,city,rating,price_per_night from {$tx}hotels");
		$data=[];
		while($hotel=$result->fetch_object()){
			$data[]=$hotel;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,city,rating,price_per_night from {$tx}hotels $criteria limit $top,$perpage");
		$data=[];
		while($hotel=$result->fetch_object()){
			$data[]=$hotel;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}hotels $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,city,rating,price_per_night from {$tx}hotels where id='$id'");
		$hotel=$result->fetch_object();
			return $hotel;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}hotels");
		$hotel =$result->fetch_object();
		return $hotel->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		City:$this->city<br> 
		Rating:$this->rating<br> 
		Price Per Night:$this->price_per_night<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbHotel"){
		global $db,$tx;
		$html="<select class='form-select' id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}hotels");
		while($hotel=$result->fetch_object()){
			$html.="<option value ='$hotel->id'>$hotel->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}hotels $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,city,rating,price_per_night from {$tx}hotels $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"hotel/create","text"=>"New Hotel"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>City</th><th>Rating</th><th>Price Per Night</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>City</th><th>Rating</th><th>Price Per Night</th></tr>";
		}
		while($hotel=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"hotel/show/$hotel->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"hotel/edit/$hotel->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"hotel/confirm/$hotel->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$hotel->id</td><td>$hotel->name</td><td>$hotel->city</td><td>$hotel->rating</td><td>$hotel->price_per_night</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,city,rating,price_per_night from {$tx}hotels where id={$id}");
		$hotel=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Hotel Show</th></tr>";
		$html.="<tr><th>Id</th><td>$hotel->id</td></tr>";
		$html.="<tr><th>Name</th><td>$hotel->name</td></tr>";
		$html.="<tr><th>City</th><td>$hotel->city</td></tr>";
		$html.="<tr><th>Rating</th><td>$hotel->rating</td></tr>";
		$html.="<tr><th>Price Per Night</th><td>$hotel->price_per_night</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
