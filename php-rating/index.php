<?php

require 'config.php';

$sql = "SELECT * FROM movies";
$sql = $conn->query($sql);

if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $movie):
        ?>
        <fieldset>
            <strong><?php echo $movie['title']; ?></strong><br>
            <a href="vote.php?id=<?php echo $movie['id'] ?>&vote=1"><img src="star.png" alt="star" width="20"></a>
            <a href="vote.php?id=<?php echo $movie['id'] ?>&vote=2"><img src="star.png" alt="star" width="20"></a>
            <a href="vote.php?id=<?php echo $movie['id'] ?>&vote=3"><img src="star.png" alt="star" width="20"></a>
            <a href="vote.php?id=<?php echo $movie['id'] ?>&vote=4"><img src="star.png" alt="star" width="20"></a>
            <a href="vote.php?id=<?php echo $movie['id'] ?>&vote=5"><img src="star.png" alt="star" width="20"></a>

            ( <?php echo number_format($movie['avarage_rating'], 1); ?> )
        </fieldset>
        <?php
    endforeach;

}
