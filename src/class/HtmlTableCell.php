<?php
require_once "HtmlElement.php";

class HtmlTableCell extends HtmlElement
{
	protected $_type;
	protected $_allowedAttr = ["colspan", "rowspan", "headers"];

	function __construct(string $content = null, array $attributes = null, string $type = "td")
	{
		parent::__construct($type, $attributes);

		$this->_content = $content;
		$this->_type = $type;
		$this->_tag = $this->_getTag();
	}
}