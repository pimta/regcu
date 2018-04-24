
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
  <head>  
    <title>Enrolled Course Info</title>  
    <meta http-equiv="content-type"  
        content="text/html; charset=utf-8"/> 
    
  </head>  
  <body>  
    <br> <br>
    <table class="data-table">
    <caption class="title">  <h1>Enrolled Course Info</h1>  </caption>
    <caption> YEAR : <?php echo $YEAR;?>  SEM : <?php echo $SEM;?> </caption>
    <thead>
      
      <tr>
        <th> # </th>
        <th>COURSE ID</th>
        <th>COURSE NAME</th>
        <th>CREDITS</th>
        <th>TEACHER NAME</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $no   = 1;
      $total  = 0;
    while ($row = mysqli_fetch_array($result))
    {
      echo '<tr>
          <td>'.$no.'</td>
          <td>'.$row['cid'].'</td>
          <td>'.$row['cname'].'</td>
          <td>'.$row['credits'].'</td>
          <td>'.$row['tname'].'</td>
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


