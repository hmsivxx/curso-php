<?php
  try {
    $dns = "mysql:dbname=firstDb;host=localhost";
    $dbUser = "hms";
    $dbPassword = "password";
    $conn = new PDO($dns, $dbUser, $dbPassword);
    echo "Connected to the database<br>";
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  $pageDataCount = 20;
  $total = 0;
  $sql = "SELECT COUNT(*) as count FROM comments";
  $sql = $conn->query($sql);
  $sql = $sql->fetch();
  $total = $sql['count'];
  $pages = $total / $pageDataCount;

  $p = 1;
  $pg = 1;
  if(isset($_GET['p']) && !empty($_GET['p'])) {
    $p = addslashes($_GET['p']);
  }
  $p = ($p - 1) * 10;

  $sql = "SELECT * from comments limit {$p}, {$pageDataCount}";
  $pdo = $conn->query($sql);

  if($pdo->rowCount() > 0) {
    foreach($pdo->fetchAll() as $post) {
      echo "{$post['id']} - {$post['name']} - {$post['comment']}<br>";
    }
  }

  echo "<hr>";
  for($i = 0; $i < $pages; $i++) {
    echo "<a href='./?p=".($i+1)."'> ".($i+1)." </a>";
  }

?>
