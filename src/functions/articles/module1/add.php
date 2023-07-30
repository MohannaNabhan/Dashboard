<?php
  
  if($_POST['article-name'] != "" && $_POST['article-price'] != ""  && @$_SESSION['autenticado']){
    $articles = new Articles();
    $main = new main();
    $targetFile ="";
    

    
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $targetDir = "img/shop/";
        $targetFile = $targetDir . $main->randomNumber(6).".png";
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
      
        if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if ($check === false) {
            echo "El archivo no es una imagen válida.";
            $uploadOk = false;
          }
        }
    
   
      
        if ($_FILES["image"]["size"] > 4 * 1024 * 1024) {
          $uploadOk = false;
        }
      
        if ($imageFileType !== "png") {
          echo "Lo siento, solo se permiten archivos PNG";
          $uploadOk = false;
        }
      
        if ($uploadOk === false) {
          echo "Lo siento, tu imagen no fue subida.";
        } else {
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "La imagen " . basename($_FILES["image"]["name"]) . " ha sido subida con éxito.";
            
            $articles->add_new_article(strtolower($_POST['article-name']),$_POST['article-price'],strtolower($_POST['article-desc']),$_POST['article-stock'],$targetFile, strtolower($_POST["selectedLanguage"]));
            echo '<meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=1">';

          } else {
            echo "Lo siento, hubo un error al subir tu imagen.";
          }
        }
    }else{
      $articles->add_new_article(strtolower($_POST['article-name']),$_POST['article-price'],strtolower($_POST['article-desc']),$_POST['article-stock'],"img/shop/", strtolower($_POST["selectedLanguage"]));
      echo '<meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=1">';
    }




}else{
    echo '
    <html>
        <head>
            <meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=1">
        </head>
    </html>
    ';
} 
