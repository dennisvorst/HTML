<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

/* include section */
require_once "class/EditEntity.php";

class HtmlForm{
	var $nmschema;
	var $nmtable;
	var $idvalue;

	var $nmtitle;
	var $ftmenu;
	var $ftmenuoptions = array("New");

	/* constructor */
	function __construct($nmschema, $nmtable, $idvalue=null){
		$this->nmschema = $nmschema;
		$this->nmtable	= $nmtable;
		$this->idvalue	= $idvalue;
		$this->setTitle($this->nmtable);

	}

	function showHorizontalForm($nmaction=null, $nmorderby=null){
		/* create an HTML for an input */
		$html = "";

		/* show title */
		$html .= $this->getTitle();

		/* show topbar */
		$html .= $this->getMenu();

		/* add the form tag */
		$html .= "<form action=\"process_input.php\" method=\"post\">\n";

		/* show horizontal table */
		$entityObj = new editEntity($this->nmschema, $this->nmtable, $this->idvalue, $nmaction, $nmorderby);
		$html .= $entityObj->createHorizontalTable(true, true);

		/* add additional information */
		$html .= "<input name='nmschema' type='hidden' value='" . $this->nmschema . "' />\n";
		$html .= "<input name='nmtable' type='hidden' value='" . $this->nmtable . "' />\n";

		/* show bottombar */
		$html .= "<input name='action' type='submit' value='New' />\n";
		$html .= $this->addButtons();

		/* close the form tag */
		$html .= "</form>\n";

		return $html;
	}

	function showVerticalForm($nmaction=null, $nmorderby=null){
		/* create an HTML for an input */
		$html = "";

		/*********
		print the form
		*********/
		/* show title */
		$html .= $this->getTitle();

		/* show topbar */
		$html .= $this->getMenu();

		/* add the form tag */
		$html .= "<form action=\"process_input.php\" method=\"post\">\n";

		/* show vertical table */
		$entityObj = new editEntity($this->nmschema, $this->nmtable, $this->idvalue);
		$html .= $entityObj->createVerticalTable(true, $nmaction);

		/* add additional information */
		$html .= "<input name='nmschema' type='hidden' value='" . $this->nmschema . "' />\n";
		$html .= "<input name='nmtable' type='hidden' value='" . $this->nmtable . "' />\n";

		/* show bottombar */
		$html .= $this->addButtons();

		/* close the form tag */
		$html .= "</form>\n";

		return $html;
	}

	function addButtons(){
		/* add the generic buttons */
		$html = "<input name='action' type='submit' value='Store' />\n";
		$html .= "<input name='action' type='submit' value='Cancel' />\n";
		$html .= "<input name='action' type='submit' value='Delete' />\n";
		return $html;
	}


	/*************************
	getters and setters
	*************************/
	function getHeader($nmtag=null){
		if (empty($nmtag)){
			$nmtag = "header";
		}
		$html = "<" . $nmtag . ">";
		$html .= "</" . $nmtag . ">";
		return $html;
	}
	function getMain($nmtag=null){
		if (empty($nmtag)){
			$nmtag = "main";
		}
		$html = "<" . $nmtag . ">";
		$html .= "</" . $nmtag . ">";
		return $html;
	}
	function getFooter($nmtag=null){
		if (empty($nmtag)){
			$nmtag = "footer";
		}
		$html = "<" . $nmtag . ">";
		$html .= "</" . $nmtag . ">";
		return $html;
	}
	function getTitle(){
		return "<h1>" . $this->nmtitle . "</h1>\n";
	}
	function setTitle($nmtitle){
		$this->nmtitle = $nmtitle;
	}
	function setMenu($ftmenu){
		$this->ftmenu = $ftmenu;
	}
	function getMenu(){
		if (empty($this->ftmenuoptions)){
			return "";
		} else {
			$fturl = "nmschema=" . $this->nmschema . "&nmtable=" . $this->nmtable . "&";
			foreach ($this->ftmenuoptions as $ftmenuoption){
				$this->ftmenu .= "<a href='generic.php?" . $fturl . "nmaction=" . strtolower($ftmenuoption) . "'>" . $ftmenuoption . "</a>";
			}
			return $this->ftmenu;
		}
	}


}
?>