!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
  <head>  
    <title>Enrolled Course Info</title>  
    <meta http-equiv="content-type"  
        content="text/html; charset=utf-8"/> 
    <link rel="stylesheet" href="tablestyle.css">
  </head>  
  <body>  
    <br> <br>
    <table class="data-table">
    <caption class="title">  <h1>Transcript</h1>  </caption>
    
    <?php
    $no   = 1;
    while ($row = mysqli_fetch_array($result))
    {
  	
     
  		echo'  

      <thead>
      <tr>
        <th> # </th>
        <th>COURSE ID</th>
        <th>COURSE NAME</th>
        <th>CREDITS</th>
        <th>GRADE</th>
      </tr>
    	</thead>;
    
    <tbody>
      <tr>
        <td> Year </td>
        <td>'.$row['yearr'].'</td>
        <td> Semester </td>
        <td>'.$row['sem'].'</td>
        <td/>
      </tr>
    
      <tr>
          <td>'.$no.'</td>
          <td>'.$row['cid'].'</td>
          <td>'.$row['cname'].'</td>
          <td>'.$row['credits'].'</td>
          <td>'.$row['grade'].'</td>
        </tr>';
      $no++;
    }
    ?>
    </tbody>
    <tfoot>
      <tr/>
    </tfoot> 
  </table>

  </body>  
</html>
