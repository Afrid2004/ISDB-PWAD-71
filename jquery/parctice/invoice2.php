<?php
$db = new mysqli("localhost", "root", "", "test");
$customer = $db->query("select * from core_customers");
$products = $db->query("select * from core_products");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .invoice-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .header span {
            font-size: 40px;
            font-weight: bold;
        }

        .details {
            display: flex;
            justify-content: space-between;
        }

        .details,
        .payment-info {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .details div,
        .payment-info div {
            margin-bottom: 5px;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f5f5f5;
            font-weight: bold;
        }

        .total-row {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
        input{
            max-width: 60px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="header">
            <span>&</span> INVOICE
        </div>
        <div class="details">
            <div>
                <div><strong>Billed To:</strong>

                    <div> 
                        <select name="custormer" id="custormer">
                            <option value="">select customer</option>
                            <?php
                            while ($row = $customer->fetch_object()) {
                                echo "<option value='$row->id'>$row->name</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div id="address">

                </div>
            </div>
            <div>
                <div><strong>Invoice No:</strong> 12345</div>
                <div><strong>Date:</strong> 16 June 2025</div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>
                     Item
                    </th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
                <tr>
                    <th>
                    <select name="product" id="product">
                            <option value="">select product</option>
                            <?php
                            while ($row = $products->fetch_object()) {
                                echo "<option value='$row->id'>$row->name</option>";
                            }
                            ?>
                        </select>
                    </th>
                    <th><input type="text" id="price"></th>
                    <th><input type="text" id="qty"> </th>
                    <th><input type="text" id="total"></th>
                    <th><Button id="add">&#43;</Button></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Eggshell Camisole Top</td>
                    <td>1</td>
                    <td>$123</td>
                    <td>$123</td>
                </tr>
               
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Subtotal</td>
                    <td>$500</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3">Total</td>
                    <td>$500</td>
                </tr>
            </tfoot>
        </table>
        <div class="footer">
            <p>Thank you!</p>
            <div class="payment-info">
                <div><strong>Payment Information</strong></div>
                <div>Bank: Briard Bank</div>
                <div>Account Name: Samira Hadid</div>
                <div>Account No: 123-456-7890</div>
                <div>Pay By: 31 July 2025</div>
                <div>123 Anywhere St., Any City, ST 12345</div>
            </div>
        </div>
    </div>

    <script>
        $(function() {

            $("#custormer").on("change", function() {
                let id = $(this).val();
                //   alert(id) 
                $.ajax({
                    url: "data.php",
                    type: "get",
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // console.log(res);
                        let data= JSON.parse(res)
                        console.log(data);
                        $html = `
                        <div>${data.mobile}</div>
                        <div>${data.email},</div>
                        <div>${data.address}</div>
                        `;
                         $("#address").append($html)
                    },
                    error: function(res) {
                        log
                    }
                })

              
                
               

            });

            $("#product").on("change", function() {
                let id = $(this).val();
                //   alert(id) 
                $.ajax({
                    url: "product.php",
                    type: "get",
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // console.log(res);
                        let data= JSON.parse(res)
                        console.log(data);
                       
                         $("#price").val(data.offer_price)
                    },
                    error: function(res) {
                        log
                    }
                })

              
                
               

            });

            $("#custormer").select2(); // Initialize Select2 on the element
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>