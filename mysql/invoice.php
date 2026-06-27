
<?php  
   $db= new mysqli("localhost", "root", "", "school");

   
   
   $id= $_GET['id'] ?? 1;
   $stmtcompany_info= $db->query("select * from company order by id limit 1");
   $company=$stmtcompany_info->fetch_object();
   
   $stmtorder= $db->query("select orders.*, customers.name, customers.email,  customers.phone , customers.road 
   , customers.districts, customers.country
   from orders 
   join customers on orders.customer_id= customers.id where orders.id=$id");
   $order= $stmtorder->fetch_object();

    print_r($order);

   $stmtorder_details= $db->query("select od.id , p.name, od.qty , od.unit_price  from order_details as od
   join products as p on p.id= od.product_id where order_id= $order->id;");

   $order_details= $stmtorder_details->fetch_all(MYSQLI_ASSOC);


  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .invoice-box{
            max-width:900px;
            margin:40px auto;
            background:#fff;
            padding:40px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
        }

        .company-logo{
            width:80px;
            height:80px;
            border-radius:50%;
            object-fit:cover;
        }

        .table th{
            background: #3e8cf1;
            color:#fff;
        }

        .invoice-footer{
            margin-top:50px;
        }

        @media print{
            body{
                background:#fff;
            }

            .invoice-box{
                box-shadow:none;
                margin:0;
                max-width:100%;
            }

            .no-print{
                display:none;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="invoice-box">

        <!-- Header -->
        <div class="row mb-4">

            <div class="col-md-6">
                <img src="https://via.placeholder.com/80"
                     alt="Logo"
                     class="company-logo mb-2">



                <h3 class="mb-1"><?php echo  $company->name ?></h3>

                <p class="mb-0">
                   <?php echo  $company->road ?><br>
                    <?php echo  "$company->district,$company->country " ?><br>
                    Phone: <?php echo  $company->phone ?><br>
                    Email: <?php echo  $company->email ?>
                </p>
            </div>

            <div class="col-md-6 text-md-end mt-4 mt-md-0">
                <h1 class="fw-bold text-primary">INVOICE</h1>

                <table class="table table-borderless">
                    <tr>
                        <th>Invoice No:</th>
                        <td>INV-2026-00125</td>
                    </tr>

                    <tr>
                        <th>Invoice Date:</th>
                        <td>21 June 2026</td>
                    </tr>

                    <tr>
                        <th>Due Date:</th>
                        <td>28 June 2026</td>
                    </tr>
                </table>
            </div>

        </div>

        <!-- Customer -->
        <div class="row mb-4">

            <div class="col-md-6">
                <h5 class="border-bottom pb-2">Bill To</h5>

                <p>
                    <strong><?php echo  $order->name ?></strong><br>
                    <?php echo  $order->email ?><br>
                    <?php echo  $order->road ?><br>
                    <?php echo  $order->districts.",".$order->country ?><br>
                    Phone: <?php echo  $order->phone ?>
                </p>
            </div>

            <div class="col-md-6">
                <h5 class="border-bottom pb-2">Payment Information</h5>

                <p>
                    <strong>Payment Method:</strong> Bank Transfer<br>
                    <strong>Bank:</strong> Dutch-Bangla Bank PLC<br>
                    <strong>Account Name:</strong> ABC Technologies Ltd.<br>
                    <strong>Account No:</strong> 1234567890
                </p>
            </div>

        </div>

        <!-- Items -->
        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Items</th>
                        <th width="100">Qty</th>
                        <th width="120">Unit Price</th>
                        <th width="120">Total</th>
                    </tr>
                </thead>

                <tbody>

                   <?php  
                       $subtotal= 0;
                     foreach($order_details as $key=> $order_item){
                         $key++;
                         $total = $order_item['unit_price'] * $order_item['qty'];
                         $subtotal+=     $total;
                        echo "
                        
                          <tr>
                            <td>{$key}</td>
                            <td>{$order_item['name']}</td>
                            <td>{$order_item['qty']}</td>
                            <td>$ {$order_item['unit_price']}</td>
                            <td>$ {$total}</td>
                         </tr>
                        
                        
                        
                        ";
                     }
                   
                   
                   ?>

                    

                    

                </tbody>

            </table>

        </div>

        <!-- Totals -->
        <div class="row justify-content-end">

            <div class="col-md-5">

                <table class="table">

                    <tr>
                        <th>Subtotal</th>
                        <td class="text-end">$ <?php echo $subtotal  ?></td>
                    </tr>

                    <tr>
                        <th>VAT (5%)</th>
                        <td class="text-end">$47.00</td>
                    </tr>

                    <tr>
                        <th>Discount</th>
                        <td class="text-end">$ <?= $order->discount ?></td>
                    </tr>

                    <tr class="table-dark">
                        <th>Grand Total</th>
                        <th class="text-end">$<?= $order->grand_total ?></th>
                    </tr>

                </table>

            </div>

        </div>

        <!-- Notes -->
        <div class="mt-4">
            <h5>Notes</h5>

            <p class="text-muted">
                Thank you for your business.
                Please complete payment within the due date.
                For any questions regarding this invoice,
                contact us at info@abctech.com.
            </p>
        </div>

        <!-- Signature -->
        <div class="row invoice-footer">

            <div class="col-md-6">
                <p>
                    <strong>Authorized Signature</strong>
                </p>

                <br><br>

                ______________________
            </div>

            <div class="col-md-6 text-md-end">
                <p>
                    <strong>Customer Signature</strong>
                </p>

                <br><br>

                ______________________
            </div>

        </div>

        <!-- Print -->
        <div class="text-center mt-5 no-print">
            <button class="btn btn-primary" onclick="window.print()">
                Print Invoice
            </button>
        </div>

    </div>

</div>

</body>
</html>