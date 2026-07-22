<?php

class PurchaseApi
{

    function index()
    {
        echo  json_encode(["success" => "api is working"]);
    }



    function purchaseProcess()
    {
        global $db;
        try {
            $db->begin_transaction();

            $products = array_map(fn($d) => (object) $d, $_POST["products"]);
            $total =  array_reduce($products, fn($acc, $item) => $acc + ($item->qty * $item->price), 0);

            $purchase = new Purchase();
            $purchase->supplier_id = $_POST['supplier_id'];
            $purchase->purchase_date = date("Y-m-d H:i:s");
            $purchase->delivery_date = date("Y-m-d", strtotime("+ 7 days"));
            $purchase->shipping_address = $_POST['shipping_address'];
            $purchase->purchase_total = $total;
            $purchase->paid_amount = 0;
            $purchase->remark = $_POST['remark'];
            $purchase->status_id = 1;
            $purchase->discount = 0;
            $purchase->vat = 0;
            $purchase->created_at = date("Y-m-d H:i:s");
            $purchase->updated_at = date("Y-m-d H:i:s");

            $purchase_id  = $purchase->save();

            foreach ($products as $key => $product) {

                $purchase_details = new PurchaseDetail();
                $price = Product::find($product->id)->price;
                $purchase_details->purchase_id = $purchase_id;
                $purchase_details->product_id = $product->id;
                $purchase_details->qty = $product->qty;
                $purchase_details->price = $price;
                $purchase_details->vat = 0;
                $purchase_details->discount = 0;
                $purchase_details->save();


                $stock = new Stock();
                $stock->product_id = $product->id;
                $stock->qty = $product->qty;
                $stock->transaction_type_id = 1;
                $stock->remark = "";
                $stock->created_at = date("Y-m-d H:i:s");
                $stock->warehouse_id = 1;
                $stock->lot_id = "LOT" . date("Y-m-d H:i:s") . $product->id;

                $stock->save();

                $db->commit();
            }
            echo  json_encode(["success" => "success"]);
        } catch (\Throwable $th) {
            $db->rollback();
            echo  json_encode(["err" => $th->getMessage()]);
        }
    }
}
