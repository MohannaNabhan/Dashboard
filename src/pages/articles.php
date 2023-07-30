<?php


$articles = new Articles();


@$section = $_GET['v'];
if($section != null && $section == 1 |  $section == 2 |  $section == 3){
    echo '
        <link rel="stylesheet" href="./css/articles/main.css">
        <section id="pl-1" class="container">
            <a href="'.BASE_URL.'?p=Articles" class="btn-back">
                <i class="fad fa-angle-left"></i>
            </a>
            <div class="info-articles-back">
                <i class="fad fa-shopping-bag"></i>
                <h1>Total Articles</h1>
                <h2>'.count($articles->get_all_articles()).'</h2>
            </div>    
            <div class="info-articles-back">
                <i class="fad fa-barcode-read"></i>
                <h1>Total Promo Code</h1>
                <h2>'.count($articles->get_all_promo_code()).'</h2>
            </div>      
            <div class="info-articles-back">
                <i class="icon fad fa-books"></i>
                <h1>Total Category</h1>
                <h2>'.count($articles->get_all_category()).'</h2>
            </div> 
            <div class="search-bar-back">
                <i class="fad fa-search"><div class="line"></div></i>
                <input type="text" id="search-box" placeholder="Search Name">
                <i id="delete-search" class="fad fa-times"><div class="line"></div></i>
            </div>
        </section>
    ';
}
if($section == null){
    echo '
        <link rel="stylesheet" href="./css/articles/select.css">
        <section id="pl-1" class="container">
            <a href="'.BASE_URL.'?p=Articles&v=1" class="select-item-back">
                <i class="fad fa-shopping-bag"></i>
                <h1>Edit Articles</h1>
                <p>Here you can edit, create and modify the items found in the store.</p>
            </a>
            <a href="'.BASE_URL.'?p=Articles&v=2" class="select-item-back">
                <i class="icon fad fa-books"></i>
                <h1>Edit Category</h1>
                <p>Here you can manage the categories of your online store.</p>
            </a>
            <a href="'.BASE_URL.'?p=Articles&v=3" class="select-item-back">
                <i class="fad fa-barcode-read"></i>
                <h1>Edit Promo Code</h1>
                <p>Here you can manage the discount coupons of your online store.</p>
            </a>
        </section>
    ';
}else if($section == 1){
    echo '
        <i id="add-new-article" class="fad fa-plus view-data"><h1 class="Window-pop-module" hidden>Add New Article</h1></i>
        <link rel="stylesheet" href="./css/articles/module1.css">
        <section id="pl-2" class="container">
    ';
    foreach ( $articles->get_all_articles() as $items){
        $img="";
        $stock = "";
        if((int)$items->article_stock < 1){
            $stock = "SOLD";
        }else{
            $stock = $items->article_stock;
        }


        $a  = strlen($items->article_name) > 17 ? mb_substr($items->article_name, 0, 17, 'UTF-8')."..." : $items->article_name;
        $b  = strlen($items->article_desc) > 17 ? mb_substr($items->article_desc, 0, 17, 'UTF-8')."..." : $items->article_desc;
        $c = $items->article_category != ""  ? $items->article_category : "none";
        if($items->article_img  != "img/shop/"){
            $img = '<img class="imagen-article" src="./'.$items->article_img.'">';
        }else{
            $img = '<i class="icon fad fa-boot"></i>';
        }
        echo '
                <div class="article-item-back view-data"> 
                    <h1 class="article-id" hidden>'.$items->article_id.'</h1>  
                    <h1 class="article-name" hidden>'.$items->article_name.'</h1>  
                    <h1 class="article-price" hidden>'.$items->article_price.'</h1>  
                    <h1 class="article-desc" hidden>'.$items->article_desc.'</h1>  
                    <h1 class="article-stock" hidden>'.$items->article_stock.'</h1>  
                    <h1 class="article-img" hidden>'.$items->article_img.'</h1>    
                    <h1 class="article-category" hidden>'.strtoupper($c).'</h1>  
                    <h1 class="Window-pop-module" hidden>View Article</h1>
                    '.$img.'
                    <h2>'.$items->article_price.' <i class="fad fa-usd-circle"></i></h2> 
                    <h3>'.$stock.' <i class="fad fa-boxes"></i></h3>
                    <h1>'.$a.'</h1>
                    <p>'.$b.'</p>
                    
                    <h4 style="bottom:10px !important;">#'. strtoupper($c).'</h4>
                </div>
        ';
    }
    echo '
        </section>
        <script src="./js/articles_items.js"></script>
    ';
}else if($section == 2){
    echo'
        <i id="add-new-article" class="fad fa-plus view-data"><h1 class="Window-pop-module" hidden>Add New Category</h1></i>
        <link rel="stylesheet" href="./css/articles/module2.css">
        <section id="pl-2" class="container">
    ';    


    foreach ( $articles->get_all_category() as $items){
        
        echo'
                <div class="category-item-back view-data">    
                    <h1 class="Window-pop-module" hidden>View Category</h1>    
                    <h1 class="category-id" hidden>'.$items->category_id.'</h1>   
                    <h1 class="category-name" hidden>'.$items->category_name.'</h1>      
                    <i class="icon fad fa-books"></i>
                    <h1>'.$items->category_name.'</h1>
                    <h2>View Information</h2>
                </div>
        ';
    }
    echo'
        </section>
        <script src="./js/articles_category.js"></script>
    ';
    
}else if($section == 3){
    echo'
        <i id="add-new-article" class="fad fa-plus view-data"><h1 class="Window-pop-module" hidden>Add New Promo</h1></i>
        <link rel="stylesheet" href="./css/articles/module3.css">
        <section id="pl-2" class="container">
    ';    
    foreach ( $articles->get_all_promo_code() as $items){
        $discount = "";
        if((int)$items->promo_limits > 0){
            $discount = (int)$items->promo_used." / ".(int)$items->promo_limits; 
        }else{
            $discount = (int)$items->promo_used." / UNLIMITED";
        }
        echo'
                <div class="category-item-back view-data">    
                    <h1 class="Window-pop-module" hidden>View Promo</h1>    
                    <h1 class="promo-id" hidden>'.$items->promo_id.'</h1>   
                    <h1 class="promo-name" hidden>'.$items->promo_name.'</h1>     
                    <h1 class="promo-discount" hidden>'.$items->promo_discount.'</h1>     
                    <h1 class="promo-limit" hidden>'.$items->promo_limits.'</h1>     
                    <i class="fas fa-barcode"></i>
                    <h1>'.$items->promo_name.' <span>'.$items->promo_discount.'%</span></h1>
                    <h2>Used: '.$discount.'</h2>
                </div>
        ';
    }
    echo'
        </section>
        <script src="./js/articles_promo.js"></script>
    ';
    
}else{
    echo '<meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles">';
}




