<?php
require_once "class/HtmlElement.php";

class HtmlUrlElement extends HtmlElement
{
	// https://www.w3schools.com/tags/tag_a.asp
	var $_attributes = ["download", "href", "hreflang", "media", "ping", "browser", "referrerpolicy", "rel", "target", "type"];
	var $_globalAttributes = [];
	var $_eventAttributes = [];

    /**
     * The <a href='#'>SomeValue</a> element is not an empty element.
     * This value is inherited from the HtmlElement parant object
     * $content is what is shown on the page.
     */

    function __construct(array $attributes, string $content, LogObject $log = null)
    {
        parent::__construct("a", $attributes);
        $this->_content = $content;
        $this->_validate();

    }

    function Show() : string
    {
        return $this->getElement();
    }

    function _validate() {
        /** content is mandatory */
        if (empty($this->_content)){
            throw new exception("No content provided.");
        } 

        foreach ($this->_attributes as $key => $value) {
            switch ($key)
            {
                case "download":
                    break;
                case "href":
                    /** href is mandatory */
                    break;
                case "hreflang":
                    break;
                case "media":
                    break;
                case "ping":
                    break;
                case "browser":
                    break;
                case "referrerpolicy":
                    break;
                case "rel":
                    $list = ["alternate", "author", "bookmark", "external", "help", "license", "next", "nofollow", "noreferrer", "noopener", "prev", "search", "tag"];
                    if (!in_array($value, $list)){
                        throw new Exception("HtmlUrlElement::_validate - Value {$value} not allowed for {$key}.");
                    }
                    break;
                case "target":
                    $list = ["_blank", "_parent", "_self", "_top"];
                    if (!in_array($value, $list)){
                        throw new Exception("HtmlUrlElement::_validate - Value {$value} not allowed for {$key}.");
                    }
                    break;
                case "type":                 
                    break;


                default: 
                    throw new Exception("HtmlUrlElement::_validate - attribute {$key} not allowed.");
            }
        }
    }

}