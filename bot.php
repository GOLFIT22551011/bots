<?php
 require("pub.php");
 require("line.php");
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['ESP'])) {
	
	send_LINE($events['ESP']);
		
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
			getMqttfromlineMsg($Topic,$text);
			   
			
		}
	}
}
$Topic = "NodeMCU1" ;
//$text = "Test";
getMqttfromlineMsg($Topic,$text);
echo "OK3";

    $accessToken = "'+RAgZsXSoIB12rh5ilBLg3BySGaIGHSvVROMcOJ9yw0B96H9VLORNgQs+a6Og5wS/MOplVEgqgYoVs5BosxYieMV5GGaOqnXhNrFje4NnnPhc04X57HVXsYDisV4JycZ2OovPF6jkSq6EHAN6xijpQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";

if($text == "สวัสดีแตงโต"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา มีอะไรให้รับใช้ค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    }

   else if($text == "แตงโต"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "มีอะไรให้รับใช้ค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($text == "ดูพื้นที่ลดน้ำ"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($text == "ลดน้ำหนึ่ง"){
        $image_url = "https://ftqgwa.bn.files.1drv.com/y4pg51qNMHOOFiI4cUiebIk6c5ve4MtzAQwfc56k20nWJLMnzdJ8sJPzItbtaJAt9AQyTlQI5OWIIqjZ5Na7HNH6jOaIFMGTve0sZv7BV24MhCxMB45J7EKpeVhLVG0O60_0lkJ5cPxHPfiXdTFXkYo3ivCqa1ecGnQOh63ToFqpt6nRHkBf_dqzshRiAs8AgRREXa-J3fAQU-1_jed11wnMw/New%20Bitmap%20Image.bmp?psid=1";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($text == "ลดน้ำ1"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "จัดการให้แลัวค้าา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else{

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
