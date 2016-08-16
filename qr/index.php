<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include '../lib/wechat.class.php';
include '../lib/phpqrcode/phpqrcode.php';

// 空中濮院
// define('WX_APPID', 'wxf72073b170bb6d8e');
// define('WX_APPSECRET', 'b92905786f322c02074d9e34d1d27db0');
// 服装宝
define('WX_APPID', 'wxe0f159b2e4603fff');
define('WX_APPSECRET', 'af0dc88d1204843bec06652c5876baa1');
define('WX_TOKEN', 'extbvd1427769064');

function get_access_token() {
  $curl = curl_init();
  // 使用服务器缓存token，type=fzb表示服装宝。
  // curl_setopt($curl, CURLOPT_URL, 'http://kzpy.py3d.cn/wechat/get_access_token.htm?key=af77ff3319304205a7889d8e4a3bddbf');
  curl_setopt($curl, CURLOPT_URL, 'wx.fzb365.com/wechat/get_access_token.htm?key=86f96818ded1fbbc703b1f57bead64dc&type=fzb');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $content = json_decode(curl_exec($curl), true);
  return $content['data'];
}

if ($argc != 2) {
  echo 'Usage: php ' . $argv[0] . " data.txt\n";
  exit(0);
}

$wechat = new Wechat(array('appid' => WX_APPID,
                            'appsecret' => WX_APPSECRET,
                            'debug' => true));
$scenes = array();
$fp = fopen($argv[1], 'r');
while (!feof($fp)) {
  $line = fgets($fp);
  if (!empty($line)) {
    $line = trim($line);
    $scenes[] = $line;
  }
}
fclose($fp);
foreach ($scenes as $scene) {
  $qr_link = $wechat->getQRCode($scene, 2); # 字符串型永久二维码
  echo $scene . ': ' . $qr_link['url'] . "\n";
  QRcode::png($qr_link['url'], $scene . '.png', 'H', 10);
}
?>
