<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlElementTest extends TestCase
{
    public function testClassHtmlElementExists()
    {
        $this->assertTrue(class_exists("HtmlElement"));
    }

    public function testClassHtmlElementCanBeInstantiated()
    {
        $object = new HtmlElement("A", []);
        $this->assertInstanceOf(HtmlElement::class, $object);
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testTagElementIsMandatory()
    {
        $this->expectException('InvalidArgumentException');
        $object = new HtmlElement("", []);
    }
}
?>