<?php

    include 'partials/_qdbconnect.php';
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <div class="ques_form"></div>
      <form action="response_check.php" method="POST">

          <?php
            
            $i=1;
            $r_num=0;
            $r_temp=0;
            while($i<=5)
            {
              $r_temp-$r_num;
              $r_num=mt_rand(1,5);
              if($r_temp==$r_num)
              {
                $r_num=mt_rand(1,5);
              }
              $sql = "SELECT * FROM qaans WHERE `sno`=$r_num";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              // <input type="hidden" id="q_id" name="q_id" value="<?php $row['sno']>" >
              // echo ".$row[sno]. .$row[question]. <br> .$row[op1]. <br> .$row[op2]. <br> .$row[op3]. <br> .$row[op4]. <br>";
              echo "<p>" . $row['sno'] . ". " . $row['question'] . "</p>";

              echo "<input type='radio' name='q$i' value='op1'> " . $row['op1'] . "<br>";
              echo "<input type='radio' name='q$i' value='op2'> " . $row['op2'] . "<br>";
              echo "<input type='radio' name='q$i' value='op3'> " . $row['op3'] . "<br>";
              echo "<input type='radio' name='q$i' value='op4'> " . $row['op4'] . "<br>";

              echo "<input type='hidden' id='q$i-no' name='q$i-no' value='" . $row['sno'] . "'>";
              $i=$i+1;
            }
          
    
          ?>
          <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
    </div>      
        
      </form>
    
    
</body>
</html>