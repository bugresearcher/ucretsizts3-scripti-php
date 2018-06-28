<?php


$ayar = include('ayar.php');

define('6755682621', TRUE);



function ceklanveriyi(){

  if(isset($_GET['sayfa'])){

    switch ($_GET['sayfa']) {

      case 'anasayfa':

        include('sayfa/anasayfa.php');

        break;



      case 'sunuculistesi':

        include('sayfa/serverlistesi.php');

        break;



      case 'sunucuolustur':

          include('sayfa/sunucuolustur.php');

          break;



      default:

        include('sayfa/404.php');

        break;

    }

  }else{

    include('sayfa/anasayfa.php');

  }

}

?>



<html>

  <head>

    <title><?php echo $ayar->getir->basligimiz; ?> > TeamSpeak 3 Oluşturma Sistemi</title>

    <link rel="Shortcut Icon" href="http://tsbakkali.net/images/tg/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://use.fontawesome.com/113608e34e.js"></script>

  </head>

  <body>

   <body background="arkaplan.png">

    <div class="jumbotron text-center">

      <h1><?php echo $ayar->getir->baslik; ?></h1>

      <p><?php echo $ayar->getir->baslik2; ?></p>

    </div>



    <div class="container">

      <div class="row">

        <div class="col-sm-3">

          <div class="panel panel-default">

            <div class="panel-heading">Linkler</div>

            <div class="list-group">

              <a class="list-group-item" href="?sayfa=anasayfa"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Ana Sayfa</a>

              <a class="list-group-item" href="?sayfa=sunuculistesi"><i class="fa fa-server fa-fw" aria-hidden="true"></i>&nbsp; Server Listesi</a>

              <a class="list-group-item" href="?sayfa=sunucuolustur"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Sunucu Oluştur</a>

              <a class="list-group-item" target="_blank" href="http://bugresearcher.com"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp; Forum</a>


            </div>

          </div>

        </div>

        <div class="col-sm-9">

          <?php ceklanveriyi(); ?>

        </div>

      </div>

    </div>

  </body>

</html>

