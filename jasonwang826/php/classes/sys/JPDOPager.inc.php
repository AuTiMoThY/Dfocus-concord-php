<?
	class JPDOPager {
		public $rsData=array();
		public $rowNum=0;
		public $rowPerPage=10;
		public $pageNum=1;
		public $pageNo=0;
		public $arrOrderBy=array();
		public function __construct(  $rsData, $rowNum, $rowPerPage, $pageNo, $arrOrderBy=array() ) {
			$this->rsData = $rsData;
			$this->rowNum = $rowNum;
			if(empty($rowPerPage))	{
				$this->rowPerPage = '';
				$this->pageNum = 1;
			}	else	{
				$this->rowPerPage = $rowPerPage;
				$this->pageNum = ceil($rowNum/$rowPerPage);
			}
			$this->pageNo = $pageNo;
			$this->arrOrderBy = $arrOrderBy;
		}

		public function foreach_data( $func )	{
			for( $i=0; $i<sizeof($this->rsData); $i++ )	{
				if( $this->rsData[$i]==null )	continue;
				$func( $this->rsData[$i], $i );
			}
		}

		public function foreach_set( $func )	{
			for( $i=0; $i<sizeof($this->rsData); $i++ )	{
				if( $this->rsData[$i]==null )	continue;
				$this->rsData[$i]=$func( $this->rsData[$i], $i );
			}
		}
	}
?>