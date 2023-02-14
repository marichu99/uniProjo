<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="advanced.css">
    <title>Document</title>
</head>
<body>
    <div class="advanced">
        <form action="search.php" method="get">
            <span>Search by produce</span>
            <input type="text" placeholder="E.g. maize" name="product">
            <span>Search by location</span>
            <input type="text" placeholder="E.g. Homa Bay..." name="location">
            <span>Quantity in Kilos</span>
            <input type="number" placeholder="E.g. 90 Kilos" name="quantity">
            <span>Minimum Price</span>
            <div class="minmax">            
            <p class="plus">+</p><input type="number" placeholder="Enter Min Price" name="minPrice"><p class="minus">-</p>
            </div>
            <span>Maximum Price</span>
            <div class="minmax">
            <p class="plus">+</p><input type="number" placeholder="Enter Max Price" name="maxPrice"><p class="minus">-</p>
            </div>
            <input type="submit" value="Apply Filters"/>
    </div>    
</body>
</html>