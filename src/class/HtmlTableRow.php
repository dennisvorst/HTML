<?php 
require_once "HtmlElement.php";
require_once "HtmlTableCell.php";
require_once "HtmlTableCellCollection.php";


class HtmlTableRow extends HtmlElement{
	protected $_cellCollection = [];
	protected $_type;

	/* constructor */
	function __construct(HtmlTableCellCollection $cells, array $attributes = null, string $type = "td"){
		parent::__construct($type, $attributes);

		$this->_cellCollection = $cells;
	}

	function getElement() : string
	{
		/* create the content */
		$content = "";
		$cells = $this->_cellCollection->get();

		foreach ($cells as $cell)
		{
			$content .= $cell->getElement();
		}
		/* enclose it */
		return $this->_encloseTags($content) . "\n";
	}

	function getType() : string
	{
		return $this->_type;
	}
}