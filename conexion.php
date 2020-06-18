<?php
    $host="localhost";
    $port="5432";
    $user="postgres";
    $pass="";
    $dbname="biblioteca-centrall";
    try {
        $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      echo '
            <div class="alert alert-danger text-center" role="alert">'.
              $e->getMessage().
            '</div>
      ';
    }
?>
