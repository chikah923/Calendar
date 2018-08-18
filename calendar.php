<?php

class Calendar
{
  private $year;
  private $month;
  private $days;
  private $first_day_of_week;

  public function __construct(int $year, int $month)
  {
    $this->year = $year;
    $this->month = $month;
    //以下の二つに引数を渡すかどうか。
    //(constructor内でyearとmonthを代入したのでこのクラス内では引数なしで使える)
    //引数渡して使う関数にするなら他のクラスからもアクセスできるようにpublic関数にする?
    $this->getfirstDayOfWeek();
    $this->days = $this->getSumDate();
  }

  private function getfirstDayOfWeek()
  {
    return $this->first_day_of_week = date("w", mktime(0, 0, 0, $this->month, 1, $this->year));
  }

  //西暦年号が100で割り切れて400で割り切れない年はうるう年ではなく平年
  private function getSumDate()
  {       
    if ($this->month == 2) {
      if ($this->year % 400 !== 0 && $this->year % 100 == 0) {
        return $days = 28;
      }
      if ($this->year % 4 == 0) {
        return $days = 29;
      }
      return $days = 28;
    }
        
    if ($this->month == 4 || $this->month == 6 || $this->month == 9 || $this->month == 11) {
      return $days = 30;
    }
    return $days = 31;
  }

  //インスタンス化されて外部から呼び出される関数なのでこれはpublic関数である必要がある
  public function show()
  {
    echo $this->year . "年" . $this->month . "月のカレンダー";
    echo "<br/>";
  
    for ($i = 1; $i <= $this->first_day_of_week; $i++) {
      echo "__  ";
    }

    for ($i = 1; $i <= $this->days; $i++) {
      if (1 <= $i&& $i<= 9) {
        echo "0".$i." ";
      } else {
        echo $i." ";
      }
      if (date("w", mktime(0, 0, 0, $this->month, $i, $this->year)) == 6) {
        echo "<br/>";
      }
    }
  }
}

