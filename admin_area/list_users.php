<h3 class="text-center text-muted">All Users</h3>
<table class="table table-bordered mt-5">
    <thead>

    <?php 
        $get_users="select * from `user_table`";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);

        if ($row_count==0) {
            echo "<h2 class='bg-danger text-center mt-5'>No Users Yet</h2>";
        }else{
            echo "
            <tr class='text-center'>
                <th class='bg-info'>SI No</th>
                <th class='bg-info'>Username</th>
                <th class='bg-info'>User Email</th>
                <th class='bg-info'>User Image</th>
                <th class='bg-info'>User Address</th>
                <th class='bg-info'>User Mobile</th>
                <th class='bg-info'>Delete</th>
            </tr>
        </thead>
        <tbody>
            
            ";
            $number=0;
            while ($row_data=mysqli_fetch_assoc($result)) {
                $user_name=$row_data['user_name'];
                $user_id=$row_data['user_id'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
                echo "

                <tr class='text-center'>
                <td>$number</td>
                <td> $user_name</td>
                <td>$user_email</td>
                <td><img src='../users_area/user_images/$user_image' alt='$user_name' class='product_image'></td>
                <td> $user_address</td>
                <td> $user_mobile</td>
                <td><a href=''class='text-success'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
                
                ";

            }
        }
    ?>

    </tbody>
</table>



































