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
       <script >

function WriteFile() 
{
  
   var fh = fso.CreateTextFile("https://github.com/GOLFIT22551011/hajimema/blob/master/Log1.txt", true); 
   fh.WriteLine("Some text goes here..."); 
   fh.Close(); 
}

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
          
           echo $_GET['etime'];
              
  
        ?>
       <?php

$strFileName = "https://github.com/GOLFIT22551011/hajimema/blob/master/Log..txt";

$objFopen = fopen($strFileName, 'w');

$strText1 = "I Love ThaiCreate.Com Line1\r\n";

fwrite($objFopen, $strText1);

$strText2 = "I Love ThaiCreate.Com Line2\r\n";

fwrite($objFopen, $strText2);

$strText3 = "I Love ThaiCreate.Com Line3\r\n";

fwrite($objFopen, $strText3);

 

if($objFopen)

{

echo "File writed.";

}

else

{

echo "File can not write";

}
 

fclose($objFopen);

?>
      
       </h1>
    <button class="button button4" style="width:200px;" onclick=WriteFile();>บันทึกข้อมูล</button>
 
    
      </div>
                


          
        </body>
  
    </html>
