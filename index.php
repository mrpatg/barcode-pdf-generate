<?php
require 'vendor/autoload.php';

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
//echo $generator->getBarcode('HI-HEATHER-IM-A-BARCODE', $generator::TYPE_CODE_39);


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


$rows = 5;
$count = 0;
$row_count = 0;
$text = 'BLIB-';
$tbl .= '
<style>
.item-container{
    text-align:center;
}
.bc_container{
    margin-top:20px;
}
.bc_container div{

}
</style>';
while ($count < 572 ){
$count++;
$row_count++;

$tbl .= '
<table cellspacing="0" cellpadding="1" border="1" style="width:100%;">
    <tr>
        <td width="50%" class="item-container"><span class="bc_container">'.$generator->getBarcode($text.str_pad($count,4,"0",STR_PAD_LEFT), $generator::TYPE_CODE_39, 1).'</span><br>'.str_pad($count,4,"0",STR_PAD_LEFT).'</td>';
        $count++;
$tbl .='<td width="50%" class="item-container"><span class="bc_container">'.$generator->getBarcode($text.str_pad($count,4,"0",STR_PAD_LEFT), $generator::TYPE_CODE_39, 1).'</span><br>'.str_pad($count,4,"0",STR_PAD_LEFT).'</td>
    </tr>
</table>';

}
$dompdf->loadHtml($tbl);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>