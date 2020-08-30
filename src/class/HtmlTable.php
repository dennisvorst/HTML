<?php
require_once "HtmlElement.php";
require_once "HtmlTableRow.php";
require_once "HtmlTableCell.php";
require_once "HtmlTableRowCollection.php";

class HtmlTable extends HtmlElement{

	private $_headers = [];
	private $_rows = [];
	private $_footers = [];

	/* constructor */
	function __construct(HtmlTableRowCollection $rows){
		$this->_headers = $rows->getHeaders();
		$this->_rows = $rows->getRows();
		$this->_footers = $rows->getFooters();
	}

	function createHtmlTable(HtmlTableRowCollection $ftrows, HtmlTableRow $ftheader = null, HtmlTableRow $ftfooter = null) {
		/**
		* create a table from two arrays. One containing the headers amd one containing the rowinformation.
		$ftheader = array()
		$ftvalues = array()
		*/
		$html = $this->getTableStart();

		/*  create the headers, if there are any */
		if (isset($ftheaders)){
			$html .= $this->createHtmlTag($this->getHeader($ftheaders), "tr");
		}

		/*  create the rows */
		$html .= $this->createRows($ftrows);

		/* add the footers */
		if (!empty($ftfooters)){
			$html .= $this->createRows($ftfooters);
		}

		$html .= $this->getTableEnd();
		return $html;
	}

	function show() : string {
		/** start the table */
		$html = "<table class='table'>\n";

		/** get the header */
		if ($this->_headers)
		{
			$html .= "  <thead>\n";
			foreach($this->_headers as $header) 
			{
				$html .= "    <tr>\n";
				$html .= "      " . $header->show();
				$html .= "    </tr>\n";
			}		
			$html .= "  </thead>\n";
		}

		/** get the rows */
		if ($this->_rows)
		{
			$html .= "  <tbody>\n";
			foreach($this->_rows as $row) 
			{
				$html .= "    <tr>\n";
				$html .= "      " . $row->show();
				$html .= "    </tr>\n";
			}		
			$html .= "  </tbody>\n";	
		} 

		/** get the footer */
		if ($this->_footers)
		{
			$html .= "  <tfoot>\n";		
			foreach($this->_footers as $footer) 
			{
				$html .= "    <tr>\n";
				$html .= "      " . $footer->show();
				$html .= "    </tr>\n";
			}		
			$html .= "  </tfoot>\n";		
		}

		/** close the table */
		$html .= "</table>\n";
		
		return $html;
	}

	function createRows($ftrows){
		/* create the rows in an HTML table, ftvalues is an array in an array */
		$html = "";

		foreach($ftrows as $ftrow){
			/* make sure the offset is correct */
			$ftrow = array_values($ftrow);
			/* create an element from each individual row. */
			$html .= "<tr>" . $this->createRow($ftrow) . "</tr>\n";
		}
		return $html;
	}

	function createRow($ftfields){
		/**
		* create a single row of elements
		* $ftfields = array();
		* $ftfields = array(array());
		*
		*/

		$html = "";
		$ftprops = " ";

//		print_r($ftfields);

		if (is_array($ftfields)){
			for ($i = 0; $i < count($ftfields); $i++){
				/* is it still an array? */
				if (is_array($ftfields[$i])){
					/* yes it is */
					/* get the key value the array was named in */
					$ftkeys = array_keys($ftfields[$i]);

					/* get the values from that array and reset the list of keys */
					$ftvalues = $ftfields[$i][$ftkeys[0]];
					$ftkeys = array_keys($ftvalues);

					for ($j = 0; $j < count($ftkeys); $j++){
						if ($ftkeys[$j] !== "value"){
							/* then it is a property */
							$ftprops .= $ftkeys[$j] . "=" . $ftvalues[$ftkeys[$j]] . " ";
						}
					}
					$html .= "<td" . $ftprops . ">" . $ftvalues['value'] . "</td>\n";
				} else {
					/* nope */
					/* is it a number value */
					if (is_numeric($ftfields[$i])){
						$html .= "<td><div class='pull-right'>" . $ftfields[$i] . "</div></td>\n";
					} else {
						$html .= "<td>\n";
						$html .= $ftfields[$i] . "\n";
						$html .= "</td>\n";
					}
				}
			}
		}
		return $html;
	}

	// function getTableStart(){
	// 	return "<table><!-- HtmlTable -->\n";
	// }
	// function getTableEnd(){
	// 	return "</table><!-- HtmlTable -->\n";
	// }

	function getHeader($ftvalues){
		/* this function creates the header row in a table */
		$html = "";
		if (is_array($ftvalues)){
			$ftvalues = array_values($ftvalues);
			for ($i = 0; $i < count($ftvalues); $i++){
				$html .= $this->getHeader($ftvalues[$i]);
			}
		} else {
			$html = "<th>" . $ftvalues . "</th>\n";
		}
		return $html;
	}

	function getCell($ftvalues = null){
		/**
		* Create a cell within a HTML table
		$ftvalues = array(0=>value, 1=>value, etc);
		*/
		$html = "<td></td>";
		if (is_array($ftvalues) and count($ftvalues) > 0){
			for ($i = 0; $i < count($ftvalues); $i++){
				$html .= $this->getCell($ftvalues[$i]);
			}
		}

		return $html;
	}

	function getRow($ftvalues){
		$html = "";
		if (is_array($ftvalues)){
			for ($i = 0; $i < count($ftvalues); $i++){
				$html .= $this->getRow($ftvalues[$i]);
			}
		} else {
			$html = "<tr>" . $ftvalues . "</tr>\n";
		}
		return $html;
	}

	function createHtmlTag($ftvalues, $nmtag){
		$html = "";
		if (is_array($ftvalues)){
			for ($i = 0; $i < count($ftvalues); $i++){
				$html .= $this->createHtmlTag($ftvalues[$i], $nmtag);
			}
		} else {
			$html = "<$nmtag>" . $ftvalues . "</$nmtag>\n";
		}
		return $html;
	}
}