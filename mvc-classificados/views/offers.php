<?php if(empty($_SESSION['clogin'])): ?>
    <script type="text/javascript">window.location.href="<?php echo BASE_URL; ?>"</script>
<?php endif; ?>



<div class="container">
    <h1 class="mt-3">My Offers:</h1>
    <a href="add-offer.php" class="btn btn-primary mt-2 mb-2">Add Offer</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach($id as $k => $item): ?>
        <tr>
            <td><img src="<?php echo BASE_URL; ?>assets/images/offers/<?php echo $url[$k]; ?>" height="50"></td>
            <td><?php echo $title[$k]; ?></td>
            <td>$ <?php echo number_format($price[$k], 2); ?></td>
            <td>
                <a href="edit-offer.php?id=<?php echo $id[$k] ?>" class="btn btn-primary">Edit</a>
                <a href="delete-offer.php?id=<?php echo $id[$k] ?>" class="btn btn-danger">Deletee</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

http://localhost/curso-php/mvc-classificados/assets/images/offers/