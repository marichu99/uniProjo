

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
                        <label>Enter Your Name</label>
                        <input type="text" placeholder="E.g. Names..." name="prodName"/>
                    </div>
                    <div class="user">
                        <label>Enter Your Email</label>
                        <input type="email" placeholder="Please type in a your Email" name="prodDescription"/>
                    </div>
                    <div class="user">
                        <label>Message Subject:</label>
                        <input type="text" placeholder="Please type in the subject" name="prodDescription"/>
                    </div>
                    <div class="user">
                        <label>Message:</label>
                        <input type="textarea" placeholder="Please type in the message" name="prodDescription" class="message"/>
                    </div>
                    
            </div>
            <input type="submit" value="Submit" class="submit">
        </form>
        <div class="payDeets">

        </div>
    </div>
    
</body>
</html>