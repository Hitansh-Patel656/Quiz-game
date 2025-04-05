<?php
// $login = false;
// $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_qdbconnect.php';
    $q_no=array(1,2,3,4,5);
    $s_op=array("", "", "", "", "");
    $check_res=array(false,false,false,false,false);

    $j=1;
    $k=0;
    while($j<=5)
    {
      if(isset($_POST["q$j-no"]))
      {
        $q_no[$k]=$_POST["q$j-no"];

        if(isset($_POST["q$j"]))
        {
          $s_op[$k]=$_POST["q$j"];
          $check_res[$k]=true;
        }  

        else
          echo "User didn't select the option of the question $j.<br>";

      }
      $j=$j+1;
      $k=$k+1;
    }  
     

    $l=0;
  
    while($l<5)
    {
      $sql = "SELECT * FROM `qaans` WHERE `sno` = $q_no[$l]";
      $result = mysqli_query($conn, $sql);
      $row=mysqli_fetch_assoc($result);

      if($check_res[$l]==false)
        echo "Option not selected<br>";

      else if($row['ans']==$s_op[$l])
      {
        echo "Correct<br>";
      }

      else 
      {
        echo "Incorrect<br>";
      }

      $l=$l+1;
    }
    // $sql = "Select * from users where username='$username' AND password='$password'";
    
    //     while($row=mysqli_fetch_assoc($result)){
           
    //         } 
    //         else{
    //             $showError = "Invalid Credentials";
    //         }
    //     }
        
    
    // else{
    //     $showError = "Invalid Credentials";
    // }

} 
?>