<?php
    require 'pages/header.php';
    require 'classes/User.class.php';
    require 'classes/Offer.class.php';

    $off = new Offer();
    $usr = new User();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = addslashes($_GET['id']);
    } else {
        ?>
        <script type="text/javascript">window.location.href="index.php";</script>
        <?php
    }

    $info = $off->getOffer($id);
    $userInfo = $usr->getUser((int)$info['id_user']);
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-4">
            <div class="carousel slide" data-ride="carousel" id="myCarousel">
                <div class="carousel-inner" role="list-box">
                    <?php foreach($info['images'] as $k => $image): ?>
                        <div class="carousel-item <?php if($k == 0){echo 'active';} ?>">
                            <img src="assets/images/offers/<?php echo $image['url']; ?>" alt="Offer image">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="#myCarousel" class="left carousel-control-prev" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                <a href="#myCarousel" class="right carousel-control-next" role="button" data-slide="next"><span class="carousel-control-next-icon"></span></a>
            </div>
        </div>
        <div class="col-sm-8">
            <h1><?php echo $info['title'] ?></h1>
            <h4><?php echo $info['category'] ?></h4>
            <p><?php echo $info['description'] ?></p>
            <br><br>
            <h3>$ <?php echo number_format($info['price'], 2); ?></h3>
            <h5>Phone: <?php echo $userInfo['phone'] ?></h5>
        </div>
    </div>
</div>


<?php require 'pages/footer.php' ?>
