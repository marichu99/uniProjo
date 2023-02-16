

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sell.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <form method="post" action="products.php">
            <div class="row">
                <div class="col">
                    <h3 class="title">Product Details</h3>
                    <div class="user">
                        <label>Product Name</label>
                        <input type="text" placeholder="E.g. Names..." name="prodName"/>
                    </div>
                    <div class="user">
                        <label>Product Description:</label>
                        <input type="text-area" placeholder="Please type in a description" name="prodDescription"/>
                    </div>
                    <div class="user">
                        <label>Select Image:</label>
                        <input type="file" accept="Image/*" onchange="readURL(this)" value="Select an Image" name="prodImg"/>
                    </div>
                    <div class="user">
                        <label>Product Price:</label>
                        <input type="number" placeholder="Enter Price per product" name="prodPrice"/>
                    </div>
                    <div class="flex">
                        <div class="user">
                            <label>Country:</label>
                            <input type="text" placeholder="Kenya" name="prodCountry"/>
                        </div>
                        <div class="user">
                            <label>Product Location:</label>
                            <input type="text" placeholder="E.g. New York" name="prodLocation"/>
                        </div>
                        <div class="user">
                            <label>Product Quantity:</label>
                            <input type="number" placeholder="E.g. 20..." name="prodQuantity"/>
                        </div>
                        
            </div>
            <input type="submit" value="Submit" class="submit">
        </form>
        <div class="payDeets">

        </div>
    </div>
    
</body>
</html>