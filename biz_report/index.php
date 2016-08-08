<?php
require '../lib/dao.class.php';

ini_set("memory_limit","-1");

$options = array('dsn' => 'mysql:host=rds087e6n6l30d460413.mysql.rds.aliyuncs.com;dbname=fzb365',
            'username' => 'fzb365',
            'password' => 'fzb_1234',
            'options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'));
$dao = new Dao($options);
$table = array(); # 最终大表
# 获取主页被查看数量
# 本月
$sql = "select * from `本月主页被查看数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  $data = array('公司名称' => $record['公司名称']);
  $table[$record['用户id']] = $data;
  $table[$record['用户id']]['主页被查看数量'] = array('本月' => $record['主页被查看数量']);
}
# 上月
$sql = "select * from `上月主页被查看数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  // echo $record['用户id'] . ' ' . $record['公司名称'] . "\n";
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['主页被查看数量'])) {
    $table[$record['用户id']]['主页被查看数量'] = array('上月' => $record['主页被查看数量']);
  }
  else {
    $table[$record['用户id']]['主页被查看数量']['上月'] = $record['主页被查看数量'];
  }
}
# 上上月
$sql = "select * from `上上月主页被查看数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  // echo $record['用户id'] . ' ' . $record['公司名称'] . "\n";
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['主页被查看数量'])) {
    $table[$record['用户id']]['主页被查看数量'] = array('上上月' => $record['主页被查看数量']);
  }
  else {
    $table[$record['用户id']]['主页被查看数量']['上上月'] = $record['主页被查看数量'];
  }
}
# 获取样品发布数量
# 本月
$sql = "select * from `本月样品发布数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['样品发布数量'])) {
    $table[$record['用户id']]['样品发布数量'] = array('本月' => $record['样品发布数量']);
  }
  else {
    $table[$record['用户id']]['样品发布数量']['本月'] = $record['样品发布数量'];
  }
}
# 上月
$sql = "select * from `上月样品发布数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['样品发布数量'])) {
    $table[$record['用户id']]['样品发布数量'] = array('上月' => $record['样品发布数量']);
  }
  else {
    $table[$record['用户id']]['样品发布数量']['上月'] = $record['样品发布数量'];
  }
}
# 上上月
$sql = "select * from `上上月样品发布数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  // echo $record['用户id'] . ' ' . $record['公司名称'] . "\n";
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['样品发布数量'])) {
    $table[$record['用户id']]['样品发布数量'] = array('上上月' => $record['样品发布数量']);
  }
  else {
    $table[$record['用户id']]['样品发布数量']['上上月'] = $record['样品发布数量'];
  }
}
# 获取电话被拨打数量
# 本月
$sql = "select * from `本月电话被拨打数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['电话被拨打数量'])) {
    $table[$record['用户id']]['电话被拨打数量'] = array('本月' => $record['电话被拨打数量']);
  }
  else {
    $table[$record['用户id']]['电话被拨打数量']['本月'] = $record['电话被拨打数量'];
  }
}
# 上月
$sql = "select * from `上月电话被拨打数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['电话被拨打数量'])) {
    $table[$record['用户id']]['电话被拨打数量'] = array('上月' => $record['电话被拨打数量']);
  }
  else {
    $table[$record['用户id']]['电话被拨打数量']['上月'] = $record['电话被拨打数量'];
  }
}
# 上上月
$sql = "select * from `上上月电话被拨打数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  // echo $record['用户id'] . ' ' . $record['公司名称'] . "\n";
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['样品发布数量'])) {
    $table[$record['用户id']]['电话被拨打数量'] = array('上上月' => $record['电话被拨打数量']);
  }
  else {
    $table[$record['用户id']]['电话被拨打数量']['上上月'] = $record['电话被拨打数量'];
  }
}
# 获取样品被查看数量
# 本月
$sql = "select * from `本月样品被查看数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['样品被查看数量'])) {
    $table[$record['用户id']]['样品被查看数量'] = array('本月' => $record['样品被查看数量']);
  }
  else {
    $table[$record['用户id']]['样品被查看数量']['本月'] = $record['样品被查看数量'];
  }
}
# 上月
$sql = "select * from `上月样品被查看数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['样品被查看数量'])) {
    $table[$record['用户id']]['样品被查看数量'] = array('上月' => $record['样品被查看数量']);
  }
  else {
    $table[$record['用户id']]['样品被查看数量']['上月'] = $record['样品被查看数量'];
  }
}
# 上上月
$sql = "select * from `上上月样品被查看数量`";
$records = $dao->base_execute($sql, array());
foreach ($records as $record) {
  // echo $record['用户id'] . ' ' . $record['公司名称'] . "\n";
  if (!isset($table[$record['用户id']])) {
    $data = array('公司名称' => $record['公司名称']);
    $table[$record['用户id']] = $data;
  }
  if (!isset($table[$record['用户id']]['样品发布数量'])) {
    $table[$record['用户id']]['样品被查看数量'] = array('上上月' => $record['样品被查看数量']);
  }
  else {
    $table[$record['用户id']]['样品被查看数量']['上上月'] = $record['样品被查看数量'];
  }
}
echo ",,,主页被查看,,,样品发布,,,电话被拨打,,,样品被查看,\n";
echo "公司id, 公司名称,上上月,上月,本月,上上月,上月,本月,上上月,上月,本月,上上月,上月,本月\n";
foreach ($table as $k => $v) {
  echo $k . ',';
  echo $table[$k]['公司名称'] . ',';
  // 主页被查看数量
  if (!isset($table[$k]['主页被查看数量'])) {
    echo '0,0,0,';
  }
  else {
    if (!isset($table[$k]['主页被查看数量']['本月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['主页被查看数量']['本月'] . ',';
    }
    if (!isset($table[$k]['主页被查看数量']['上月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['主页被查看数量']['上月'] . ',';
    }
    if (!isset($table[$k]['主页被查看数量']['上上月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['主页被查看数量']['上上月'] . ',';;
    }
  }
  // 样品发布数量
  if (!isset($table[$k]['样品发布数量'])) {
    echo '0,0,0,';
  }
  else {
    if (!isset($table[$k]['样品发布数量']['本月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['样品发布数量']['本月'] . ',';
    }
    if (!isset($table[$k]['样品发布数量']['上月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['样品发布数量']['上月'] . ',';
    }
    if (!isset($table[$k]['样品发布数量']['上上月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['样品发布数量']['上上月'] . ',';;
    }
  }
  // 电话被拨打数量
  if (!isset($table[$k]['电话被拨打数量'])) {
    echo '0,0,0,';
  }
  else {
    if (!isset($table[$k]['电话被拨打数量']['本月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['电话被拨打数量']['本月'] . ',';
    }
    if (!isset($table[$k]['电话被拨打数量']['上月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['电话被拨打数量']['上月'] . ',';
    }
    if (!isset($table[$k]['电话被拨打数量']['上上月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['电话被拨打数量']['上上月'] . ',';;
    }
  }
  // 样品被查看数量
  if (!isset($table[$k]['样品被查看数量'])) {
    echo '0,0,0';
  }
  else {
    if (!isset($table[$k]['样品被查看数量']['本月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['样品被查看数量']['本月'] . ',';
    }
    if (!isset($table[$k]['样品被查看数量']['上月'])) {
      echo '0,';
    }
    else {
      echo $table[$k]['样品被查看数量']['上月'] . ',';
    }
    if (!isset($table[$k]['样品被查看数量']['上上月'])) {
      echo '0';
    }
    else {
      echo $table[$k]['样品被查看数量']['上上月'];
    }
  }
  echo "\n";
}
?>