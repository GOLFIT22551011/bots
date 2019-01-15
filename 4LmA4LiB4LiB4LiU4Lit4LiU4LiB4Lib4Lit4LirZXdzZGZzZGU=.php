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
       <SCRIPT language="JavaScript">

function WriteFile() 
{
   var fso  = new ActiveXObject("Scripting.FileSystemObject"); 
   var fh = fso.CreateTextFile("c:\\Test.txt", true); 
   fh.WriteLine("Some text goes here..."); 
   fh.Close(); 
}

</SCRIPT>
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
      
       </h1>
    <button class="button button4" style="width:200px;" onclick="javascript:window.open('','_self').close();">บันทึกข้อมูล</button>
 
    
      </div>
                

<P>
<SCRIPT language="JavaScript">  WriteFile(); </SCRIPT>
</P>

          
        </body>
  
    </html>
