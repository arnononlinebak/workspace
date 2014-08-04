<?php
    //https://www.hackdee.com/Forums/showthread.php?tid=1612
    //https://www.hackdee.com/Forums/showthread.php?tid=1593
    $userid = "..."; // เลขประจำตัวเฟสบุคของคนที่ต้องการจะโพส
    $urlpost = 'https://graph.facebook.com/'.$userid.'/feed';
     
    $access_token  = "...";// <-- Token ของคนที่จะโพส
     
    $post_message = array('access_token' => $access_token,'message' => 'ข้อความที่ต้องการโพส' );
     
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$urlpost);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_message);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    $result = curl_exec($ch);
    curl_close ($ch);
    if($result){
            echo "โพสสำเร็จ";
    }else{
            echo "โพสล้มเหลว";
    }
     
?>

