<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTableTest extends TestCase
{
    public function testClassHtmlTableExists()
    {
        $this->assertTrue(class_exists("HtmlTable"));
    }

    public function testClassHtmlTableAllowsNullParameters()
    {
        $object = new HtmlTable();
		$actual = $object->getElement();
        $expected = "<table></table>";
        $this->assertEquals($expected, $actual);
    }

    public function testClassHtmlTableAllowsMultipleParameters()
    {
        $object = new HtmlTable(["id" => "myTable", "style" => "someStyle"]);
		$actual = $object->getElement();
        $expected = "<table id='myTable' style='someStyle'></table>";
        $this->assertEquals($expected, $actual);
    }

    public function testShowsTable()
    {
        $object = new HtmlTable(["id" => "myTable", "style" => "someStyle"]);
        $actual = $object->show();
        $expected = "<table class='table'>
		<thead>
		  <tr>
			<th scope='col'>#</th>
			<th scope=col>First</th>
			<th scope='col'>Last</th>
			<th scope='col'>Handle</th>
		  </tr>
		</thead>
		
		<tbody>
		  <tr>
			<th scope='row'>1</th>
			<td>Mark</td>
			<td>Otto</td>
			<td>@mdo</td>
		  </tr>
		  <tr>
			<th scope='row'>2</th>
			<td>Jacob</td>
			<td>Thornton</td>
			<td>@fat</td>
		  </tr>
		  <tr>
			<th scope='row'>3</th>
			<td>Larry</td>
			<td>the Bird</td>
			<td>@twitter</td>
		  </tr>
		</tbody>
	  </table>";
        $this->assertEquals($expected, $actual);
    }
}
?>