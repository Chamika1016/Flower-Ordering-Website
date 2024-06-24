<h3 class="text-center text-muted">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead>

    <?php 
        $get_payments="select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);

        if ($row_count==0) {
            echo "<h2 class='bg-danger text-center mt-5'>No Payments Recieved Yet</h2>";
        }else{
            echo "
            <tr class='text-center'>
                <th class='bg-info'>SI No</th>
                <th class='bg-info'>Invoice Number</th>
                <th class='bg-info'>Amount</th>
                <th class='bg-info'>Payment Mode</th>
                <th class='bg-info'>Order Date</th>
                <th class='bg-info'>Delete</th>
            </tr>
        </thead>
        <tbody>
            
            ";
            $number=0;
            while ($row_data=mysqli_fetch_assoc($result)) {
                $payment_id=$row_data['payment_id'];
                $order_id=$row_data['order_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;
                echo "

                <tr class='text-center'>
                <td>$number</td>
                <td> $invoice_number</td>
                <td>$amount</td>
                <td> $payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_orders=<?php echo $order_id; ?>'class='text-success'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
                
                ";

            }
        }
    ?>

    </tbody>
</table>