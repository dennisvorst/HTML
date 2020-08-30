<?php

class HtmlTableRowCollection {
    private $_headers = [];
	private $_rows = [];
	private $_footers = [];

    function __construct(){}

    function addRow(HtmlTableRow $row) {
        $this->_rows[] = $row;
    }
    function addHeader(HtmlTableRow $row) {
        $this->_headers[] = $row;
    }
    function addFooter(HtmlTableRow $row) {
        $this->_footers[] = $row;
    }

    /** getters and setters */
    function getHeaders() : array
    {
        return $this->_headers;
    }

    function getRows() : array
    {
        return $this->_rows;
    }

    function getFooters() : array
    {
        return $this->_footers;
    }
}