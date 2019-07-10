<?php
require 'pages/header.php';
require 'classes/Offer.class.php';

if(empty($_SESSION['clogin'])): ?>
    <script type="text/javascript">window.location.href="login.php"</script>
<?php endif; exit; ?>


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
        <?php

        $off = new Offer();
        $offers = $off->getMyOffers();

        foreach($offers as $offer):
            if(!$offer['url']){
                $imgTemp = "no-image-icon.png";
            } else {
                $imgTemp = $offer['url'];
            }
        ?>
        <tr>
            <td><img src="assets/images/offers/<?php echo $imgTemp; ?>" height="50"></td>
            <td><?php echo $offer['title']; ?></td>
            <td>$ <?php echo number_format($offer['price'], 2); ?></td>
            <td>
                <a href="edit-offer.php?id=<?php echo $offer['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="delete-offer.php?id=<?php echo $offer['id'] ?>" class="btn btn-danger">Deletee</a>
            </td>
        </tr>
        <?php
        endforeach;

        ?>

    </table>
</div>

<?php require 'pages/footer.php'; ?>
