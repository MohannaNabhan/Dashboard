<?php



@$articles  = new articles();

echo "<p id='text-msg'>";
$convert = json_encode($articles->get_all_promo_code(), JSON_FORCE_OBJECT);
echo $convert;
echo "</p>";
echo "<p id='total'>".count($articles->get_all_promo_code())."</p>";