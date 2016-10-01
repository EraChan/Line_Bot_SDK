Line Bot SDK版本 V1.0.0
==

於Callback檔案導入LineBot.php檔案
--

```php
<?php
require_once('LineBot.php');
```

創建新Bot
--

```php
$bot=new bot("Channel ID", "Channel Secret", "Mid");
```

發送文字訊息
--

```php
$bot->sendText("慾發送之訊息");
```

如果想要發送用戶端寄來的訊息
--

```php
$bot->sendText();
```

或是想將用戶的訊息與其他文字融合
--

```php
$bot->sendText("其他文字%s");
```

發送圖片（注意！一定要用網址）
--

```php
$bot->sendImage("圖片網址", "預覽圖網址");
```

發送影片（注意！一定要用網址）
--

```php
$bot->sendVideo("影片網址", "預覽圖網址");
```

範例檔案：callback.php
--
