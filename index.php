<?php
include 'includes/header.php';
if(isset($_GET['delete'])&&fetch_product($_GET['delete'])){
    delete_product($_GET['delete']);
    header('Location: index.php');
}else if(isset($_GET['id'])){
    header('Location: index.php');
}
?>
<div class="container mt-5">
    <h1 class="text-center">PRODUCTS LIST</h1>
    <div class="row">
        <a href="add_product.php" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">BARCODE</th>
                    <th scope="col">NAME</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(fetch_products() as $p):?>
                <tr>
                    <td><?= $p->id?></td>
                    <td><?= $p->barcode?></td>
                    <td><?= $p->name?></td>
                    <td><?= $p->description ?></td>
                    <td><?= $p->stock?></td>
                    <td><?= $p->price?></td>
                    <td>
                        <a href="update_product.php?id=<?= $p->id?>" class="btn btn-warning">Edit</a>
                        <a href="?delete=<?= $p->id?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php
include 'includes/footer.php';
?>