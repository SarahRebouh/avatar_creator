<?php

class Avatar{


    public function getFront($param = null){
        global $dbh;

        if ($param !== null) {
          $query = $dbh->query("SELECT * FROM front WHERE param_front = $param ORDER BY RAND()");
        }
        else {
          $query = $dbh->query("SELECT * FROM front  WHERE param_front is null ORDER BY RAND()");
        }
        return $query->fetchAll();
    }
    public function getYeux($param = null){
        global $dbh;

        if ($param !== null) {
          $query = $dbh->query("SELECT * FROM yeux WHERE param_yeux = $param ORDER BY RAND()");
        }
        else {
          $query = $dbh->query("SELECT * FROM yeux  WHERE param_yeux is null ORDER BY RAND()");
        }
        return $query->fetchAll();
    }
    public function getNez(){
        global $dbh;
        $query = $dbh->query("SELECT * FROM nez ORDER BY RAND()");
        return $query->fetchAll();
    }
    public function getBouche($param = null){
        global $dbh;
        if ($param !== null) {
          $query = $dbh->query("SELECT * FROM bouche WHERE param_bouche = $param ORDER BY RAND()");
        }
        else {
          $query = $dbh->query("SELECT * FROM bouche  WHERE param_bouche is null ORDER BY RAND()");
        }
        return $query->fetchAll();
    }
    public function getRandomAvatar(){
        global $dbh;
        $query = $dbh->query("SELECT url_avatar , id_avatar FROM avatar ORDER BY RAND() LIMIT 10 ");
        return $query->fetchall();
    }
    public function getUrlAvatar(){
        global $dbh;
        $query = $dbh->query("SELECT url_avatar FROM avatar ORDER BY id_avatar DESC LIMIT 0,1");
        return $query->fetch()->url_avatar;
    }

    public function getSpecialAvatar(){
      global $dbh;
      $query = $dbh->query("SELECT url_avatar , id_avatar FROM avatar WHERE id_avatar = ".$_GET['id_avatar']."");
      return $query->fetchall();
    }


    public function countAvatar(){
        global $dbh;
        $query = $dbh->query("SELECT count(*) as total from avatar");
        return intval($query->fetch()->total);
    }

    public function setAvatar(){
      global $dbh;
      $count = $this->countAvatar()+1 ;
      $req = $dbh->prepare("INSERT INTO avatar (url_avatar) VALUES (:url_avatar)");
      $req->execute(array(
        "url_avatar" => "http://cyrile.marmier.codeur.online/avatar_creator/view/images/avatar/avatar".$count.".png"
      ));

    }




}
?>
