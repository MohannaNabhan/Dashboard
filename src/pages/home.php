<?php

@$articles = new Articles();
@$users = new Users();
@$workers = new Workers();
@$payments = new Payments();


@$worker_section = "";
@$session = new Session();
@$login = $session->get_worker($_SESSION['email']);



@$stadistic =  new stadistic();
@$list = $stadistic->get_all_info_visits();

$aa = strlen(explode('@',$login->user_email)[0]) > 11 ? mb_substr(explode('@',$login->user_email)[0], 0, 11, 'UTF-8')."..."  : explode('@',$login->user_email)[0];

$rank = "";
if($login->user_rank == 0){
    $rank = "Worker bu";
}else if($login->user_rank == 1){
    $rank = "Admin 👮‍♂️";
}else if($login->user_rank > 2){
    $rank = "Owner  👮‍♂️";
}   
$k = $list[0]->visit_january+$list[0]->visit_february+$list[0]->visit_march+$list[0]->visit_april+$list[0]->visit_may+$list[0]->visit_june+$list[0]->visit_july+$list[0]->visit_august+$list[0]->visit_september+$list[0]->visit_october+$list[0]->visit_november+$list[0]->visit_december;


$eek =  array_reverse($payments->get_all_payments());

$last_paymets = "";
$payments_count = count($eek) < 4 ? count($eek) : 4;
if(count($eek) > 1){
    for ($i=0; $i < $payments_count; $i++) { 
        $aerr = strlen($eek[$i]->invoice_product) > 17 ? mb_substr($eek[$i]->invoice_product, 0, 17, 'UTF-8')."..."  : $eek[$i]->invoice_product;
        $status = "";
        if((int)$eek[$i]->invoice_status < 1){
            $status = '<i class="text-color-error icon fad fa-exclamation-triangle"></i>';
        }else if((int)$eek[$i]->invoice_status < 2){  
            $status = '<i style="opacity: 0.8;" class="text-color-warn icon fad fa-watch"></i>';
        }else if((int)$eek[$i]->invoice_status < 3){
            $status = '<i class="text-color-good icon fad fa-badge-check"></i>';
        }else{
            $status = '<i class="text-color-error icon fad fa-exclamation-triangle"></i>';
        }
        $last_paymets .= '
        <div class="payments-items">
            '.$status.'
            <h1>'.$aerr.' <span class="text-color-good" style="position:relative; font-size:15px; top:-4px;">+'.$eek[$i]->invoice_price.'$</span> </h1>     
            <a href="'.BASE_URL.'?p=Payments"><i class="fad fa-angle-right"></i></a>               
        </div>
        ';
    }
}else{
    $last_paymets = '
    <div class="payments-items">
        <i class="icon fad fa-user-clock"></i>
        <h1>View More Information</h1>     
        <a href="'.BASE_URL.'?p=Payments"><i class="fad fa-angle-right"></i></a>               
    </div>
    ';
}

echo '
    <link rel="stylesheet" href="./css/home.css">
    <section id="pl-1" class="container">
        <div class="information-back">
            <i class="fad fa-user"></i>
            <h1>Total Users</h1>
            <h2>'.count($users->get_all_users()).'</h2>
            <a href="'.BASE_URL.'?p=Users"><i class="fad fa-angle-right"></i></a>
        </div>
        <div class="information-back">
            <i class="fad fa-receipt"></i>
            <h1>Total Payments</h1>
            <h2>'.count($eek).'</h2>
            <a href="'.BASE_URL.'?p=Payments"><i class="fad fa-angle-right"></i></a>
        </div>
        <div class="information-back">
            <i class="fad fa-user-hard-hat"></i>
            <h1>Total Workers</h1>
            <h2>'.count($workers->get_all_workers()).'</h2>
            <a href="'.BASE_URL.'?p=Workers"><i class="fad fa-angle-right"></i></a>
        </div>
        <div class="information-back">
            <i class="fad fa-shopping-bag"></i>
            <h1>Total Article</h1>
            <h2>'.count($articles->get_all_articles()).'</h2>
            <a href="'.BASE_URL.'?p=Articles"><i class="fad fa-angle-right"></i></a>
        </div>
    </section>
    <section id="pl-2" class="container">
        <div class="panel-a">
            <i class="fad fa-eye">
            </i><h1>Unique Visitors</h1>
            <h2>'.$k.'</h2>
            <div id="view-visitors">
            
            </div>
        </div>
        <div class="panel-b">
            <div class="welcome-back">
                <h1>👋Hello Welcome... '.$rank.' <span>@'.$aa.'</span></h1>
            </div>
            
            <div class="payments-back">
                <div class="payments-title">
                    <h1>Recent Payments</h1>
                </div>
                '.$last_paymets.'
            </div>
            
        

        </div>
        
    </section>

    <script>
        const year = ["'.$list[0]->visit_january.'","'.$list[0]->visit_february.'","'.$list[0]->visit_march.'","'.$list[0]->visit_april.'","'.$list[0]->visit_may.'","'.$list[0]->visit_june.'","'.$list[0]->visit_july.'","'.$list[0]->visit_august.'","'.$list[0]->visit_september.'","'.$list[0]->visit_october.'","'.$list[0]->visit_november.'","'.$list[0]->visit_december.'"];
        var options = function(type,title, height, numbers , color){
            return {     
              chart: {
                height: "87%",
                width: "100%",
                type: type,
                sparkline: {
                  enabled: true
                },
                toolbar: {
                  show: false,
                 },
              },
              grid: {
                  show: false,
                  padding: {
                      top: 0,
                      right: 0,
                      bottom: 0,
                      left: 0    
                  }
              },
              dataLabels: {
                enabled: false
              },
              legend: {
                  show: false,
              },
              series: [
              {
                  name: title,
                  data: numbers
              }
              ],    
              fill: {
                colors: [color],
              },
              stroke:{
                  colors: [color],
                  width: 3
              },    
              yaxis: {
                  show: false,        
              }, 
              xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],
                title: {
                  text: "Month"
                },
                show: false,
                labels: {
                    show: false,
                },   
                axisBorder: {
                  show: false,        
                },   
                tooltip: {
                    enabled: false,
                }
              }
              
            };
          }
        
        
        
        
        var chart = new ApexCharts(document.querySelector("#view-visitors"), options("area","Page View",0,year,"#99F6FF"));
        chart.render();
    </script>
';






