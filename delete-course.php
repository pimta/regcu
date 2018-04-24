<?php

/**
 * Delete a user
 */

/* Escape HTML for output*/
function escape($html){
  return htmlspectialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
require "config.php";

if (isset($_GET["cid"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $cid = $_GET["cid"];

    $sql = "DELETE FROM course WHERE cid = :cid";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':cid', $cid);
    $statement->execute();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM course";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<!-- <?php require "templates/header.php"; ?>
 -->        
<h2>Delete Courses</h2>

<table>
  <thead>
    <tr>
      <th>Course ID</th>
      <th>Course Name</th>
      <th>Credits</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["cid"]); ?></td>
      <td><?php echo escape($row["cname"]); ?></td>
      <td><?php echo escape($row["credits"]); ?></td>
      <td><a href="delete-course.php?cid=<?php echo escape($row["cid"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="managecourse.php">Back to manage course</a>

<?php require "templates/footer.php"; ?>