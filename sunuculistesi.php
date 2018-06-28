<?php

if(!defined('6755682621')) {

   die('Direct access not permitted');

}

?>

<div class="panel panel-default">

  <table class="table table-striped table-hover ">

    <thead>

      <tr>

        <th>ID</th>

        <th>Sunucu Ismi</th>

        <th>IP</th>

        <th>Online</th>

      </tr>

    </thead>

    <tbody>

      <?php

      $cfg = include('config.php');

      $ts3_ServerInstance = TeamSpeak3::factory("serverquery://".$cfg->teamspeakInfo->username.":".$cfg->teamspeakInfo->password."@".$cfg->teamspeakInfo->host.":".$cfg->teamspeakInfo->portQuery);

      try {

        foreach($ts3_ServerInstance as $ts3_VirtualServer)

        {

          if($ts3_VirtualServer['virtualserver_status'] == 'online'){

            echo '<tr><td><a href="ts3server://'.$ts3_ServerInstance->getAdapterHost().':'.$ts3_VirtualServer['virtualserver_port'].'">'.$ts3_VirtualServer['virtualserver_id'].'</a></td><td>'.$ts3_VirtualServer['virtualserver_name'].'</td><td>'.$ts3_ServerInstance->getAdapterHost().':'.$ts3_VirtualServer['virtualserver_port'].'</td><td>'.$ts3_VirtualServer['virtualserver_clientsonline'].' / '.$ts3_VirtualServer['virtualserver_maxclients'].'</td></tr>';

          }

        }

      } catch (Exception $e) { }

      ?>

    </tbody>

  </table>

</div>

