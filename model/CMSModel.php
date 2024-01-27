
<?php
require_once(__dir__ . '/Db.php');
class CMSModel extends Db
{

    // HeroAria 
    public function indexhero()
    {
        $this->query("SELECT * FROM `hero` where `status` = 1");
        $this->execute();

        $hero = $this->fetchAll();
        if (!empty($hero)) {
            $Response = array(
                $hero
            );
            return $Response;
        }
        return array();
    }

    // About 
    public function indexAbout()
    {
        $this->query("SELECT * FROM `about` where `status` = 1");
        $this->execute();

        $about = $this->fetchAll();
        if (!empty($about)) {
            $Response = array(
                $about
            );
            return $Response;
        }
        return array();
    }


    // Why Us 
    public function indexwhy()
    {
        $this->query("SELECT * FROM `whay` where `status` = 1");
        $this->execute();

        $why = $this->fetchAll();
        if (!empty($why)) {
            $Response = array(
                $why
            );
            return $Response;
        }
        return array();
    }

       // Counter section 
       public function indexcounter()
       {
           $this->query("SELECT * FROM `counter` where `status` = 1");
           $this->execute();
   
           $counter = $this->fetchAll();
           if (!empty($counter)) {
               $Response = array(
                   $counter
               );
               return $Response;
           }
           return array();
       }

         // Stuff section 
         public function indexstuff()
         {
             $this->query("SELECT * FROM `stuff` where `status` = 1");
             $this->execute();
     
             $stuff = $this->fetchAll();
             if (!empty($stuff)) {
                 $Response = array(
                     $stuff
                 );
                 return $Response;
             }
             return array();
         }
  

}