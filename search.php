<?php
mysql_connect("localhost","root","");
mysql_select_db("semdb");
mysql_query("UPDATE sites SET ind=0");

if(isset($_GET['search']))
{
   $search_value= $_GET['value'];
   if($search_value[0]==" ")
    {$search_value=substr($search_value, 1);}
   $count1=0;
   $pieces = explode(" ", $search_value);
   foreach($pieces as $search_value)
      {
      $query ="select * from sites where description like '%$search_value%'";
      $run=mysql_query($query);
   
      while($row=mysql_fetch_array($run))
      {
         $ind1=$row['ind'];
         $desc =$row['description'];
         $count1 = substr_count(strtoupper($desc),strtoupper($search_value));
         $id = $row['id'];
         $count1=$count1+$ind1;
         mysql_query("UPDATE sites SET ind=$count1 WHERE id=$id");

       }
       
       
    }
    $query ="select * from sites where description like '%$search_value%' ORDER BY ind DESC";
       $run = mysql_query($query);
 
        while($row=mysql_fetch_array($run))
         {
         $title = $row['title'];
         $link = $row['link'];
         $desc =$row['description'];
         $first =substr($row['description'],0,500);
         echo '<span class="style9">';
         echo "<h1>$title</h1></span>";
         echo"<a href='$link'>$link</a>";
         echo '<span style="color:black">';
         echo"<p>$first.......</p></span>";
  	     }
  }
?>
