<h3 class="text-center text-muted">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead>

    <?php 
        $get_orders="select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        echo "
        <tr class='text-center'>
            <th class='bg-info'>SI No</th>
            <th class='bg-info'>Due Amount</th>
            <th class='bg-info'>Invoice Number</th>
            <th class='bg-info'>Total Products</th>
            <th class='bg-info'>Order Date</th>
            <th class='bg-info'>Order Status</th>
            <th class='bg-info'>Delete</th>
        </tr>
    </thead>
    <tbody>
        
        ";
        if ($row_count==0) {
            echo "<h2 class='bg-danger text-center mt-5'>No Orders Yet</h2>";
        }else{
            $number=0;
            while ($row_data=mysqli_fetch_assoc($result)) {
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount_due=$row_data['amount_due'];
                $invoice_number=$row_data['invoice_number'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;
                echo "

                <tr class='text-center'>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href=''class='text-success'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
                
                ";

            }
        }
    ?>

    </tbody>
</table>