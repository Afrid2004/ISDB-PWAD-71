<?php
$db = new mysqli("localhost", "root", "", "test");
$tx = "core_";
$divisions = $db->query("select * from {$tx}divisions");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="">
        <select name="division" id="division">
            <option value="">Select Division</option>
            <?php
            while ($row = $divisions->fetch_object()) {
                echo " <option value='$row->id'>$row->name</option>";
            }
            ?>
        </select>

        <select name="" id="district">
            <option value="">Select district</option>
        </select>
    </div>
    <table>

        <thead>
            <tr>
            <th>id</th>
            <th>Division</th>
            <th>District</th>
            </tr>
        </thead>
        <tbody id="dataTable">
        
        </tbody>
    </table>
    <button class="btn">submit</button>
    <button class="send">Send</button>
    </div>

    <script>
        $(function() {

            $("#division").on("change", function() {
                let division_id = $(this).val();
                //alert(divisiont_id)

                $.ajax({
                    url: "district.php",
                    type: "get",
                    data: {
                        aslam: division_id,
                        akader: 10
                    },
                    success: function(response) {
                        //console.log(response);
                        let district = JSON.parse(response);
                        //  console.log(district); 
                        let html = `<option value="">Select district</option>`;
                        district.forEach(element => {
                            html += `<option value="${element.id}">${element.name}</option>`;
                        });
                        $("#district").html(html)
                    },
                    error: function(error) {
                        console.log(error);

                    }
                })


            })

            var count=0;
            $(".btn").on("click", function() {
                let division_id = $("#division").find("option:selected").val();
                let division_name = $("#division").find("option:selected").text();
                let district_id = $("#district").find("option:selected").val();
                let district_name = $("#district").find("option:selected").text();
                count++;
                let html=`
                 <tr>
                   <td>${count}</td>
                 <td data-id=${division_id}>${division_name}</td>
                 <td data-id=${district_id}>${district_name}</td> 
                 
                 </tr>
                `;

                $("tbody").append(html); 
            })

    $(".send").click(function () {
        let tableData = []; // Array to store row data
        
        // Iterate over each row in the table
        $("#dataTable tr").each(function () {
            let row = $(this); // Current row
            
            // Get data from the current row
            let rowData = {
                count: row.find('td:eq(0)').text(), // Get the first cell's text
                division_id: row.find('td:eq(1)').data('id'), // Get data-id of the second cell
                division_name: row.find('td:eq(1)').text(), // Get the text of the second cell
                district_id: row.find('td:eq(2)').data('id'), // Get data-id of the third cell
                district_name: row.find('td:eq(2)').text() // Get the text of the third cell
            };
            
            tableData.push(rowData); // Add the row data to the array
        });

        //console.log( tableData);
        
        $.ajax({
            url: 'data2.php',
            type: 'POST',
            data: { tableData: tableData },
            success: function (response) {
                console.log("Data sent successfully:", response);
            },
            error: function (xhr, status, error) {
                console.error("Error sending data:", error);
            }
        });
    });

            $("select").select2();

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>