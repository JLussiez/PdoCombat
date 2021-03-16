<?php

class Personnage{

   private $_id;
   private $_nom;
   private $_attaque;
   private $_vie;
   private $_pdo;
   private $_sac;
   //méthode
   public function __construct($id,$pdo){
      $this->_id = $id;
      $this->_pdo = $pdo;

      $req = "select * from Personnage where ID = '".$this->_id."'";
      $Resul = $pdo->query($req);
      if($tab = $Resul->fetch()){
         $this->_nom = $tab['Nom'];
      }
      //sac
      $req = "SELECT `ID_Arme` from Equipement,Personnage WHERE Personnage.ID = Equipement.ID_Personnage AND Personnage.ID = '".$this->_id."'";
      $Resul = $pdo->query($req);

      $this->_sac = array();
      while($tab = $Resul->fetch())
      {
         array_push($this->_sac, new Arme($tab['ID_Arme'], $pdo));
     }
   }



        public function getNom()
        {
            return $this->_nom;
        }


        public function getSac()
        {
            return $this->_sac;
        }

        public function getStrListeArme()
        {
            $string = "";
            foreach($this->_sac as $Armes)
            {
                $string = $string." ".$Armes->getNom();
            }

            return $string;
        }
    }
?>