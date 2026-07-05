<?php
echo Page::title(["title"=>"Create Order"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"order", "text"=>"Manage Order"]);
echo Page::context_open();
echo Form::open(["route"=>"order/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status"]);
	echo Form::input(["label"=>"Grand Total","type"=>"text","name"=>"grand_total"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount"]);
	echo Form::input(["label"=>"Vat","type"=>"text","name"=>"vat"]);
	echo Form::input(["label"=>"Order Date","type"=>"date","name"=>"order_date"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
