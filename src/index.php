<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "class/HtmlUrlElement.php";
require_once "class/HtmlTable.php";
//require_once "class/HtmlTableRow";
require_once "class/HtmlTableRowCollection.php";
require_once "class/HtmlTableCellCollection.php";

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
	<!-- set the UTF-8 properties -->
	<!-- as defined in : https://www.toptal.com/php/a-utf-8-primer-for-php-and-mysql -->
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>HTML classes</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- initiate font awesome -->
    <link rel="stylesheet" href="3rd/css/font-awesome.min.css">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="css/style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="css/style.responsive.css" media="all">


	<style>
	.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
    .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
    .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
    </style>
</head>
<body>
<h1>Hyperlink</h1>
<p><?php
//    $hyperlink = new HtmlUrlElement(["href" => "https://getbootstrap.com/", "mow" => "mow"], "Bootstrap");
//    $hyperlink = new HtmlUrlElement(["href" => "https://getbootstrap.com/", "target" => "_flurp"], "Bootstrap");
    $hyperlink = new HtmlUrlElement(["href" => "https://getbootstrap.com/", "target" => "_blank"], "Bootstrap");
    echo $hyperlink->Show();
?></p>

<h1>Table</h1>
<?php

$rowCollection = new HtmlTableRowCollection();

/** row 1 */
$cellCollection = new HtmlTableCellCollection();
$cellCollection->createCell("#", ["scope" => "col"], "th");
$cellCollection->createCell("First", ["scope" => "col"], "th");
$cellCollection->createCell("Last", ["scope" => "col"], "th");
$cellCollection->createCell("Handle", ["scope" => "col"], "th");
$row = new HtmlTableRow($cellCollection);
$rowCollection->addHeader($row);

/** row 2 */
$cellCollection = new HtmlTableCellCollection();
$cellCollection->createCell("1", ["scope" => "row"]);
$cellCollection->createCell("Mark");
$cellCollection->createCell("Otto");
$cellCollection->createCell("@mdo");
$row = new HtmlTableRow($cellCollection);
$rowCollection->addRow($row);

/** row 3 */
$cellCollection = new HtmlTableCellCollection();
$cellCollection->createCell("2", ["scope" => "row"]);
$cellCollection->createCell("Jacob");
$cellCollection->createCell("Thornton");
$cellCollection->createCell("@fat");
$row = new HtmlTableRow($cellCollection);
$rowCollection->addRow($row);

/** row 4 */
$cellCollection = new HtmlTableCellCollection();
$cellCollection->createCell("3", ["scope" => "row"]);
$cellCollection->createCell("Larry");
$cellCollection->createCell("the Bird");
$cellCollection->createCell("@twitter");
$row = new HtmlTableRow($cellCollection);
$rowCollection->addRow($row);

$table = new HtmlTable($rowCollection);
echo $table->show();
?>

<h1>test</h1>
<?php
$htmlCell = new HtmlTableCell("Value", ["colspan" => "2", "rowspan" => "3", "headers" => "someHeader", "class"  => "someClass", "Flurp" => "flarp"]);
echo $htmlCell->getElement();


// $arr1 = ["colspan" => "2", "rowspan" => "3", "headers" => "someHeader", "class"  => "someClass", "Flupr" => "flarp"];
// $arr2 = ["colspan", "rowspan", "headers"];

// print_r(array_intersect_key(array_keys($arr1), $arr2));
?>



</body>
</html>