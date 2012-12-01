<?php


$config = readConfig('../application/configs/config.ini', 'production');
echo ":-)";
// Authenticate on Google Docs and create a Zend_Gdata_Spreadsheets object.            
$service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
$client = Zend_Gdata_ClientLogin::getHttpClient($config['google.user'], $config['google.pass'], $config['google.service']);
$spreadsheetService = new Zend_Gdata_Spreadsheets($client);
 
// The function will echo out a list of spreadsheets in your account            
function DisplaySpreadsheets($feed)
{
    $i = 0;
    foreach($feed->entries as $entry) {
        if ($entry instanceof Zend_Gdata_Spreadsheets_CellEntry) {
        echo $entry->title->text .' '. $entry->content->text . "<br>";
    } else if ($entry instanceof Zend_Gdata_Spreadsheets_ListEntry) {
        echo $i .' '. $entry->title->text .' '. $entry->content->text . "<br>";
    } else {
        echo $i .' '. $entry->title->text . "<br>";
    }
    $i++;
    }
}
 
//The function will create a table of the data from your spreadsheet  
function DisplayWorksheetData($feed)
{
    echo '';
    $rowData = $feed->entries[0]->getCustom();
    echo ""; echo '';
    foreach($rowData as $customEntry)
    { echo ""; }
    echo "";
    $i = 2; // the first row of content is row 2
    foreach($feed->entries as $row)
    { echo "";
    $i++;
    $rowData = $row->getCustom();
    foreach($rowData as $customEntry)
    { echo ""; }
	 echo ""; 
	}
	echo '
<table style="width: 200px;" border="1">
<tbody>
<tr>
<td>Row Number</td>
<td>' . $customEntry->getColumnName() . '</td>
</tr>
<tr>
<td>Row ' . $i ." ". $row->title->text . "</td>
<td>" . $customEntry->getText(). "</td>
</tr>
</tbody>
</table>
";
}

echo ":-)";

// First echo a list of your Google Spreadsheets
 
$feed = $spreadsheetService->getSpreadsheetFeed();

print_r($spreadsheetService);

echo "
<h1>List of all your Spreadsheets</h1>
";
DisplaySpreadsheets($feed);

// echo the content of a specific Spreadsheet/Worksheet
// set a query to return a worksheet and echo the contents of the worksheet
 
$query = new Zend_Gdata_Spreadsheets_ListQuery();
$query->setSpreadsheetKey($GSheetID);
$query->setWorksheetId($worksheetID);
$listFeed = $spreadsheetService->getListFeed($query);
 
echo "<br><br>";
echo "
<h1>List of data in your Spreadsheet</h1>
";
DisplayWorksheetData($listFeed);
