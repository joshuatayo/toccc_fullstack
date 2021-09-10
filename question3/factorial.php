<?php   
    global $fact;
    
    function factorial($number)
    { 
        // Factorial using Recursion
        //A recursive function is a function that calls itself.
        if ($number <= 1) {
            return 1;   
        }   
        else {
            $fact = $number * factorial($number - 1);
            return $fact;
        }   
    } 

    if (isset($_POST['number'])) {
        //get value from input text box 'number'
        $number = $_POST['number']; 

        //calling the function Factorial
        $fact = factorial($number);  
    }
?> 
<html>  
  <head>  
    <title>Factorial Calculation</title>  
  </head>  
  <body style="text-align: center;">  
    <p style="text-transform: uppercase;"><strong>Factorial of a Number</strong></p>
    <p>Write a function in PHP or JavaScript to calculate the factorial of a number, for example 6 factorial would be equal to 1*2*3*4*5*6 = 720.</p>
    <form class="form" method="post" onsubmit="return validate()">  
      <label>Enter the Number:</label>
      <input type="number" name="number" id="number"><span id="error" style="color: red"></span>
      <input type="submit" name="submit" value="Calculate" />
      <br>
      <br>     
        <?php  
            if ($fact != "") {  
                echo "Factorial of $number is $fact";
            }  
        ?>
    </form>  
    <a href="/tocc/index.php"><< Back To Question</a>

    <script type="text/javascript">
      //Using JavaScript to Validate Form Input
      function validate()
      {
        var message;
        //get value by Id
        var value = document.getElementById("number").value;

        //check if input field is empty or user input is not a number
        if (value == "" || isNaN(value)) {
          message = "!! Please enter a number";
          document.getElementById("error").innerHTML = message;
          return false;
        }
      }
    </script>
  </body>  
</html>  