<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlFormTest extends TestCase
{
    public function testClassHtmlFormExists()
    {
        $this->assertTrue(class_exists("HtmlForm"));
    }

    public function testClassHtmlFormAllowsNullParameters()
    {
        $object = new HtmlForm();
		$actual = $object->getElement();
        $expected = "<form></form>";
        $this->assertEquals($expected, $actual);
    }

    public function testClassHtmlFormAllowsMultipleParameters()
    {
        $object = new HtmlForm(["id" => "myTable", "style" => "someStyle"]);
		$actual = $object->getElement();
        $expected = "<form id='myTable' style='someStyle'></form>";
        $this->assertEquals($expected, $actual);
    }
}
?>