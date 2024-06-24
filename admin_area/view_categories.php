<h3 class="text-center text-muted">
    All Categories
</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th class="bg-info">SI no</th>
            <th class="bg-info">Category Title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
            
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_cat="select * from `categories`";
            $result_cat=mysqli_query($con,$select_cat);
            $number=0;

            while ($row=mysqli_fetch_assoc($result_cat)) {
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $number++;
         ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $category_title; ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-success'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo $category_id; ?>' class='text-success'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        
        <?php 
        }
        ?>
    </tbody>
</table>