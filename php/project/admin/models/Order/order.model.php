<?php
class Order extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $status;
	public $grand_total;
	public $discount;
	public $vat;
	public $order_date;

	public function __construct(){
	}
	public function set($id,$customer_id,$status,$grand_total,$discount,$vat,$order_date){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->status=$status;
		$this->grand_total=$grand_total;
		$this->discount=$discount;
		$this->vat=$vat;
		$this->order_date=$order_date;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}orders(customer_id,status,grand_total,discount,vat,order_date)values('$this->customer_id','$this->status','$this->grand_total','$this->discount','$this->vat','$this->order_date')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}orders set customer_id='$this->customer_id',status='$this->status',grand_total='$this->grand_total',discount='$this->discount',vat='$this->vat',order_date='$this->order_date' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}orders where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,status,grand_total,discount,vat,order_date from {$tx}orders");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,status,grand_total,discount,vat,order_date from {$tx}orders $criteria limit $top,$perpage");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,status,grand_total,discount,vat,order_date from {$tx}orders where id='$id'");
		$order=$result->fetch_object();
			return $order;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}orders");
		$order =$result->fetch_object();
		return $order->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Status:$this->status<br> 
		Grand Total:$this->grand_total<br> 
		Discount:$this->discount<br> 
		Vat:$this->vat<br> 
		Order Date:$this->order_date<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrder"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}orders");
		while($order=$result->fetch_object()){
			$html.="<option value ='$order->id'>$order->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,status,grand_total,discount,vat,order_date from {$tx}orders $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"order/create","text"=>"New Order"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Status</th><th>Grand Total</th><th>Discount</th><th>Vat</th><th>Order Date</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Status</th><th>Grand Total</th><th>Discount</th><th>Vat</th><th>Order Date</th></tr>";
		}
		while($order=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"order/show/$order->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"order/edit/$order->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"order/confirm/$order->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$order->id</td><td>$order->customer_id</td><td>$order->status</td><td>$order->grand_total</td><td>$order->discount</td><td>$order->vat</td><td>$order->order_date</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,status,grand_total,discount,vat,order_date from {$tx}orders where id={$id}");
		$order=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Order Show</th></tr>";
		$html.="<tr><th>Id</th><td>$order->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$order->customer_id</td></tr>";
		$html.="<tr><th>Status</th><td>$order->status</td></tr>";
		$html.="<tr><th>Grand Total</th><td>$order->grand_total</td></tr>";
		$html.="<tr><th>Discount</th><td>$order->discount</td></tr>";
		$html.="<tr><th>Vat</th><td>$order->vat</td></tr>";
		$html.="<tr><th>Order Date</th><td>$order->order_date</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
