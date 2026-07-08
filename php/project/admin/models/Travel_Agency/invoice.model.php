<?php
class Invoice extends Model implements JsonSerializable{
	public $id;
	public $booking_id;
	public $invoice_no;
	public $total;
	public $discount;
	public $vat;
	public $grand_total;

	public function __construct(){
	}
	public function set($id,$booking_id,$invoice_no,$total,$discount,$vat,$grand_total){
		$this->id=$id;
		$this->booking_id=$booking_id;
		$this->invoice_no=$invoice_no;
		$this->total=$total;
		$this->discount=$discount;
		$this->vat=$vat;
		$this->grand_total=$grand_total;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}invoices(booking_id,invoice_no,total,discount,vat,grand_total)values('$this->booking_id','$this->invoice_no','$this->total','$this->discount','$this->vat','$this->grand_total')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}invoices set booking_id='$this->booking_id',invoice_no='$this->invoice_no',total='$this->total',discount='$this->discount',vat='$this->vat',grand_total='$this->grand_total' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}invoices where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,booking_id,invoice_no,total,discount,vat,grand_total from {$tx}invoices");
		$data=[];
		while($invoice=$result->fetch_object()){
			$data[]=$invoice;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,booking_id,invoice_no,total,discount,vat,grand_total from {$tx}invoices $criteria limit $top,$perpage");
		$data=[];
		while($invoice=$result->fetch_object()){
			$data[]=$invoice;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}invoices $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,booking_id,invoice_no,total,discount,vat,grand_total from {$tx}invoices where id='$id'");
		$invoice=$result->fetch_object();
			return $invoice;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}invoices");
		$invoice =$result->fetch_object();
		return $invoice->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Booking Id:$this->booking_id<br> 
		Invoice No:$this->invoice_no<br> 
		Total:$this->total<br> 
		Discount:$this->discount<br> 
		Vat:$this->vat<br> 
		Grand Total:$this->grand_total<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbInvoice"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}invoices");
		while($invoice=$result->fetch_object()){
			$html.="<option value ='$invoice->id'>$invoice->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}invoices $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,booking_id,invoice_no,total,discount,vat,grand_total from {$tx}invoices $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"invoice/create","text"=>"New Invoice"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Booking Id</th><th>Invoice No</th><th>Total</th><th>Discount</th><th>Vat</th><th>Grand Total</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Booking Id</th><th>Invoice No</th><th>Total</th><th>Discount</th><th>Vat</th><th>Grand Total</th></tr>";
		}
		while($invoice=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"invoice/show/$invoice->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"invoice/edit/$invoice->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"invoice/confirm/$invoice->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$invoice->id</td><td>$invoice->booking_id</td><td>$invoice->invoice_no</td><td>$invoice->total</td><td>$invoice->discount</td><td>$invoice->vat</td><td>$invoice->grand_total</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,booking_id,invoice_no,total,discount,vat,grand_total from {$tx}invoices where id={$id}");
		$invoice=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Invoice Show</th></tr>";
		$html.="<tr><th>Id</th><td>$invoice->id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$invoice->booking_id</td></tr>";
		$html.="<tr><th>Invoice No</th><td>$invoice->invoice_no</td></tr>";
		$html.="<tr><th>Total</th><td>$invoice->total</td></tr>";
		$html.="<tr><th>Discount</th><td>$invoice->discount</td></tr>";
		$html.="<tr><th>Vat</th><td>$invoice->vat</td></tr>";
		$html.="<tr><th>Grand Total</th><td>$invoice->grand_total</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
