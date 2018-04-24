
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
  <head>  
    <title>Withdraw Course</title>  
    <meta http-equiv="content-type"  
        content="text/html; charset=utf-8"/> 
    <link rel="stylesheet" href="tablestyle.css">
  </head>  
  <body>  
    <br> <br>
    <table class="data-table">
    <caption class="title">  <h1>Withdraw Course</h1>  </caption>
    <caption> Select course for withdraw </caption>
    <thead>
      
      <tr>
        <th> # </th>
        <th>COURSE ID</th>
        <th>COURSE NAME</th>
        <th>SECTION</th>
        <th>CREDITS</th>
        <th>WITHDRAW</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $no   = 1;
      $total  = 0;
    while ($row = mysqli_fetch_array($result))
    {
      $cid = $row['cid'];
      $sec = $row['sec_id'];
      echo '<tr>
          <td>'.$no.'</td>
          <td>'.$cid.'</td>
          <td>'.$row['cname'].'</td>
          <td>'.$sec.'</td>
          <td>'.$row['credits'].'</td>
          <td> <a href="WithdrawCourse.php?cid='.$cid.'&sec='.$sec.'"> withdraw</a></td>
        </tr>';
      $no++;
    }?>
    </tbody>
    <tfoot>
      <tr/>
    </tfoot> 
  </table>
  <br><br>
 
  </body>  
</html>


