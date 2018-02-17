<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/OkazuGenerator.php';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv('CHANNEL_SECRET')]);
$sign = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$events = $bot->parseEventRequest(file_get_contents('php://input'), $sign);

foreach ($events as $event) {
    if (!($event instanceof \LINE\LINEBot\Event\MessageEvent)
    || !($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)) {
        $bot->replyText($event->getReplyToken(), OkazuGenerator::replyPromptOkazu());
    }

    // おかずと言えばおかずが出てくる
    if (preg_match("/おかず/", $event->getText())) {
        $bot->replyText($event->getReplyToken(), OkazuGenerator::replyOkazu());
    } else {
        $bot->replyText($event->getReplyToken(), OkazuGenerator::replyPromptOkazu());
    }
}
?>
