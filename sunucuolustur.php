<?php

$cfg = include('config.php');

if(!defined('6755682621')) {

   die('Direct access not permitted');

}

if(isset($_POST['submit'])){

  if(isset($_POST['servername']) && isset($_POST['slots']) && is_numeric($_POST['slots']) && $_POST['slots'] == floor($_POST['slots']) && $_POST['slots'] <= $cfg->appSettings->maxSlots){

    $ts3_ServerInstance = TeamSpeak3::factory("serverquery://".$cfg->teamspeakInfo->username.":".$cfg->teamspeakInfo->password."@".$cfg->teamspeakInfo->host.":".$cfg->teamspeakInfo->portQuery);

    $ts3_NewServer = $ts3_ServerInstance->serverCreate(array(

     "virtualserver_name" => $_POST['servername'],

     "virtualserver_maxclients" => $_POST['slots'],

    ));

    echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>TeamSpeak 3 Sunucunuz Oluşturuldu !</strong><br>Token: <a href="ts3server://'.$ts3_ServerInstance->getAdapterHost().':'.$ts3_NewServer['virtualserver_port'].'?token='.$ts3_NewServer['token'].'" class="alert-link">'.$ts3_NewServer['token'].'</a><br>IP: <a href="ts3server://'.$ts3_ServerInstance->getAdapterHost().':'.$ts3_NewServer['virtualserver_port'].'?token='.$ts3_NewServer['token'].'" class="alert-link">'.$ts3_ServerInstance->getAdapterHost().':'.$ts3_NewServer['virtualserver_port'].'</a>.</div>';

  } else {

    echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Oh snap!</strong> Something went wrong. Change a few things up and try it again.</div>';

  }

}

?>



<div class="panel panel-default">

  <div class="panel-heading">Sunucu Oluştur</div>

  <div class="panel-body">

<form class="form-horizontal" action="" method="post">

  <fieldset>

    <div class="form-group">

      <label for="inputServername" class="col-lg-2 control-label">Sunucu Ismi</label>

      <div class="col-lg-10">

        <input required type="text" class="form-control" id="inputServername" name="servername" placeholder="Sancaklar Tim">

      </div>

    </div>

    <div class="form-group">

      <label for="select" class="col-lg-2 control-label">Slot</label>

      <div class="col-lg-10">

        <select class="form-control" required name="slots" id="select">

          <?php

          for ($i = 1; $i <= $cfg->appSettings->maxSlots; $i++) {

            echo '<option value="'.$i.'">'.$i.'</option>';

          }

          ?>

        </select>

      </div>

    </div>

    <div class="form-group">

      <div class="col-lg-10 col-lg-offset-2">

        <input type="submit" class="btn btn-primary" name="submit" value="Oluştur">

      </div>

    </div>

  </fieldset>

</form>

</div>

</div>

