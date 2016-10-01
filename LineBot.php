<?php
class bot{
	const TEXT=1;
	const IMAGE=2;
	const VIDEO=3;
	const API="https://trialbot-api.line.me/v1/events";
	const TO_CHANNEL=1383378250;
	const EVENT_TYPE="138311608800106203";
	const VERSION="V1.0.0";
	//Function
	public function __construct($channelID=NULL, $channelSecret=NULL, $mid=NULL){
		//Get Data
		$receive=json_decode(file_get_contents("php://input"));
		$this->text=$receive->result{0}->content->text;
		$this->from=$receive->result[0]->content->from;
		$this->content_type=$receive->result[0]->content->contentType;
		//Bot Information
		$this->channelid=$channelID;
		$this->channelsecret=$channelSecret;
		$this->mid=$mid;
	}
	public function getVersion(){
		return self::VERSION;
	}
	public function sendText($message=NULL){
		if ($message){
			$msg=sprintf($message, $this->text);
		}else{
			$msg=$this->text;
		}
		$data=[
			"to" => [$this->from],
			"toChannel" => self::TO_CHANNEL,
			"eventType" => self::EVENT_TYPE,
			"content" => [
				"contentType" => self::TEXT,
				"toType" => 1,
				"text" => $msg
			]
		];
		$context=stream_context_create(
			array(
				"http" => array(
					"method" => "POST",
					"header" => implode(PHP_EOL, [
						"Content-Type: application/json; charser=UTF-8",
						"X-Line-ChannelID:".$this->channelid,
						"X-Line-ChannelSecret:".$this->channelsecret,
						"X-Line-Trusted-User-With-ACL:".$this->mid
					]),
					"content" => json_encode($data),
					"ignore_errors" => true
				)
			)
		);
		file_get_contents(self::API, false, $context);
	}
	public function sendImage($original, $preview){
		$data=[
			"to" => [$this->from],
			"toChannel" => self::TO_CHANNEL,
			"eventType" => self::EVENT_TYPE,
			"content" => [
				"contentType" => self::IMAGE,
				"toType" => 1,
				"originalContentUrl" => $original,
				"previewImageUrl" => $preview
			]
		];
		$context=stream_context_create(
			array(
				"http" => array(
					"method" => "POST",
					"header" => implode(PHP_EOL, [
						"Content-Type: application/json; charser=UTF-8",
						"X-Line-ChannelID:".$this->channelid,
						"X-Line-ChannelSecret:".$this->channelsecret,
						"X-Line-Trusted-User-With-ACL:".$this->mid
					]),
					"content" => json_encode($data),
					"ignore_errors" => true
				)
			)
		);
		file_get_contents(self::API, false, $context);
	}
	public function sendVideo($original, $preview){
		$data=[
			"to" => [$this->from],
			"toChannel" => self::TO_CHANNEL,
			"eventType" => self::EVENT_TYPE,
			"content" => [
				"contentType" => self::VIDEO,
				"toType" => 1,
				"originalContentUrl" => $original,
				"previewImageUrl" => $preview
			]
		];
		$context=stream_context_create(
			array(
				"http" => array(
					"method" => "POST",
					"header" => implode(PHP_EOL, [
						"Content-Type: application/json; charser=UTF-8",
						"X-Line-ChannelID:".$this->channelid,
						"X-Line-ChannelSecret:".$this->channelsecret,
						"X-Line-Trusted-User-With-ACL:".$this->mid
					]),
					"content" => json_encode($data),
					"ignore_errors" => true
				)
			)
		);
		file_get_contents(self::API, false, $context);
	}
}
