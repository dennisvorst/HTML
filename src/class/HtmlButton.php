<?php

require_once "HtmlElement.php";

class HtmlButton extends HtmlElement
{
	/* constructor */
	function __construct(array $attributes = null){
		parent::__construct("button", $attributes);
	}
}