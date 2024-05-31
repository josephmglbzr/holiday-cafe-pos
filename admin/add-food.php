<?php include('../config/constant.php'); ?>


<head>
    <link rel="stylesheet" href="../CSS/add-food.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
    

<body>
<div class="main-content">
   
   <div class="wrapper">

       
       <form action="" method="POST" enctype="multipart/form-data">

               <div class="wrapper-con">
                   <label for="product-name">Product Name</label>
                   
                   <input type="text" name="product_name" placeholder="Title of the food" class="full-s">
               </div>
               
               <label for="product-code">Generate Code</label>
               <div class="generate-con">
                   <input type="text" name="product_code" id="randomStringInput" required readonly>
                   <button onclick="generateRandomString()"><img src="../icon/refresh.png" alt=""></button>
               </div>  
      
               <div class="wrapper-con">
                   <label for="product-price">Price: </label>
                   <input type="number" name="product_price" min="1" class="full-s" value="₱">
               </div>

               <div class="wrapper-con">
                   <label for="product-image">Select Image: </label>
                   <input type="file" name="image">
               </div>
               
               <div class="wrapper-con">
                   <label for="product-image">Category </label>
                   <div class="prod-category">
                       <select name="product_category" >
                           <option value="Hot Coffees">Hot Coffees</option>
                           <option value="Cold Coffees">Cold Coffees</option>
                           <option value="Hot Tea">Hot Tea</option>
                           <option value="Cold Tea">Cold Tea</option>
                           <option value="Hot Beverages">Hot Beverages</option>
                           <option value="Iced Beverages">Iced Beverages</option>
                           <option value="Cake">Cake</option>
                           <option value="Pasta">Pasta</option>
                           <option value="Seasonal Food">Seasonal Food</option>
                           <option value="Seasonal Drinks">Seasonal Drinks</option>
                           <option value="Souvenirs & Decorations">Souvenirs & Decorations</option>
                       </select>
                   </div>
       
               </div>

               <div class="wrapper-con">
                   <label for="Size">Size </label>
                  
                   <select name="product_size">
                       <option value="Medium">Medium</option>
                       <option value="Large">Large</option>
                   </select>
               </div>

               <div class="wrapper-con">
                   <label for="product-image">Seasonal </label>
                   <div class="seasonal-con">
                       <input type="radio" name="seasonal" value="Yes"> Yes
                       <input type="radio" name="seasonal" value="No"> No
                   </div>
               </div>

               <div class="wrapper-con">
                   <label for="product-description">Product Description</label>
                   <div class="text-area">
                       <textarea name="description" id="" cols="30" rows="5" placeholder="Food description." class="full-s"></textarea>
                   </div>
                
               </div>

               <div class="submit-btn">
                   <input type="submit" name="submit" value="Add" class="btn-secondary"> 

               </div>

           </table>

       </form>
<?php
    if(isset($_POST['submit']))
    {
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $product_price = $_POST['product_price'];
        $product_code = $_POST['product_code'];
        $product_category = $_POST['product_category'];
        $product_seasonal = $_POST['seasonal'];
        $product_size = $_POST['product_size'];
    
        //upload the image if selected
        //check whether the select image is clicked or not
        if(isset($_FILES['image']['name']))
        {
            //get the details of selected iamge
            $image_name = $_FILES['image']['name'];
            
            //check whether the image is selected
            if($image_name!="")
            {
                // Execute if image is not invalid or image is selected
                $ext = explode('.', $image_name);//get the extension of the image such jpg, img, png

                //create new name for image
                $image_name = "Food-Name-".rand(0000, 9999).".".end($ext);
                //uplaod the image
                //get the src path and destination path

                //src path is the current location of the image
                $src = $_FILES['image']['tmp_name'];

                //destination path for the image where it to be uploaded
                $dst = "../img/product-food-beverages/".$image_name;

                //upload the food image
                $upload = move_uploaded_file($src, $dst); 

                //check whether the image is uploaded or not
                if($upload==false){

                    //if false then redirect to the add page with error
                    $_SESSION['upload'] = "Failed to upload";
                    header('location:'.SITENEW.'admin/add-food.php');
                    //stop the process
                    die();
                }
            }
        }
        else
        {
            $image_name = "";
        }

            //INSERT INTO DATABASE

        //Create a sql query
        // for numerical value we don't need to put single quotation inside of it.
        $sql2 = "INSERT INTO tbl_food_beverages SET
        name='$product_name',
        prod_description='$description',
        price=$product_price,
        image='$image_name',
        prod_category='$product_category',
        code='$product_code',
        prod_seasonal='$product_seasonal',
        size='$product_size'";

        //execute query
        $res2 = mysqli_query($conn, $sql2);
        
        //check whether data inserted or not
        //redirect to the manage food with message
        if($res2 == true)
        {
            $_SESSION['add'] = "Food Added Successfully";
            header('location:'.SITENEW.'admin/manage-food.php');

        }
        else
        {
            $_SESSION['add'] = "Failed to Add Food";
            header('location:'.SITENEW.'admin/manage-food.php');
        }
}
?>



   </div>
</div>
<script src="../JS/generate.js"></script>
</body>
