<?php

require 'config.php';

if(!empty($_GET['id']) && !empty($_GET['vote'])) {
    $id = intval($_GET['id']);
    $vote = intval($_GET['vote']);

    if ($vote >= 1 && $vote <= 5 ) {
        $sql = "INSERT INTO rating SET id_movie = :id_movie, rating = :rating";
        $sql = $conn->prepare("$sql");
        $sql->bindValue(":id_movie", $id);
        $sql->bindValue(":rating", $vote);
        $sql->execute();

        $sql = "UPDATE movies SET avarage_rating = (SELECT (SUM(rating)/COUNT(*)) FROM rating WHERE rating.id_movie = movies.id) WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        header("Location: index.php");
        exit;
    }
}
