<?php

  // The names of the root node and the node that will contain a row
  $root_element = "packages";
  $row_element = "package";

  // Create the DOMDocument and the root node
  $dom = new DOMDocument('1.0', 'utf-8');
  $rootNode = $dom->appendChild($dom->createElement($root_element));

  // Loop the DB results
  while ($row = mysql_fetch_assoc($result)) {

    // Create a row node
    $rowNode = $rootNode->appendChild($dom->createElement($row_element));

    // Loop the columns
    foreach ($row as $col => $val) {

      // Create the column node and add the value in a CDATA section
      $rowNode->appendChild($dom->createElement($col))
              ->appendChild($dom->createCDATASection($val));

    }

  }

  // Output as string
  echo $dom->saveXML();

  ?>