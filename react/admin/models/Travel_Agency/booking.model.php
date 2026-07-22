<?php
class Booking extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $package_id;
	public $employee_id;
	public $booking_date;
	public $travel_date;
	public $travelers;
	public $status;

	public function __construct(){
	}
	public function set($id,$customer_id,$package_id,$employee_id,$booking_date,$travel_date,$travelers,$status){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->package_id=$package_id;
		$this->employee_id=$employee_id;
		$this->booking_date=$booking_date;
		$this->travel_date=$travel_date;
		$this->travelers=$travelers;
		$this->status=$status;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}bookings(customer_id,package_id,employee_id,booking_date,travel_date,travelers,status)values('$this->customer_id','$this->package_id','$this->employee_id','$this->booking_date','$this->travel_date','$this->travelers','$this->status')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}bookings set customer_id='$this->customer_id',package_id='$this->package_id',employee_id='$this->employee_id',booking_date='$this->booking_date',travel_date='$this->travel_date',travelers='$this->travelers',status='$this->status' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}bookings where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,package_id,employee_id,booking_date,travel_date,travelers,status from {$tx}bookings");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,package_id,employee_id,booking_date,travel_date,travelers,status from {$tx}bookings $criteria limit $top,$perpage");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}bookings $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,package_id,employee_id,booking_date,travel_date,travelers,status from {$tx}bookings where id='$id'");
		$booking=$result->fetch_object();
			return $booking;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}bookings");
		$booking =$result->fetch_object();
		return $booking->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Package Id:$this->package_id<br> 
		Employee Id:$this->employee_id<br> 
		Booking Date:$this->booking_date<br> 
		Travel Date:$this->travel_date<br> 
		Travelers:$this->travelers<br> 
		Status:$this->status<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBooking"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}bookings");
		while($booking=$result->fetch_object()){
			$html.="<option value ='$booking->id'>$booking->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}bookings $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,package_id,employee_id,booking_date,travel_date,travelers,status from {$tx}bookings $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"booking/create","text"=>"New Booking"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Package Id</th><th>Employee Id</th><th>Booking Date</th><th>Travel Date</th><th>Travelers</th><th>Status</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Package Id</th><th>Employee Id</th><th>Booking Date</th><th>Travel Date</th><th>Travelers</th><th>Status</th></tr>";
		}
		while($booking=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"booking/show/$booking->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"booking/edit/$booking->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"booking/confirm/$booking->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$booking->id</td><td>$booking->customer_id</td><td>$booking->package_id</td><td>$booking->employee_id</td><td>$booking->booking_date</td><td>$booking->travel_date</td><td>$booking->travelers</td><td>$booking->status</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,package_id,employee_id,booking_date,travel_date,travelers,status from {$tx}bookings where id={$id}");
		$booking=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Booking Show</th></tr>";
		$html.="<tr><th>Id</th><td>$booking->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$booking->customer_id</td></tr>";
		$html.="<tr><th>Package Id</th><td>$booking->package_id</td></tr>";
		$html.="<tr><th>Employee Id</th><td>$booking->employee_id</td></tr>";
		$html.="<tr><th>Booking Date</th><td>$booking->booking_date</td></tr>";
		$html.="<tr><th>Travel Date</th><td>$booking->travel_date</td></tr>";
		$html.="<tr><th>Travelers</th><td>$booking->travelers</td></tr>";
		$html.="<tr><th>Status</th><td>$booking->status</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
