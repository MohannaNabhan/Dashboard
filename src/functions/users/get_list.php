<?php



@$users  = new Users();

echo "<p id='text-msg'>";
$convert = json_encode($users->get_all_users(), JSON_FORCE_OBJECT);
echo $convert;
echo "</p>";
echo "<p id='total'>".count($users->get_all_users())."</p>";