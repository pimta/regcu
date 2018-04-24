
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
  <head>  
    <title>Serach Result</title>  
    <meta http-equiv="content-type"  
        content="text/html; charset=utf-8"/> 
    
  </head>  
  <body>  
  
    <table class="data-table">
    <caption class="title">  <h1>Search Result</h1>  </caption>
    <thead>
      
      <tr>
        <th> # </th>
        <th>COURSE ID</th>
        <th>SECTION <br> NUMBER</th>
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
      echo '<tr align="center">
          <td>' .$no.'</td>
          <td>' .$row['cid'].     '</td>
          <td>' .$row['sec_id'].  '</td>
          <td>' .$row['cname'].   '</td>
          <td>' .$row['credits']. '</td>
          <td>' .$row['tname'].   '</td>
        </tr>';
      $no++;
    }?>
    </tbody>
    <tfoot>
      <tr/>
    </tfoot> 
  </table>
  <br><br><br>
  </body>  
</html>


