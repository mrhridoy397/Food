
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

}