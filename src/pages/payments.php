<?php

@$payments = new payments();

$total_money_error = 0;
$total_money_waiting = 0;
$total_money_completed = 0;

$total_payments_error = 0;
$total_payments_warning = 0;
$total_payments_completed = 0;


foreach ( $payments->get_all_payments() as $items){
    if((int)$items->invoice_status < 1){
        $total_money_error += (float)$items->invoice_price;
    }else if((int)$items->invoice_status < 2){
        $total_money_waiting += (float)$items->invoice_price;
    }else if((int)$items->invoice_status < 3){
        $total_money_completed += (float)$items->invoice_price;
    }
    if((int)$items->invoice_status < 1){
        $total_payments_error += 1;
    }else if((int)$items->invoice_status < 2){
        $total_payments_warning += 1;
    }else if((int)$items->invoice_status < 3){
        $total_payments_completed += 1;
    }
}


echo '
    <link rel="stylesheet" href="./css/payments.css">
        <section id="pl-1" class="container">
            <div class="info-articles-back">
                <i class="fad fa-receipt"></i>
                <h1>Total Payments</h1>
                <h2>'.count($payments->get_all_payments()).'</h2>
            </div>    
            <div class="info-articles-back">
                <i class="text-color-error fad fa-exclamation-triangle"></i>
                <h1>Total Money [<span class="text-color-error ">Error</span>]</h1>
                <h2>'.$total_money_error.'$</h2>
            </div>     
            <div class="info-articles-back">
                <i style="opacity: 0.8;" class="text-color-warn fad fa-watch"></i>
                <h1>Total Money [<span class="text-color-warn ">Waiting</span>]</h1>
                <h2>'.$total_money_waiting.'$</h2>
            </div>       
            <div class="info-articles-back">
                <i class="text-color-good fad fa-badge-check"></i>
                <h1>Total Money [<span class="text-color-good ">Completed</span>]</h1>
                <h2>'.$total_money_completed.'$</h2>
            </div>
            <div class="search-bar-back">
                <i class="fad fa-search"><div class="line"></div></i>
                <input type="text" id="search-box" placeholder="Search Payments">
                <i id="delete-search" class="fad fa-times"><div class="line"></div></i>
            </div>
        </section>
        <section id="pl-2" class="container">
            <h1 class="payments-status-back" style="background-color: rgba(  212, 230, 241  , 0.6); border: solid 2px rgb(108, 143, 165,0.6);">ALL ['.count($payments->get_all_payments()).']</h1>
            <h1 class="payments-status-back" style="background-color: rgba( 217, 136, 128 , 0.4); border: solid 2px rgb( 217, 136, 128 ,0.6);">ERROR ['.$total_payments_error.']</h1>
            <h1 class="payments-status-back" style="background-color: rgba(236, 170, 62, 0.4); border: solid 2px rgb(165, 130, 73,0.6);">WAITING ['.$total_payments_warning.']</h1>
            <h1 class="payments-status-back" style="background-color: rgb(88, 214, 141,0.4); border: solid 2px rgb(62, 155, 101,0.6);">COMPLETED ['.$total_payments_completed.']</h1>
        </section>
';
echo '
    <section id="pl-3" class="container">
'; 

// status
// completed // waiting // error
// 2         //  1      // 0

foreach (  array_reverse($payments->get_all_payments()) as $items){
    $status = "";
    if((int)$items->invoice_status < 1){
        $status = "error";
    }else if((int)$items->invoice_status < 2){
        $status = "waiting";
    }else if((int)$items->invoice_status < 3){
        $status = "completed";
    }else{
        $status = "error";
    }
    $a = strlen($items->invoice_product) > 27 ? mb_substr($items->invoice_product, 0, 17, 'UTF-8')."..."  : $items->invoice_product;

    echo '
        <div class="payment-item-back view-data">
            <i class="payment-item-icon fad fa-money-check"></i>
            <h1 class="payment-item-title">'.$items->user_account.'<span class="'.$status.'">'.strtoupper($status).'</span></h1>
            <h1 class="payment-item-article">'.$a.'  <span class="text-color-good" style="position:relative; font-size:15px; top:-2px;">+'.$items->invoice_price.'$</span></h1>
            <i class="payment-item-btn fad fa-plus">
                <h1 class="Window-pop-module" hidden>View Payment</h1> 

                <h1 class="user-account" hidden>'.$items->user_account.'</h1>     
                <h1 class="invoice-status" hidden>'.$items->invoice_status.'</h1>     
                <h1 class="invoice-promo" hidden>'.$items->invoice_promo.'</h1>     
                <h1 class="invoice-discount" hidden>'.$items->invoice_discount.'</h1>     
                <h1 class="invoice-id" hidden>'.$items->invoice_id.'</h1>     
                <h1 class="invoice-product" hidden>'.$items->invoice_product.'</h1>     
                <h1 class="invoice-price" hidden>'.$items->invoice_price.'</h1>     
                <h1 class="invoice-account-email" hidden>'.$items->invoice_account_email.'</h1>     
                <h1 class="invoice-account-id" hidden>'.$items->invoice_account_id.'</h1>     
                <h1 class="invoice-client-name" hidden>'.$items->invoice_client_name.'</h1>     
                <h1 class="invoice-payment-id" hidden>'.$items->invoice_payment_id.'</h1>     
                <h1 class="invoice-payment-price" hidden>'.$items->invoice_payment_price.'</h1>     
                <h1 class="invoice-payment-created" hidden>'.$items->invoice_payment_created.'</h1>     
                <h1 class="invoice-payment-updated" hidden>'.$items->invoice_payment_updated.'</h1>     
            </i>
        </div>
    ';
}

echo '
    </section>
    <script src="./js/payments.js"></script>
';
