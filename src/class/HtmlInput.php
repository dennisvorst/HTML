<?php

require_once "Html.php";

class HtmlInput extends Html
{
	protected $_isEmptyElement = true;
	/** https://www.tutorialspoint.com/html/html_input_tag.htm */
	protected $_allowedAttr = ["type", "value"];

	/* constructor */
	function __construct(array $attributes = null){
		parent::__construct("input", $attributes);
	}
}