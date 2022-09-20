<?php

ob_start();
include "../config.php";
include "jdf.php";
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/style.css" >
    <title>
    گزارش لندینگ
    </title>
</head>
<body>
    <div class="wrapper">
        <div class="inner-wrapper">
            <div class="form-content">
                <div class="form-inner">
                    <div class="form-title">
                        <img src="assets/images/logo.png" />
                        <h1>دریافت گزارش کمپین</h1>
                        <p>برای دریافت گزارش کمپین، لطفا رمز عبوری که در اختیار شما قرار داده شده است را وارد کنید.</p>
                    </div>
                    <form action="" method="post" class="form-signin">
                        <div class="frm-input">
                            <input type="password" name="pass" placeholder="رمز عبور" >
                        </div>
                      <button name="excel_output" class="btn btn-lg btn-primary" type="submit"><img src="assets/images/icon.png" /> خروجی اکسل</button>
                      
                    </form>

<?php 
if(isset($_POST['excel_output']))
{
    if(isset($_POST['pass']) && md5($_POST['pass'])== "99698f3bec80c841c827f582a57cce81"){
       $res_list = [];
       $sql_order="SELECT *
       FROM users
       LEFT JOIN users_details ON users.id=users_details.user_id  ORDER BY users.created_at DESC";

      
       $res=$pdo->prepare($sql_order);
       $res->execute();
       if($res->rowCount() > 0 ){

          foreach($res->fetchAll() as $row){
             $res_list[] = [
            'name' => $row['name'],
            'mobile' => $row['mobile'],
            'instagram' => $row['instagram'],
            'score'=>$row['score'],
             'referral_code'=>$row['referral_code'],
            'utm_source' =>  $row['utm_source'],
            'utm_medium' =>  $row['utm_medium'],
            'utm_campaign' =>  $row['utm_campaign'],
            'utm_term' =>  $row['utm_term'],
            'utm_content' =>  $row['utm_content'],
             'referrer' =>  $row['referrer'],
            'created_at' => jdate("Y/m/d H:i:s", strtotime($row['created_at']), '', 'Iran', 'en'),

             ];
          } 
          
          xlsx_export( $res_list );
       }
    }else{
        echo "<p style='text-align:center;color:red;font-size:18px;font-family:tahoma'>رمز شما اشتباه می باشد . شما قادر به دریافت خروجی اکسل نیستید </p>";
    
    }
   
}
function xlsx_export( $res_data )
    {
      ini_set('display_errors', TRUE);
      ini_set('display_startup_errors', TRUE);
      date_default_timezone_set('Asia/Tehran');

      if (PHP_SAPI == 'cli')
        die('This example should only be run from a Web Browser');

      /** Include PHPExcel */
      require_once( './vendor/autoload.php');


      // Create new PHPExcel object
      $objSpreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

      // Set document properties
      $objSpreadsheet->getProperties()->setCreator("novitex excel")
                    ->setLastModifiedBy("file excel landing novitex")
                    ->setTitle("'گزارش خروجی اکسل لندینگ novitex'")
                    ->setSubject("گزارش لندینگ novitex")
                    ->setDescription("این یک گزارش کامل از ADSL می باشد")
                    ->setKeywords("novitex");

      // Add some data
      $objSpreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
      $objSpreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
            $objSpreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);


      $objSpreadsheet->setActiveSheetIndex(0)
                  ->setCellValue('A1', 'نام')
                  ->setCellValue('B1', 'موبایل ')
                  ->setCellValue('C1', ' آیدی ایسنتاگرام')
                  ->setCellValue('D1', 'امتیاز')
                   ->setCellValue('E1', 'کد معرف')
                  ->setCellValue('F1', 'utm_source')
                  ->setCellValue('G1', 'utm_medium')
                  ->setCellValue('H1', 'utm_campaign')
                  ->setCellValue('I1', 'utm_term')
                  ->setCellValue('J1', 'utm_content')
                  ->setCellValue('K1', 'منبع')
                  ->setCellValue('L1', 'تاریخ');
      $row = 2;
      foreach($res_data as $res_data_item)
      {
         $objSpreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A'.$row, $res_data_item['name'])
         ->setCellValue('B'.$row, $res_data_item['mobile'])
         ->setCellValue('C'.$row, $res_data_item['instagram'])
         ->setCellValue('D'.$row, $res_data_item['score'])
          ->setCellValue('E'.$row, $res_data_item['referral_code'])
         ->setCellValue('F'.$row, $res_data_item['utm_source'])
         ->setCellValue('G'.$row, $res_data_item['utm_medium'])
         ->setCellValue('H'.$row, $res_data_item['utm_campaign'])
         ->setCellValue('I'.$row, $res_data_item['utm_term'])
         ->setCellValue('J'.$row, $res_data_item['utm_content'])
          ->setCellValue('K'.$row, $res_data_item['referrer'])
         ->setCellValue('L'.$row, $res_data_item['created_at']);
         $row++;
      }

      // Rename worksheet
      $objSpreadsheet->getActiveSheet()->setRightToLeft(true);


      // Set active sheet index to the first sheet, so Excel opens this as the first sheet
      $objSpreadsheet->setActiveSheetIndex(0);

      // Redirect output to a client’s web browser (Excel2007)
      ob_clean();
			ob_start();
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="novitex-Report.xlsx"');
      header('Cache-Control: max-age=0');

      // If you're serving to IE over SSL, then the following may be needed
      header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
      header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      header ('Pragma: public'); // HTTP/1.0

      $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($objSpreadsheet);
      $objWriter->save('php://output');
      exit;
    }


?>

                 </div><!--End form inner-->
            </div><!--End form content -->

        </div><!--End inner wrapper -->
    </div><!--End Wrapper -->
      
    <div class="copyright">
        <a href="https://harmony.agency" target="_blank" rel="noopener follow">
            <img src="assets/images/harmony.png" />
        </a>
    </div> 
</body>
</html>