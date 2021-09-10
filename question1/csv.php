<?php
    function separateFile($fileName)
    {
        // check if file size is greater than 0
        if ($_FILES["file"]["size"] > 0) {

            // open the file to get data
            $file = fopen($fileName, "r");

            $date = date("h_i_s");    

            // open csv file for writing
            $outputItemCSV = fopen("item".$date.".csv", 'w');
            $outputCustomerCSV = fopen("customer".$date.".csv", 'w');
            $outputOrderCSV = fopen("order".$date.".csv", 'w');
            $outputOrderDetailCSV = fopen("order_detail".$date.".csv", 'w');

            // read each line in CSV file at a time
            while (($csvcontents = fgetcsv($file)) !== false) {
                //item csv
                $col_5 = $csvcontents[5];
                $col_6 = $csvcontents[6];
                $col_7 = $csvcontents[7];
                fputcsv($outputItemCSV, [$col_5, $col_6, $col_7]);

                //customer csv
                $col_2 = $csvcontents[2];
                $col_3 = $csvcontents[3];
                $col_4 = $csvcontents[4];
                fputcsv($outputCustomerCSV, [$col_2, $col_3, $col_4]);

                //order csv
                $col_0 = $csvcontents[0];
                $col_1 = $csvcontents[1];
                $col_2 = $csvcontents[2];
                fputcsv($outputOrderCSV, [$col_0, $col_1, $col_2]);

                //order detail csv
                $col_0 = $csvcontents[0];
                $col_5 = $csvcontents[5];
                $col_8 = $csvcontents[8];
                $col_9 = $csvcontents[9];
                fputcsv($outputOrderDetailCSV, [$col_0, $col_5, $col_8, $col_9]);      
            }

            fclose($file);
            fclose($outputItemCSV);
            fclose($outputCustomerCSV);
            fclose($outputOrderCSV);
            fclose($outputOrderDetailCSV);

            echo  "CSV file Separated Successfully";
        }
    }

    if (isset($_FILES['file'])) {
        //get value from input file
        $fileName = $_FILES["file"]["tmp_name"];

        //calling the function separateFile() and passing the input file
        $sf = separateFile($fileName);
    }
?>

<html>  
  <head>  
    <title>CSV file</title>  
  </head>  
  <body style="text-align: center;">  
    <p style="text-transform: uppercase;"><strong>Separate CSV files representing the contents of each entity.</strong></p>
    <p></p>
    <form class="form" method="POST" onsubmit="return validate()" enctype="multipart/form-data">  
      <input type="file" name="file" id="file" accept=".csv"><span id="error" style="color: red"></span>
      <input type="submit" name="submit" value="Submit" />
      <br>
      <br>
    </form>  
    <p>Separated csv files Location: <strong>" <?php echo $_SERVER['SERVER_NAME']?>\tocc\question1 "</strong> Folder </p>
    <a href="/tocc/index.php"><< Back To Question</a>

    <script type="text/javascript">
      //Using JavaScript to Validate Form Input
      function validate()
      {
        var message;

        //get value by Id
        var value = document.getElementById("file").value;

        //check if input field is empty
        if (value == "") {
          message = "!! Please add a csv file";
          document.getElementById("error").innerHTML = message;
          return false;
        }
      }
    </script>
  </body>  
</html> 