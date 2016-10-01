<?php
require_once("./LineBot.php");
//Bot Information
$config=array(
	"channelID" => "<ChannelID>",
	"channelSecret" => "<ChannelSecret>",
	"mid" => "<Mid>"
);
//Bot start
$bot=new bot($config["channelID"],$config["channelSecret"],$config["mid"]);
$ver=$bot->getVersion();
$bot->sendText("Line Bot 開發者工具 ".$ver);
$bot->sendText("「%s」這是我們收到您所傳的訊息");
$bot->sendText("發個圖片做測試");
$bot->sendImage("https://erachan.pro/images/erachan.jpg", "https://erachan.pro/images/erachan.jpg");
