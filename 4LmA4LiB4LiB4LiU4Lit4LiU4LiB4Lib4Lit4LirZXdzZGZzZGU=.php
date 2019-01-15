<html>
  
        <head>
  
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
            <title>ตั้งเวลา</title>
          <style>
    .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 26px;
    margin: 4px 2px;
    cursor: pointer;
}
.button4 {border-radius: 12px;}

           
            
            
            
</style>
          <script>
function closeWindow() { self.opener=this; self.close();  }
</script>
  
        </head>
  
        <body>
  <div align="center">
    <br>
     <h1> ตั้งเวลารดน้ำสำเร็จแลัวค่ะ<br>
          เริ่ม
        <?php
          
            echo $_GET['stime'];
  
        ?>
       -
       <?php
          
          //  echo $_GET['etime'];
              $file = fopen('text.txt','a+')  or die("Unable to open file!");
              $str = "\r\nทดสอบเขียนข้อมูลลงในไฟล์ \r\nต่อจากข้อมูลเดิม\r\n";
              fwrite($file,$str);
              fclose($file);
  
        ?>
       </h1>
    <button id="closeWindow()" class="button button4" style="width:200px;" onclick="closeWindow()">บันทึกข้อมูล</button>
    
      </div>
        </body>
  
    </html>
