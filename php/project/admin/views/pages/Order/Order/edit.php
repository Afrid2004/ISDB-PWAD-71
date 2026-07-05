<?php
echo Page::title(["title"=>"Edit Order"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"order", "text"=>"Manage Order"]);
echo Page::context_open();
echo Form::open(["route"=>"order/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$order->id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$order->customer_id"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status","value"=>"$order->status"]);
	echo Form::input(["label"=>"Grand Total","type"=>"text","name"=>"grand_total","value"=>"$order->grand_total"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$order->discount"]);
	echo Form::input(["label"=>"Vat","type"=>"text","name"=>"vat","value"=>"$order->vat"]);
	echo Form::input(["label"=>"Order Date","type"=>"date","name"=>"order_date","value"=>"$order->order_date"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
