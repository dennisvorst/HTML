<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlObjectTest extends TestCase
{
    public function testClassLibraryExists()
    {
        $this->assertTrue(class_exists("HtmlObject"));
    }

    public function testClassLibraryCanBeInstantiated()
    {
        $object = new HtmlObject("A", []);
        $this->assertInstanceOf(HtmlObject::class, $object);
    }
}
?>