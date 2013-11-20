<?php
/************************************************************************
MyPagina ver. 1.01
Use this class to handle MySQL record sets and get page navigation links

Copyright (C) 2005 - Olaf Lederer

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

_________________________________________________________________________
available at http://www.finalwebsites.com/
Comments & suggestions: http://www.finalwebsites.com/contact.php

Updates & bugfixes

ver. 1.01 - There was a small bug inside the page_info() method while showing
the last page (set). The error (last record) is fixed. There is also a small
update in the method set_page(), the check is now with $_REQUEST values in
place of $_GET values.

*************************************************************************/
//error_reporting(E_ALL); // only for testing
define("NUM_ROWS", 0); // the number of records on each page
define("NUM_LINKS", 5); // the number of links inside the navigation (the default value)
class MyPagina {

	var $sql;
	var $result;

	var $get_var = 'pageno';
	var $rows_on_page = NUM_ROWS;
	var $str_forward = "Next";// STR_FWD;
	var $str_backward = "Previous";// STR_BWD;

	var $all_rows;
	var $num_rows;

	var $page;
	var $number_pages;

	// constructor
	function MyPagina() {
		//$this->connect_db();
	}
	function rows_on_page($rs = NUM_ROWS){
				return $this->rows_on_page = $rs;
	}
	// sets the current page number
	function set_page() {
		$this->page = (isset($_REQUEST[$this->get_var]) && $_REQUEST[$this->get_var] != "") ? $_REQUEST[$this->get_var] : 0;
		return $this->page;
	}
	// gets the total number of records
	function get_total_rows() {
		$tmp_result = mysql_query($this->sql);
		$this->all_rows = mysql_num_rows($tmp_result);
		mysql_free_result($tmp_result);
		return $this->all_rows;
	}
	// database connection
	function connect_db() {
		$conn_str = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
		mysql_select_db(DB_NAME, $conn_str);
	}
	// get the totale number of result pages
	function get_num_pages() {
		$this->number_pages = ceil($this->get_total_rows() / $this->rows_on_page);
		return $this->number_pages;
	}
	// returns the records for the current page
	function get_page_result() {
		$start = $this->set_page() * $this->rows_on_page;
		$page_sql = sprintf("%s LIMIT %s, %s", $this->sql, $start, $this->rows_on_page);
		$this->result = mysql_query($page_sql);
		while($rowCMS=mysql_fetch_assoc($this->result)){
			$rows[] = $rowCMS;
		}
		return @$rows;

	}
	// get the number of rows on the current page
	function get_page_num_rows() {
		$this->num_rows = mysql_num_rows($this->result);
		return $this->num_rows;
	}
	// free the database result
	function free_page_result() {
		mysql_free_result($this->result);
	}
	// function to handle other querystring than the page variable
	function rebuild_qs($curr_var) {
		if (!empty($_SERVER['QUERY_STRING'])) {
			$parts = explode("&", $_SERVER['QUERY_STRING']);
			$newParts = array();
			foreach ($parts as $val) {
				if (stristr($val, $curr_var) == false)  {
					array_push($newParts, $val);
				}
			}
			if (count($newParts) != 0) {
				$qs = "&".implode("&", $newParts);
			} else {
				return false;
			}
			return $qs; // this is your new created query string
		} else {
			return false;
		}
	}
	// this method will return the navigation links for the conplete recordset
	function navigation($separator = " ", $css_current = "currentStyle", $back_forward = false) {
		$max_links = NUM_LINKS;
		$curr_pages = $this->set_page();
		$all_pages = $this->get_num_pages() - 1;
		$var = $this->get_var;
		$navi_string = "";
		if (!$back_forward) {
			$max_links = ($max_links < 2) ? 2 : $max_links;
		}
		if ($curr_pages <= $all_pages && $curr_pages >= 0) {
			if ($curr_pages > ceil($max_links/2)) {
				$start = ($curr_pages - ceil($max_links/2) > 0) ? $curr_pages - ceil($max_links/2) : 1;
				$end = $curr_pages + ceil($max_links/2);
				if ($end >= $all_pages) {
					$end = $all_pages + 1;
					$start = ($all_pages - ($max_links - 1) > 0) ? $all_pages  - ($max_links - 1) : 1;
				}
			} else {
				$start = 0;
				$end = ($all_pages >= $max_links) ? $max_links : $all_pages + 1;
			}
			if($all_pages >= 1) {
				$total_recs = $this->get_total_rows();
				$nav_info = $this->page_info("to");
				//$navi_string ="Records. ".$nav_info." of ".$total_recs."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$forward = $curr_pages + 1;
				$backward = $curr_pages - 1;

				 $url= get_page_link();


				 if($curr_pages > 0){
				$navi_string .= "<li><a href=".$url."?".$var."=".$backward.$this->rebuild_qs($var)." ><b><</b></a></li>" ;
			}
				if (!$back_forward) {
					for($a = $start + 1; $a <= $end; $a++){
						$theNext = $a - 1; // because a array start with 0
						if ($theNext != $curr_pages) {
							$navi_string .= "<li><a class='inactive' href=".$url."?".$var."=".$theNext.$this->rebuild_qs($var).">";
							$navi_string .= $a."</a></li>";
							$navi_string .= ($theNext < ($end - 1)) ? $separator : "";
						} else {
							$navi_string .= ($css_current != "") ? "<li class='active'>".$a."</li>" : $a;
							$navi_string .= ($theNext < ($end - 1)) ? $separator : "";
						}
					}
				}
				if($curr_pages < $all_pages){
				$navi_string .= "<li><a href=".$url."?".$var."=".$forward.$this->rebuild_qs($var).">></a>";
			}
			}
		}
		return $navi_string;
	}
	// this info will tell the visitor which number of records are shown on the current page
	function page_info($to = "-") {
		$first_rec_no = ($this->set_page() * $this->rows_on_page) + 1;
		$last_rec_no = $first_rec_no + $this->rows_on_page - 1;
		$last_rec_no = ($last_rec_no > $this->get_total_rows()) ? $this->get_total_rows() : $last_rec_no;
		$to = trim($to);
		$info = $first_rec_no." ".$to." ".$last_rec_no;
		return $info;
	}
	// simple method to show only the page back and forward link.
	function back_forward_link() {
		$simple_links = $this->navigation(" ", "", true);
		return $simple_links;
	}
}
?>