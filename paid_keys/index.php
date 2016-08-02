<?php
define('CHANNEL', 'TODO');
define('COUNT', 50);

function create_password($pwd_length = 16)
{  
  $rand_pwd = '';  
  for ($i = 0; $i < $pwd_length - 3; ++$i)  
  {
    // '0' - '9'
    $ch = mt_rand(48, 57);
    $rand_pwd .= chr($ch);
  }
  //echo $rand_pwd . "\n";
  return $rand_pwd . '010';  
}

// 生成password
$passwords = array();
for ($i = 0; $i < COUNT; ++$i) {
  $passwords[] = create_password();
}
// 生成sql
foreach ($passwords as $password) {
  echo "insert into paid_keys(`key`, create_time, channel) values('" . $password . "', now(), '". CHANNEL . "');\n";
}
echo "\n\n\n\n";
// 按xxxx-xxxx-xxxx-xxxx格式输出文本
foreach ($passwords as $password) {
  echo $password[0] . $password[1] . $password[2] . $password[3];
  echo ' ';
  echo $password[4] . $password[5] . $password[6] . $password[7];
  echo ' ';
  echo $password[8] . $password[9] . $password[10] . $password[11];
  echo ' ';
  echo $password[12] . $password[13] . $password[14] . $password[15];
  echo "\n";
}
?>