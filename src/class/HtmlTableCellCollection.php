<?php
require_once "HtmlTableCell.php";

class HtmlTableCellCollection
{
	var $_collection = [];

	function __construct() {
	}

	function createCell(string $content = null, array $attributes = [], string $type = "td")
	{
		$this->_collection[] = new HtmlTableCell($content, $attributes, $type);
	}

	// function createCells(array $cells)
	// {
	// 	print_r($cells);
	// 	print_r("\n");

	// 	foreach ($cells as $cell)
	// 	{
	// 		print_r($cell);
	// 		print_r("\n");
	// 		$this->_collection[] = new HtmlTableCell($cell[0], $cell[1], $cell[2]);
	// 	}
	// }

	function addCell(HtmlTableCell $cell)
	{
		$this->_collection[] = $cell; 
	} 

	function get()
	{
		return $this->_collection;
	}
}