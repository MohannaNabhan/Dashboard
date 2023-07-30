<?php

@$stadistic = new Stadistic();


echo '
    <link rel="stylesheet" href="./css/stadistic.css">
    <section id="pl-1" class="container">
        <div class="chart-style"><i class="fad fa-eye"></i><h1>Unique Visitors</h1><h2>Visitors per Mothn</h2><div id="view-visitors"></div></div>
            <div class="switch-year-back">
';
foreach ( $stadistic->get_all_info_visits() as $items){
    $total_views = 0;
    $total_views = (int)$items->visit_january + (int)$items->visit_february + (int)$items->visit_march + (int)$items->visit_april + (int)$items->visit_may + (int)$items->visit_june + (int)$items->visit_july + (int)$items->visit_august + (int)$items->visit_september + (int)$items->visit_october + (int)$items->visit_november + (int)$items->visit_december;
    $color_status="";
    if($total_views < 500){
        $color_status="error";
    }else if($total_views < 1000){
        $color_status="warn";
    }else if($total_views > 1000){
        $color_status="good";
    }
    echo '
        <div class="switch-year-item-back">
            <i class="text-color-'.$color_status.' fad fa-wave-sine"></i>
            <h1 class="datas" hidden>'.$items->visit_january.",".$items->visit_february.",".$items->visit_march.",".$items->visit_april.",".$items->visit_may.",".$items->visit_june.",".$items->visit_july.",".$items->visit_august.",".$items->visit_september.",".$items->visit_october.",".$items->visit_november.",".$items->visit_december.'</h1>
            <h1>'.$items->visit_year.'</h1>
            <h2>Unique Views: '.$total_views.'</h2>
        </div>
    ';
}
echo '
            </div> 
    </section>  
    <section id="pl-2" class="container">
    <div class="panel-a">
';
$list = array_reverse($stadistic->get_all_info_list_ip());
$list_count = count($list) < 4 ? count($list) : 4;
for($x = 0;  $x < $list_count; $x++)
{   

    $b = "";
    if($list[$x]->visit_navigator == "fr"){
        $b = '<i class="info-view-icon-2 fab fa-firefox-browser"></i>';
    }else if($list[$x]->visit_navigator == "ch"){
        $b = '<i class="info-view-icon-2 fab fa-chrome"></i>';
    }else if($list[$x]->visit_navigator == "ex"){
        $b = '<i class="info-view-icon-2 fab fa-internet-explorer"></i>';
    } else{
        $b = '<i class="info-view-icon-2 fas fa-compass-slash"></i>';
    }
    echo '
        <div class="info-view-back">
            <i class="info-view-icon fad fa-user-secret"></i>
            <h1>'.$list[$x]->visit_ip.'</h1>
            '.$b.'

        </div>
    ';
}

$fr = 0;
$ch = 0;
$ex = 0;
$no = 0;
for ($i=0; $i < count($list) ; $i++) { 
    if($list[$i]->visit_navigator == "fr"){
        $fr++;
    }else if($list[$i]->visit_navigator == "ch"){
        $ch++;
    }else if($list[$i]->visit_navigator == "ex"){
        $ex++;
    } else{
        $no++;
    }
}
$total = $fr+$ch+$ex+$no;


@$list = $stadistic->get_all_info_visits();



echo '
    </div>
    <div class="panel-b">
        <div class="panel-title">
            <h1>Browser Stats</h1><i class="info-view-icon-2 fab fa-chrome"></i>
        </div>
        <div class="panel-item">
            <i class="fab fa-chrome"></i>
            <h1>Chrome</h1>
            <h2>'.number_format((($ch / $total) * 100), 1).'%</h2>
        </div>
        <div class="panel-item">
            <i class="fab fa-firefox-browser"></i>
            <h1>Firefox</h1>
            <h2>'.number_format((($fr / $total) * 100), 1).'%</h2>
        </div>
        <div class="panel-item">
            <i class="fab fa-internet-explorer"></i>
            <h1>Explorer</h1>
            <h2>'.number_format((($ex / $total) * 100), 1).'%</h2>
        </div>
        <div class="panel-item">
            <i class="fad fa-browser"></i>
            <h1>Unkown</h1>
            <h2>'.number_format((($no / $total) * 100), 1).'%</h2>
        </div>
    </div>
    </section>
    <script>const year = ["'.$list[0]->visit_january.'","'.$list[0]->visit_february.'","'.$list[0]->visit_march.'","'.$list[0]->visit_april.'","'.$list[0]->visit_may.'","'.$list[0]->visit_june.'","'.$list[0]->visit_july.'","'.$list[0]->visit_august.'","'.$list[0]->visit_september.'","'.$list[0]->visit_october.'","'.$list[0]->visit_november.'","'.$list[0]->visit_december.'"];</script>
    <script src="./js/stadistic.js"></script>
';
