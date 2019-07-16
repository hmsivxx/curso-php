<div class="container">
    <div class="row mt-4">
        <div class="col-sm-4">
            <div class="carousel slide" data-ride="carousel" id="myCarousel">
                <div class="carousel-inner" role="list-box">
                    <?php foreach($images as $k => $image): ?>
                        <div class="carousel-item <?php if($k == 0){echo 'active';} ?>">
                            <img src="<?php echo BASE_URL; ?>assets/images/offers/<?php echo $image['url']; ?>" alt="Offer image" height="300">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="#myCarousel" class="left carousel-control-prev" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                <a href="#myCarousel" class="right carousel-control-next" role="button" data-slide="next"><span class="carousel-control-next-icon"></span></a>
            </div>
        </div>
        <div class="col-sm-8">
            <h1><?php echo $title ?></h1>
            <h4><?php echo $category ?></h4>
            <p><?php echo $description ?></p>
            <br><br>
            <h3>$ <?php echo number_format($price, 2); ?></h3>
            <h5>Phone: <?php echo $user['phone'] ?></h5>
        </div>
    </div>
</div>
