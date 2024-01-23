
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

}