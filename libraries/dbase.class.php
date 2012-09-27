<?php

class dBase{
	
	private $cd;
	
	protected $id;
	protected $table;
	protected $returned_data = array();
	protected $result = array();
	
	private $db_host;
	private $db_user;
	private $db_pass;
	private $db_name;
	private $db_charset;
	
	public function __construct($db_host, $db_user, $db_pass, $db_name, $db_charset='utf8'){
		
		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_name = $db_name;
		$this->db_charset = $db_charset;
		
		$this->db_connect();
		
		}
	
	protected function db_connect(){

		$this->cd = mysql_connect($this->db_host, $this->db_user, $this->db_pass) or 
			$this->error('Can\'t connect '.mysql_error($this->cd));
		
		if($this->cd){
			$sel = mysql_select_db($this->db_name, $this->cd) or 
				$this->error('Can\'t select next db: "'.$this->db_name.'"; '.mysql_error($this->cd));
			}
		if($sel){
			mysql_set_charset($this->db_charset,$this->cd) or
				$this->error('Can\'t set charset to "'.$this->db_charset.'"; '.mysql_error($this->cd));
			}
		}
	
	protected function getAllData($table){
		
		$tbl = mysql_real_escape_string($table);
		
		$this->result = $this->doQuery('SELECT * FROM `'.$tbl.'`') or
			$this->error('Can\'t get all data from the table "'.$tbl.'"; '.mysql_error($this->cd));

		}
	
	protected function getData($table, $fields='', $condition=''){
		
		$items = $fields ? $fields : '*';
		$tbl = mysql_real_escape_string($table, $this->cd);
		$cond = $condition ? $condition : '';
		
		$this->result = $this->doQuery('SELECT '.$items.' FROM `'.$tbl.'` '.$cond.'') or
			$this->error('Can\'t get "'.$items.'" from the "'.$tbl.'" with the condition "'.$cond.'"');
		
		}
		
	protected function editData($table, array $values, $condition=''){
		
		$items = '';
		foreach ($values as $key => $val){
			$items .= '`'.mysql_real_escape_string($key, $this->cd).'`="'.mysql_real_escape_string($val,$this->cd).'", ';
			}
		$items_str = rtrim($items, ', ');
		
		$cond = $condition ? $condition : '';
		$tbl = mysql_real_escape_string($table, $this->cd);
		
		$this->doQuery('UPDATE `'.$tbl.'` SET '.$items_str.' '.$cond.'') or
			$this->error('Can\'t update "'.$tbl.'" setting "'.$values.'" with the next condition: "'.$cond.'" ');
		
		return $this->lastAffected();
		
		}
	
	protected function setData($table, array $values, $condition=''){
		
		$cols = ''; $vals = '';
		foreach ($values as $k => $v){
			if(is_string($k)){
				$cols .= '`'.mysql_real_escape_string($k).'`, ';
				$vals .= '"'.mysql_real_escape_string($v).'", ';
				} else {
					$vals .= '"'.mysql_real_escape_string($v).'", ';
					}
			}
		$items_str = $cols ? ' ('.rtrim($cols, ', ').') VALUES ('.rtrim($vals, ', ').')' : ' VALUES ('.rtrim($vals, ', ').')';
		$tbl = mysql_real_escape_string($table);
		$cond = $condition ? $condition : '';
		
		$this->doQuery('INSERT INTO `'.$tbl.'` '.$items_str.' '.$cond.'') or
			$this->error('Can\'t put "'.$items_str.'" into "'.$tbl.'" whith the next condition: "'.$cond.'"');
		
		return $this->lastInsertedId();

		}
		
	protected function removeData($table, $condition=''){
		
		$tbl = mysql_real_escape_string($table);
		$cond = $condition ? $condition : '';
		
		$this->doQuery('DELETE FROM `'.$tbl.'` '.$cond.'') or
			$this->error('Can\'t delete from "'.$tbl.'" with the next condition: "'.$cond.'" ');
		
		return $this->lastAffected();
		
		}
		
	private function doQuery($query){
		
		$res = mysql_query($query, $this->cd) or
			$this->error('Can\'t do a query: "'.$query.'"; '.mysql_error($this->cd));
		
		return $res;
		 
		}
		
	protected function lastInsertedId(){
		
		$res = mysql_insert_id($this->cd) or
		$this->error('Can\'t return last inserted id; '.mysql_error($this->cd));
	
		return $res;
		
		}
		
	protected function lastAffected(){
	
		$res = mysql_affected_rows($this->cd) or
		$this->error('Can\'t return last affected rows; '.mysql_error($this->cd));
	
		return $res;
	
	}
		
	protected function getResArr($type=NULL){
		
		$type = $type ? mysql_real_escape_string($type) : MYSQL_ASSOC;
		
		while ($row = mysql_fetch_array($this->result, $type)){
			$this->returned_data[] = $row;
			}
		
		return $this->returned_data; 
			
		}
		
	protected function getResRow($type=NULL){
		
		$type = $type ? mysql_real_escape_string($type) : MYSQL_ASSOC;
		
		$this->returned_data = mysql_fetch_array($this->result, $type);
		
		return $this->returned_data;
		
		}
	
	private function error($msg){
		
		throw new Exception($msg);
		
		}
	
	public function __destruct(){

		mysql_close($this->cd);
		unset($this->cd);
		unset($this->id);
		unset($this->table);
		unset($this->returned_data);
		unset($this->result);
		unset($this->db_host);
		unset($this->db_user);
		unset($this->db_pass);
		unset($this->db_name);
		unset($this->db_charset);
		
		}
	}