<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Delete Order</h1>
        <br><br>


        <?php 
        

        if(isset($_GET['id']))
        {
            //GEt the Order Details
            $id=$_GET['id'];

            //Get all other details based on this id
            //SQL Query to get the order details
            $sql = "SELECT * FROM tbl_order WHERE id=$id";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //Detail Availble
                $row=mysqli_fetch_assoc($res);

                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address= $row['customer_address'];
               $sql="DELETE FROM tbl_order WHERE id=$id";
               $res = mysqli_query($conn, $sql);

            }
            else
            {
                //DEtail not Available/
                //Redirect to Manage Order
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        }
        else
        {
            //REdirect to Manage ORder PAge
            header('location:'.SITEURL.'admin/manage-order.php');
        }

        ?>           

<?php include('partials/footer.php'); ?>
