<?php
  
  include '../connection.php';
  $data = $conn->prepare("SELECT * FROM stationery WHERE  total_stock <= threshold_value AND is_delete = '0'");
$data->execute();
$stock = $data->fetchAll(PDO::FETCH_ASSOC);

          if(isset($_POST["ExportType"]))
            {
            switch($_POST["ExportType"])
            {
            case "export-to-excel" :
            // Submission from
            $filename = $_POST["ExportType"] . ".xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            ExportFile($stock);
            exit();
            default :
            die("Unknown action : ".$_POST["action"]);
            break;
            }
            }
            
            function ExportFile($records)
            {
              $heading = false;
              if(!empty($records))
                foreach($records as $row)
                {
                  if(!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                  }
                  echo implode("\t", array_values($row)) . "\n";
                }
              exit;
            }
?>