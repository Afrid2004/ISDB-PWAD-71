<?php
class Product extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $price;
	public $purchase_price;
	public $description;
	public $photo;
	public $star;
	public $is_brand;
	public $offer_discount;
	public $uom_id;
	public $barcode;
	public $created_at;
	public $updated_at;
	public $category_id;

	public function __construct(){
	}
	public function set($id,$name,$price,$purchase_price,$description,$photo,$star,$is_brand,$offer_discount,$uom_id,$barcode,$created_at,$updated_at,$category_id){
		$this->id=$id;
		$this->name=$name;
		$this->price=$price;
		$this->purchase_price=$purchase_price;
		$this->description=$description;
		$this->photo=$photo;
		$this->star=$star;
		$this->is_brand=$is_brand;
		$this->offer_discount=$offer_discount;
		$this->uom_id=$uom_id;
		$this->barcode=$barcode;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->category_id=$category_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}products(name,price,purchase_price,description,photo,star,is_brand,offer_discount,uom_id,barcode,created_at,updated_at,category_id)values('$this->name','$this->price','$this->purchase_price','$this->description','$this->photo','$this->star','$this->is_brand','$this->offer_discount','$this->uom_id','$this->barcode','$this->created_at','$this->updated_at','$this->category_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}products set name='$this->name',price='$this->price',purchase_price='$this->purchase_price',description='$this->description',photo='$this->photo',star='$this->star',is_brand='$this->is_brand',offer_discount='$this->offer_discount',uom_id='$this->uom_id',barcode='$this->barcode',created_at='$this->created_at',updated_at='$this->updated_at',category_id='$this->category_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}products where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,price,purchase_price,description,photo,star,is_brand,offer_discount,uom_id,barcode,created_at,updated_at,category_id from {$tx}products");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,price,purchase_price,description,photo,star,is_brand,offer_discount,uom_id,barcode,created_at,updated_at,category_id from {$tx}products $criteria limit $top,$perpage");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}products $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,price,purchase_price,description,photo,star,is_brand,offer_discount,uom_id,barcode,created_at,updated_at,category_id from {$tx}products where id='$id'");
		$found_product=$result->fetch_object();
        $product = new Product();
		$product->set(
        $found_product->id,
		$found_product->name,
		$found_product->price,
		$found_product->purchase_price,
		$found_product->description,
		$found_product->photo,
		$found_product->star,
		$found_product->is_brand,
		$found_product->offer_discount,
		$found_product->uom_id,
		$found_product->barcode,
		$found_product->created_at,
		$found_product->updated_at,
		$found_product->category_id
		);
		return $product;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}products");
		$product =$result->fetch_object();
		return $product->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Price:$this->price<br> 
		Purchase Price:$this->purchase_price<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
		Star:$this->star<br> 
		Is Brand:$this->is_brand<br> 
		Offer Discount:$this->offer_discount<br> 
		Uom Id:$this->uom_id<br> 
		Barcode:$this->barcode<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
		Category Id:$this->category_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProduct"){
		global $db,$tx;
		$html="<select class='form-select' id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}products");
		while($product=$result->fetch_object()){
			$html.="<option  value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}products $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,price,purchase_price,description,photo,star,is_brand,offer_discount,uom_id,barcode,created_at,updated_at,category_id from {$tx}products $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"product/create","text"=>"New Product"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Purchase Price</th><th>Description</th><th>Photo</th><th>Star</th><th>Is Brand</th><th>Offer Discount</th><th>Uom Id</th><th>Barcode</th><th>Created At</th><th>Updated At</th><th>Category Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Purchase Price</th><th>Description</th><th>Photo</th><th>Star</th><th>Is Brand</th><th>Offer Discount</th><th>Uom Id</th><th>Barcode</th><th>Created At</th><th>Updated At</th><th>Category Id</th></tr>";
		}
		while($product=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"product/show/$product->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"product/edit/$product->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"product/confirm/$product->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$product->id</td><td>$product->name</td><td>$product->price</td><td>$product->purchase_price</td><td>$product->description</td><td><img src='$base_url/img/$product->photo' width='100' /></td><td>$product->star</td><td>$product->is_brand</td><td>$product->offer_discount</td><td>$product->uom_id</td><td>$product->barcode</td><td>$product->created_at</td><td>$product->updated_at</td><td>$product->category_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,price,purchase_price,description,photo,star,is_brand,offer_discount,uom_id,barcode,created_at,updated_at,category_id from {$tx}products where id={$id}");
		$product=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Product Show</th></tr>";
		$html.="<tr><th>Id</th><td>$product->id</td></tr>";
		$html.="<tr><th>Name</th><td>$product->name</td></tr>";
		$html.="<tr><th>Price</th><td>$product->price</td></tr>";
		$html.="<tr><th>Purchase Price</th><td>$product->purchase_price</td></tr>";
		$html.="<tr><th>Description</th><td>$product->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src='$base_url/img/$product->photo' width='100' /></td></tr>";
		$html.="<tr><th>Star</th><td>$product->star</td></tr>";
		$html.="<tr><th>Is Brand</th><td>$product->is_brand</td></tr>";
		$html.="<tr><th>Offer Discount</th><td>$product->offer_discount</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$product->uom_id</td></tr>";
		$html.="<tr><th>Barcode</th><td>$product->barcode</td></tr>";
		$html.="<tr><th>Created At</th><td>$product->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$product->updated_at</td></tr>";
		$html.="<tr><th>Category Id</th><td>$product->category_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
