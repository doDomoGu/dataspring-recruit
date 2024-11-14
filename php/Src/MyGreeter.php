<?php

namespace Src;

use Exception;

use function PHPUnit\Framework\throwException;

class MyGreeter
{
  public function greeting()
  {
    /**
     * 只考虑中国时间(时区+8)的情况
     * 1. 获取当前时间的时间戳 (秒数)
     * 2. 修正时间戳 +8时区
     * 3. 把当前时间时间戳 除以 86400(一天的秒数) 得到余数 就是 当前时间在一天中的秒数
     * 4. 分别获得 6点 12点 18点 的秒数 组成分割区间
     * 5. 进行判断 给招呼文本赋值 
     */


    date_default_timezone_set("PRC");

    // $curTime = strtotime('2024-10-10 01:00:00'); // time(); // 获取当前的时间戳
    $curTime = time(); // 获取当前的时间戳
    $curTime += +8 * 3600; // 修正时间戳时区
    $secondsInOneDay = 86400; // 一天的秒数
    $secondsInToday = $curTime % $secondsInOneDay; // 取余数 = 当前时间在今天是第几秒

    $greetingContent = ''; // 打招呼的文本 (最后返回的值)

    $separatorIntervals = [6 * 3600, 12 * 3600, 18 * 3600]; // 分隔区间的时间

    switch (true) {
      case $secondsInToday >= $separatorIntervals[0] && $secondsInToday < $separatorIntervals[1]:
        $greetingContent = 'Good morning';
        break;
      case $secondsInToday >= $separatorIntervals[1] && $secondsInToday < $separatorIntervals[2]:
        $greetingContent = 'Good afternoon';
        break;
      case $secondsInToday >= $separatorIntervals[2] || $secondsInToday < $separatorIntervals[0]:
        $greetingContent = 'Good evening';
        break;
      default:
        throwException(new Exception('wrong time'));
        break;
    }

    // echo $greetingContent;
    return $greetingContent;
  }
}
