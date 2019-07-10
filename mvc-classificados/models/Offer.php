<?php

    class Offer extends Model
    {
        public function getTotalOffers($filters)
        {

            $filterString = array('1=1');
            if (!empty($filters['category'])) {
                $filterString[] = 'offers.id_category = :id_category';
            }
            if (!empty($filters['price'])) {
                $filterString[] = 'offers.price BETWEEN :price1 AND :price2';
            }
            if (!empty($filters['condition'])) {
                $filterString[] = 'offers.prod_cond = :condition';
            }
            $sql = $this->conn->prepare("SELECT COUNT(*) as count FROM offers WHERE ".implode(' AND ', $filterString));
            if (!empty($filters['category'])) {
                $sql->bindValue(':id_category', $filters['category']);
            }
            if (!empty($filters['price'])) {
                $price = explode('-', $filters['price']);
                $sql->bindValue(':price1', $price[0]);
                $sql->bindValue(':price2', $price[1]);
            }
            if (!empty($filters['condition'])) {
                $sql->bindValue(':condition', $filters['condition']);
            }
            $sql->execute();

            $row = $sql->fetch();

            return $row['count'];
        }

        public function getMyOffers()
        {

            $array = [];
            $sql = $this->conn->prepare("SELECT *,
                ( select images_offers.url from images_offers where images_offers.id_offer = offers.id limit 1 )
                as url FROM offers WHERE id_user = :id_user");
            $sql->bindValue(":id_user", $_SESSION['clogin']);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }

            return $array;
        }

        public function getlastOffers($page, $perPage, $filters)
        {

            $offset = ($page - 1) * $perPage;
            $array = [];

            $filterString = array('1=1');
            if (!empty($filters['category'])) {
                $filterString[] = 'offers.id_category = :id_category';
            }
            if (!empty($filters['price'])) {
                $filterString[] = 'offers.price BETWEEN :price1 AND :price2';
            }
            if (!empty($filters['condition'])) {
                $filterString[] = 'offers.prod_cond = :condition';
            }
            $sql = $this->conn->prepare("SELECT *,
                (select images_offers.url from images_offers where images_offers.id_offer = offers.id limit 1)
                as url,
                (select categories.name from categories where categories.id = offers.id_category)
                as category
                 FROM offers WHERE ".implode(' AND ', $filterString)." ORDER BY id DESC limit {$offset}, $perPage");
            if (!empty($filters['category'])) {
                $sql->bindValue(':id_category', $filters['category']);
            }
            if (!empty($filters['price'])) {
                $price = explode('-', $filters['price']);
                $sql->bindValue(':price1', $price[0]);
                $sql->bindValue(':price2', $price[1]);
            }
            if (!empty($filters['condition'])) {
                $sql->bindValue(':condition', $filters['condition']);
            }

            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }

            return $array;
        }

        public function addNewOffer($title, $category, $price, $description, $condition)
        {


            $sql = $this->conn->prepare("INSERT INTO offers SET id_user = :id_user, title = :title, id_category = :id_category, price = :price, description = :description, prod_cond = :condition");
            $sql->bindValue(":title", $title);
            $sql->bindValue(":id_category", (int)$category);
            $sql->bindValue(":id_user", (int)$_SESSION['clogin']);
            $sql->bindValue(":price", (float)$price);
            $sql->bindValue(":description", $description);
            $sql->bindValue(":condition", (int)$condition);

            if($sql->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteOffer($id)
        {

            $sql = $this->conn->prepare("DELETE FROM images_offers WHERE id_offer = :id_offer");
            $sql->bindValue(":id_offer", $id);
            $sql->execute();

            $sql = $this->conn->prepare("DELETE FROM offers WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
        }

        public function editOffer($title, $category, $price, $description, $condition, $images, $id)
        {

            $sql = $this->conn->prepare("UPDATE offers SET id_user = :id_user, title = :title, id_category = :id_category, price = :price, description = :description, prod_cond = :condition WHERE id = :id");
            $sql->bindValue(":title", $title);
            $sql->bindValue(":id_category", (int)$category);
            $sql->bindValue(":id_user", (int)$_SESSION['clogin']);
            $sql->bindValue(":price", (float)$price);
            $sql->bindValue(":description", $description);
            $sql->bindValue(":condition", (int)$condition);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if (count($images) > 0) {
                $imgCount = count($images['tmp_name']);
                for ($i = 0; $i < $imgCount; $i++) {
                    $type = @$images['type'][$i];
                    if (in_array($type, ['image/jpeg', 'image/png'])) {
                        $tempName = md5(time().rand(0,9999)).'jpg';
                        move_uploaded_file($images['tmp_name'][$i], 'assets/images/offers/'.$tempName);

                        list($originalWidth, $originalHeight) = getimagesize('assets/images/offers/'.$tempName);
                        $ratio = $originalWidth/$originalHeight;

                        $width = 500;
                        $height = 500;

                        if ($width/$height > $ratio) {
                            $width = $height * $ratio;
                        } else {
                            $height = $width/$ratio;
                        }

                        $img = imagecreatetruecolor($width, $height);
                        if ($type == 'image/jpeg') {
                            $newImage = imagecreatefromjpeg('assets/images/offers/'.$tempName);
                        } else {
                            $newImage = imagecreatefrompng('assets/images/offers/'.$tempName);
                        }

                        imagecopyresampled($img, $newImage, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

                        imagejpeg($img, 'assets/images/offers/'.$tempName, 80);

                        $sql = $this->conn->prepare("INSERT INTO images_offers SET id_offer = :id_offer, url = :url");
                        $sql->bindValue(":id_offer", $id);
                        $sql->bindValue(":url", $tempName);
                        $sql->execute();
                    }
                }
            }
        }

        public function getOffer($id)
        {

            $sql = $this->conn->prepare("SELECT *,
                    (select categories.name from categories where categories.id = offers.id_category) as category
                    FROM offers WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $offer = $sql->fetch();
                $offer['images'] = [];

                $sql = $this->conn->prepare("SELECT id, url FROM images_offers WHERE id_offer = :id_offer");
                $sql->bindValue(":id_offer", $id);
                $sql->execute();

                if ($sql->rowCount() > 0) {
                    $offer['images'] = $sql->fetchAll();
                }
                return $offer;
            } else {
                return false;
            }
        }
    }
