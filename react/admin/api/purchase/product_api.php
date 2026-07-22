<?php
class ProductApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["products"=>Product::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["products"=>Product::pagination($page,$perpage),"total_records"=>Product::count()]);
	}
	function find($data){
		echo json_encode(["product"=>Product::find($data["id"])]);
	}
	function delete($data){
		Product::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$product=new Product();
		$product->name=$data["name"];
		$product->price=$data["price"];
		$product->purchase_price=$data["purchase_price"];
		$product->description=$data["description"];
		$product->photo=upload($file["photo"], "../img",$data["name"]);
		$product->star=$data["star"];
		$product->is_brand=$data["is_brand"];
		$product->offer_discount=$data["offer_discount"];
		$product->uom_id=$data["uom_id"];
		$product->barcode=$data["barcode"];
		$product->created_at=$data["created_at"];
		$product->updated_at=$data["updated_at"];
		$product->category_id=$data["category_id"];

		$product->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$product=new Product();
		$product->id=$data["id"];
		$product->name=$data["name"];
		$product->price=$data["price"];
		$product->purchase_price=$data["purchase_price"];
		$product->description=$data["description"];
		if(isset($file["photo"]["name"])){
			$product->photo=upload($file["photo"], "../img",$data["name"]);
		}else{
			$product->photo=Product::find($data["id"])->photo;
		}
		$product->star=$data["star"];
		$product->is_brand=$data["is_brand"];
		$product->offer_discount=$data["offer_discount"];
		$product->uom_id=$data["uom_id"];
		$product->barcode=$data["barcode"];
		$product->created_at=$data["created_at"];
		$product->updated_at=$data["updated_at"];
		$product->category_id=$data["category_id"];

		$product->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
