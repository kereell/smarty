<?php

class Pagination {
	
	public $pages;
	public $rows;
	public $per_page;
	public $curr_page;
	
	public function __construct($total_rows=0, $curr_page=1, $per_page=5){
		
		$this->rows = $total_rows;
		$this->per_page = $per_page;
		$this->curr_page = $curr_page;
		$this->count_pages();
		
	}
	
	public function count_offset(){
		
		return $this->per_page * ($this->curr_page -1);
	
	}
	
	public function next(){
		
		$result = array();
		
		$result['page'] = $this->curr_page + 1;
		$result['exists'] = $result['page'] <= $this->pages ? 1 : 0;
		
		return $result;
		
	}
	
	public function previous(){
		
		$result = array();
		
		$result['page'] = $this->curr_page - 1;
		$result['exists'] = $result['page'] > 0 ? 1 : 0;
		
		return $result;
		
	}
	
	private function count_pages(){
		
		$this->pages = ceil($this->rows / $this->per_page);
		
	}
	
}