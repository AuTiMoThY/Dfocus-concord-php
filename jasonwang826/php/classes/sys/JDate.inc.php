<?
	class JDate	{
		public static function allDate($sdate,$edate,$with_last_date=false)	{
			$rsDate = array();
			if( $edate < $sdate )	return $rsDate;
			$sdate_time=strtotime($sdate);
			$edate_time=strtotime($edate);
			for( $i=$sdate_time; $i<=$edate_time; $i+=(86400) )	{
				if( $i==$edate_time && !$with_last_date )	break;
				$idate = date('Y-m-d', $i );
				$info = getdate($i);
				$rsDate[] = (object) array(
						'date'		=>	$idate ,
						'timestamp'	=>	$i ,
						'wday'		=>	$info['wday']
					);
			}
			return $rsDate;
		}
		public static function allDateDaynum($sdate,$daynum)	{
			$rsDate = array();
			$sdate_time=strtotime($sdate);
			$count = 0;
			for( $i=$sdate_time; true; $i+=(86400) )	{
				$count++;
				if ( $count>$daynum )	break;
				$idate = date('Y-m-d', $i );
				$info = getdate($i);
				$rsDate[] = (object) array(
						'date'		=>	$idate ,
						'timestamp'	=>	$i ,
						'wday'		=>	$info['wday']
					);
			}
			return $rsDate;
		}
		public static function daynum($edate,$sdate=null)	{
			$sdate = (empty($sdate)) ? self::now() : $sdate;
			$sdate_time=strtotime($sdate);
			$edate_time=strtotime($edate);
			return floor(($edate_time-$sdate_time)/86400);
		}
		public static function hourNum($edate, $sdate=null)	{
			$sdate = (empty($sdate)) ? self::now() : $sdate;
			$sdate_time=strtotime($sdate);
			$edate_time=strtotime($edate);
			return floor(($edate_time-$sdate_time)/3600);
		}
		public static function date_add_day($daynum,$sdate=null,$return_time=false)	{
			$sdate = (empty($sdate)) ? self::now() : $sdate;
			$sdate_time=strtotime($sdate);
			$edate_time=$sdate_time+$daynum*86400;
			if(!$return_time)
				return date('Y-m-d', $edate_time );
			else
				return date('Y-m-d H:i:s', $edate_time );
		}
		public static function today()	{
			return date('Y-m-d');
		}
		public static function now()	{
			return date('Y-m-d H:i:s');
		}
		public static function expired($time,$now=null)	{
			if( $now==null )	$now = self::now();
			return ($now>$time);
		}
		public static function inTime($time, $sdate, $edate) {
			$time = (empty($time)) ? self::now() : $time;
			if( $sdate==null && $edate==null )
				return true;
			else if( $sdate==null )
				return ($time<=$edate);
			else if( $edate==null )
				return ($time>=$sdate);
			else
				return ( ($time>=$sdate) && ($time<=$edate) );
		}
		public static function daysInMonth($year,$month)	{
			return cal_days_in_month(CAL_GREGORIAN, $month, $year);
		}
		public static function lastdateOfMonth($year,$month)	{
			$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
			return sprintf("%4d-%02d-%02d",$year,$month,$days);
		}
		public static function year($date)	{
			$date_time=strtotime($date);
			return date( 'Y', $date_time );
		}
		public static function date_format($date,$format)	{
			$dt = new DateTime($date);
			return $dt->format($format);
		}
	}
?>
