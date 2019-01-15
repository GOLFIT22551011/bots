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
  function CloseWindow()
  {
  window.close();
  }

  function CloseOpenerWindow()
  {
  window.opener = window;
  window.close();
  }

  function CloseOpenerHikks()
  {
  window.opener = "HikksNotAtHome";
  window.close();
  }

  function CloseWithWindowOpenTrick()
  {
  var objWindow = window.open(location.href, "_self");
  objWindow.close();
  }
  </script>
  function CloseWindow()
  {
  window.close();
  }

  function CloseOpenerWindow()
  {
  window.opener = window;
  window.close();
  }

  function CloseOpenerHikks()
  {
  window.opener = "HikksNotAtHome";
  window.close();
  }

  function CloseWithWindowOpenTrick()
  {
  var objWindow = window.open(location.href, "_self");
  objWindow.close();
  }
<script type="text/javascript">
  function CloseWindow()
  {
  window.close();
  }

  function CloseOpenerWindow()
  {
  window.opener = window;
  window.close();
  }

  function CloseOpenerHikks()
  {
  window.opener = "HikksNotAtHome";
  window.close();
  }

  function CloseWithWindowOpenTrick()
  {
  var objWindow = window.open(location.href, "_self");
  objWindow.close();
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
      
       </h1>
    <button type="button" class="button button4" style="width:200px;" onclick="CloseWindow();">บันทึกข้อมูล</button>
    
      </div>
                



          
        </body>
  
    </html>
