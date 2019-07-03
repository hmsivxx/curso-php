<?php
  try {
    $dbName = "firstDb";
    $dbHost = "localhost";
    $dbUser = "hms";
    $dbPassword = "password";

    $configPDO = "mysql:dbname={$dbName};host={$dbHost}";

    $conn = new PDO($configPDO, $dbUser, $dbPassword);

    echo "Connected successfully to the database";

  } catch (PDOException $err){
    echo "Error: " . $err->getMessage();
  }
  if(isset($_GET['sort']) && !empty($_GET['sort'])) {
    $sort = addslashes($_GET['sort']);
    $sql = "SELECT * FROM students ORDER BY {$sort}";
  } else {
    $sql = "SELECT * FROM students";
    $sort = "";
  }

 ?>
 <form method="GET">
   <select name="sort" onchange="this.form.submit()">
     <option></option>
     <option value="name" <?php echo ($sort=="name")?'selected="selected"':''; ?>>By name</option>
     <option value="years_old" <?php echo ($sort=="years_old")?'selected="selected"':''; ?>>By years Old</option>
   </select>
 </form>
 <table border="1" width="400">
   <tr>
     <th>Name</th>
     <th>Years Old</th>
   </tr>
   <?php

    $sql = $conn->query($sql);

    if($sql->rowCount() > 0) {
      foreach($sql->fetchAll() as $student){
        ?>
          <tr>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['years_old']; ?></td>
          </tr>
        <?php

      }
    }

    ?>
 </table>
