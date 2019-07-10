<?php

    class User extends Model
    {
        public function getTotalUsers()
        {

            $sql = $this->conn->query("SELECT COUNT(*) as count FROM users");
            $sql->execute();
            $row = $sql->fetch();

            return $row['count'];
        }

        public function getUser($id)
        {

            $sql = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $result = $sql->fetch();
                return $result;
            } else {
                return false;
            }
        }

        public function add($name, $email, $password, $phone)
        {

            $sql = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if ($sql->rowCount() == 0) {
                $sql = $this->conn->prepare("INSERT INTO users SET name = :name, email = :email, password= :password, phone = :phone");
                $sql->bindValue(":name", $name);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":password", md5($password));
                $sql->bindValue(":phone", $phone);
                $sql->execute();

                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password)
        {

            $sql = $this->conn->prepare("SELECT * FROM users WHERE email = :email && password = :password");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":password", md5($password));
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $_SESSION['clogin'] = $data['id'];
                return true;
            } else {
                return false;
            }

         }
    }


 ?>
