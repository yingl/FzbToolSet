<?php
require '../lib/tbSdk/TopSdk.php';
date_default_timezone_set('Asia/Shanghai'); 

define('FZB_APP_KEY', '23331519');
define('FZB_APP_SECRET', 'd10d836b9c9c903f38087ad72398cae8');

$mobiles = array();
$fp = fopen('mobiles.txt', 'r');  // 读取手机号码列表
while (!feof($fp)) {
    $mobile = fgets($fp);
    if (!empty($mobile)) {
      $mobiles[] = trim($mobile);
    }
}
fclose($fp);
$tc = new TopClient;
$tc->appkey = FZB_APP_KEY;
$tc->secretKey = FZB_APP_SECRET;
$sms_req = new AlibabaAliqinFcSmsNumSendRequest;
$sms_req->setExtend('fzb');
$sms_req->setSmsType('normal');
$sms_req->setSmsFreeSignName('狐狸绒');
$sms_req->setSmsTemplateCode('SMS_12950693');
foreach ($mobiles as $mobile) {
  $sms_req->setRecNum($mobile);
  $req_response = $tc->execute($sms_req);
  print_r($req_response);
}
?>