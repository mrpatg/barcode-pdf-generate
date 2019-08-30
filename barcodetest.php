<?php
require 'vendor/autoload.php';

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

echo $generator->getBarcode('HI-HEATHER-IM-A-BARCODE', $generator::TYPE_CODE_39);

?>