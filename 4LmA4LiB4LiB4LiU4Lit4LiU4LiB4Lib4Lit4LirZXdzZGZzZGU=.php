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
          
           echo $_GET['etime'];
              
  $my_file = 'https://github.com/GOLFIT22551011/hajimema/ss.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        ?>
      
      
       </h1>
    <button class="button button4" style="width:200px;" onclick=WriteFile();>บันทึกข้อมูล</button>
 
    
      </div>
                


          
        </body>
  
    </html>
