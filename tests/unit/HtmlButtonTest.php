<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlButtonTest extends TestCase
{
    public function testClassHtmlButtonExists()
    {
        $this->assertTrue(class_exists("HtmlButton"));
    }

    public function testClassCanBeInstatiated()
    {
        $object = new HtmlButton();
        $this->assertInstanceOf(HtmlButton::class, $object);
    }

    public function testClassHtmlButtonAllowsNullParameters()
    {
        $object = new HtmlButton();
		$actual = $object->getElement();
        $expected = "<button></button>";
        $this->assertEquals($expected, $actual);
    }

    public function testClassHtmlFormAllowsMultipleParameters()
    {
        $object = new HtmlButton(["id" => "myTable", "style" => "someStyle"]);
        $object->setContent("Push me");

        $actual = $object->getElement();
        $expected = "<button id='myTable' style='someStyle'>Push me</button>";
        $this->assertEquals($expected, $actual);
    }
}
?>