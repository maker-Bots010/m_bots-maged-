#برمجه @JJJ22J 
#غير مسموح بالبيع اخلي مسؤليتي ع اي شخص يبيعه
#من الصفر برمجتي 
#تابع لقناة @SeroBots
<?php
ob_start();
$token = "7721327192:AAHKMCIDcRftrl18whwvoIOdmstCiaZvrKk"; 
define("API_KEY",$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 
 




$update = json_decode(file_get_contents('php://input'));
$message= $update->message;
$text = $message->text;
$chat_id= $message->chat->id;
$name = $message->from->first_name;
$user = $message->from->username;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$message = $update->message;
$chat_id = $message->chat->id;




if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}

if($text == "/start") {
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"*
بوت صنع استضافات PHP
ارسل /MAKE او اضغط علي الزر الادناه
*",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"صنع استضافه جديده", 'callback_data'=>'MakeRespone']],
]
])
]);
}


if($text == "/MAKE") {
	$Maker= json_decode(file_get_contents("https://ssmxzs.ml/ftp.php"));
$pass = $Maker->password;
$email = $Maker->email;
$TheResp = $Maker->response;
if($TheResp == "Found. Redirecting to /welcome" ){
	$reslt = "Done ✅";
	}else{
		$reslt = " Error Your Host Dosent Make ";
		}
if($Maker){
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"
*Done Create Your Host ✅*

*Email* : `$email`
*PassWord* : `$pass`
*Respone* : $reslt

[Login](dashboard.pantheon.io/login)

𝐂𝐇𝐀𝐍𝐍𝐄𝐋 : [Serø ⁞ Bots Service](t.me/SeroBots)
",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"صنع مره اخري 🚀", 'callback_data'=>'MakeRespone']],
]
])
]);
}
}

if($data == "MakeRespone"){
	
	$Maker= json_decode(file_get_contents("https://ssmxzs.ml/ftp.php"));
$pass = $Maker->password;
$email = $Maker->email;
$TheResp = $Maker->response;
if($TheResp == "Found. Redirecting to /welcome" ){
	$reslt = "Done ✅";
	}else{
		$reslt = " Error Your Host Dosent Make ";
		}
if($Maker){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*Done Create Your Host ✅*

*Email* : `$email`
*PassWord* : `$pass`
*Respone* : $reslt

[Login](dashboard.pantheon.io/login)

𝐂𝐇𝐀𝐍𝐍𝐄𝐋 : [Serø ⁞ Bots Service](t.me/SeroBots)
",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"صنع مره اخري 🚀", 'callback_data'=>'MakeRespone']],
]
])
]);
}
}