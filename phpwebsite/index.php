<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products-crud', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM prodycts ORDER BY create_date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);


?>







<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="app.cs">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">Signout</a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            
            </div>
        </div>
    </nav>
    <title>Products</title>
</head>
<body>
<h1>Products</h1>
<p>
    <a href="create.php" class="btn btn-success">Create Product</a>
</p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price/th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($products as $i => $product){?>
        <tr>
            <th scope="row"><?php echo $i +1 ?></th>
            <td>
                <img  src="<?php echo $product['image']?>" class="thumb-image">
            </td>
            <td><?php echo $product['title']?></td>
            <td><?php echo $product['price']?></td>
            <td><?php echo $product['create_date']?></td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                <form method="post" action="delete.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $product['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>



        </tr>

    <?php } ?>


    }

    </tbody>
</table>

</body>
</html>