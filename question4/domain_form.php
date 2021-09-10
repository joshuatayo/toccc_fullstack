<?php
    // define variables and set to empty values
    $errMessage = $hideDisplay = $showDisplay = "";
    $title = $surname = $email = $message = "";
         
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["title"])) {
           $errTitle = "alert-validate";
        } else {
            $title = userInput($_POST["title"]);
        }

        if (empty($_POST["surname"])) {
            $errSurname = "alert-validate";
        } else {
            $surname = userInput($_POST["surname"]);
        }
            
        if (empty($_POST["email"])) {
            $errEmail = "alert-validate";
        } else {
            $email = userInput($_POST["email"]);
               
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errMessage = "alert-validate"; 
            }
        }
            
        if (empty($_POST["message"])) {
           $errMessage = "alert-validate";
        }else {
            $message = userInput($_POST["message"]);
        }

        if (!empty($_POST["title"]) && !empty($_POST["surname"]) 
            && !empty($_POST["email"]) && !empty($_POST["message"]) ) {
            $hideDisplay = "none";
            $showDisplay = "block";
        }
            
    }
         
    function userInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Domian Form</title>
        
        <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">  

        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>
    <body class="content">
      <div class="page-contents">
        <div class="container">
          <header>
            <div class="logo text-left">
              <h2><a href="http://www.suffolk-holidays.co.uk/" title="www.suffolk-holidays.co.uk" target="_blank">www.suffolk-holidays.co.uk</a></h2>
            </div>
          </header>
          <div class="page-content">
          <div class="row">
            <div class="col-md-offset-7 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100" id="formDiv" style="display: <?php echo $hideDisplay;?>;">
              <form class="validate-form" action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="formpage">

                  <div class="form-group validate-input <?php echo $errTitle;?>" data-validate="Title is required">
                    <input class="form-control form-field placeholder-fix" type="text" name="title" id="title" >
                    <label class="label" for="title">Title</label>
                  </div>

                  <div class="form-group validate-input <?php echo $errSurname;?>" data-validate="Surname is required">
                    <input class="form-control form-field placeholder-fix" type="text" name="surname" id="surname" >
                    <label class="label" for="surname">Surname</label>
                  </div>

                  <div class="form-group validate-input <?php echo $errEmail;?>" data-validate="Valid email is required">
                    <input class="form-control form-field placeholder-fix" type="email" name="email" id="email" >
                    <label class="label" for="email">Email</label>
                  </div>

                  <div class="form-group validate-input <?php echo $errMessage;?>" data-validate="Message is required">
                    <textarea class="form-control form-field placeholder-fix" name="message" id="message" rows="4"></textarea>
                    <label class="label" for="message">Message</label>
                  </div>

                </div>
                <div class="action-button">
                  <button class="btn-block" type="submit">Enquire Now</button> 
                </div>
              </form>
            </div>
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100" id="formDetails" style="display: <?php echo $showDisplay;?>;">
              <div class="form-details text-left">
                <div class="form-group">
                  <span class="mute">Title:</span>
                  <input class="form-control form-field" type="text" value="<?php echo $title; ?>" disabled >
                </div>
                <div class="form-group">
                  <span class="mute">Surname:</span>
                  <input class="form-control form-field" type="text" value="<?php echo $surname; ?>" disabled >
                </div>
                <div class="form-group">
                  <span class="mute">Email:</span>
                  <input class="form-control form-field" type="email" value="<?php echo $email; ?>" disabled >
                </div>        
                <div class="form-group">
                  <span class="mute">Message:</span>
                  <textarea class="form-control form-field placeholder-fix" name="message" id="message" rows="4" disabled><?php echo $message; ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <footer class="page-footer overlay">
        <div class="container">
          <div class="text">
            <p>Want to Buy this domain?</p>
          </div>
        </div>
      </footer>

      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/main.js"></script>


    </body>
</html>
