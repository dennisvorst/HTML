<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlUrlElementTest extends TestCase
{
    public function testClassHtmlElementExists()
    {
        $this->assertTrue(class_exists("HtmlUrlElement"));
    }

    public function testClassHtmlElementCanBeInstantiated()
    {
        $object = new HtmlUrlElement([], "some value");
        $this->assertInstanceOf(HtmlUrlElement::class, $object);
    }

    public function testCanCreateUrlElement()
    {
        $attributes = ["href" => "index.php"];
        $expected = "<a href='index.php'>some value</a>";
        $object = new HtmlUrlElement($attributes, "some value");
        print_r($object->Show());        
        $this->assertEquals($expected, $object->Show());
    }

}
?>