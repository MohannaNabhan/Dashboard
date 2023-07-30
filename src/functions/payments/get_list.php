<?php



@$payments  = new payments();

echo "<p id='text-msg'>";
$convert = json_encode( array_reverse($payments->get_all_payments()), JSON_FORCE_OBJECT);
echo $convert;
echo "</p>";
echo "<p id='total'>".count($payments->get_all_payments())."</p>";