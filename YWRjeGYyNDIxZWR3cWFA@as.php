<?php
 require("sゆ249よおうtq.php");
 require("あr23ぐぎゃEAs.php");
// Get POST body content
$content = file_get_contents('php://input');
 // Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['ESP'])) {
	
	send_LINE($events['ESP']);
	
	 echo "OKESP";
	}
if (!is_null($events['TimeSN'])) {
	
	send_LINE($events['TimeSN']);
	
	 echo "OK";
}
      
if($_GET['path'] == "removetime" ){ 
        $ini_array = parse_ini_file("sample.ini");
        $APPIDSS=$ini_array['APPIDS']; 
        $KEYSS=$ini_array['KEYS']; 
        $SECRETSS=$ini_array['SECRETS']; 
        $SWITCHSS =$ini_array['SWITCHS'] ; 
		$arrayPostData['messages'][0]['type'] = "text";
		$arrayPostData['messages'][0]['text'] = "ต้นข้าว ยกเลิกให้แลัวค่ะ";
		replyMsg($arrayHeader,$arrayPostData);
             getMqttfromlineMsg("NodeMCU1","DeleteTime");
             
          
             
             $URL = "https://sot1.herokuapp.com/u@losp@fd.html?APP=".$APPIDSS."&&KE=".$KEYSS."&&SECR=".$SECRETSS."&&SWIT=".$SWITCHSS;
		
             echo '<script type="text/javascript">
             window.location = "'.$URL.'"</script>';
             
	echo "OK";
		
		
	}
 



if (!is_null($events['events'])) {
	echo "line bot";
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$Topic = "NodeMCU1" ;
			//getMqttfromlineMsg($Topic,$text);
			   
			
		}
	}
}

	


$Topic = "NodeMCU1" ;
echo "KO_END";
  $ini_array = parse_ini_file("sample.ini");
  $accessToken=$ini_array['accessToken']; 
  $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";


 if($text == "สวัสดีต้นข้าว"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา มีอะไรให้รับใช้ค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($text == "ต้นข้าว"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "มีอะไรให้รับใช้ค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
	 
    }
	else if($_POST['stime'] != null && $_POST['etime'] != null && $_POST['scrnN'] == "setDuration"){
        send_LINE(" ตั้งเวลาตั้งแต่ " .$_POST['stime']." ถึง " .$_POST['etime']." ให้เรียบร้อยแลัวค่ะ");
		
		//send_LINE("จัดให้ค่าาา ตั้งเวลาลดน้ำเรียบร้อยแลัวค่ะ");
		getMqttfromlineMsg($Topic,"ตั้งเวลาลดน้ำ");
		getMqttfromlineMsg($Topic,$_POST['stime']);
		getMqttfromlineMsg($Topic,$_POST['etime']);
	        $URL = "https://sot1.herokuapp.com/4LmA4LiB4LiB4LiU4Lit4LiU4LiB4Lib4Lit4LirZXdzZGZzZGU=.php?stime=".$_POST['stime']."&&etime=".$_POST['etime'];
		
		echo '<script type="text/javascript">
          	 window.location = "'.$URL.'"</script>';
		
		
    }
    

    else if($_POST['scrnN'] == "setdelete"){
      send_LINE("ต้นข้าว ยกเลิกให้แลัวค่ะ");
      getMqttfromlineMsg($Topic,"ยกเลิกทั้งหมด");
      $URL = "https://sot1.herokuapp.com/fafwfdxcsjflkajLKJKALSjfalkjfKL97897813Lib4Lit4LirZXdzZGZzZGU=.html";
		
      echo '<script type="text/javascript">
             window.location = "'.$URL.'"</script>';


    }
////////////////////////////////////////////////////
    else if($text == "ดูพื้นที่ลดน้ำ"){
        $image_url = $ini_array['see_water'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
  
////////////////////////////////////////////////////


////////////////////////////////////////////////////
    else if($text == "ลดน้ำ1"){
        $image_url = $ini_array['image1'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
	 
    }

    else if($text == "ลดน้ำ2"){
        $image_url =$ini_array['image2'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	      getMqttfromlineMsg($Topic,$text);
	
    }
else if($text == "ลดน้ำ3"){
        $image_url =$ini_array['image3'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ลดน้ำ4"){
        $image_url =$ini_array['image4'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ลดน้ำ5"){
        $image_url =$ini_array['image5'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }
else if($text == "ลดน้ำ6"){
        $image_url =$ini_array['image6'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }

////////////////////////////////////////////////////
////////////////////////////////////////////////////
else if($text == "ดูสถานะ"){ 
        $image_url =$ini_array['statusimage'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
	
        replyMsg($arrayHeader,$arrayPostData);
    }
////////////////////////////////////////////////////
////////////////////////////////////////////////////
else if($text == "ตั้งเวลาลดน้ำ"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ตัวอย่างตั้งเวลาการ 09:09 ,18:09";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }

////////////////////////////////////////////////////
////////////////////////////////////////////////////
else if($text == "ยกเลิกทั้งหมด"){
        $image_url =$ini_array['Cancel_all'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
	$arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ต้นข้าว ยกเลิกให้แลัวค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
	  getMqttfromlineMsg($Topic,$text);
    }   
 else{
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ไม่เข้าใจคำสั้งค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    }




function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }

   exit;

?>

