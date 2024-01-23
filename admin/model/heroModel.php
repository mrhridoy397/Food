<?php
require_once(__dir__ . '/Db.php');
class hero extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexhero()
    {
        $this->query("SELECT * FROM `hero`");
        $this->execute();

        $hero = $this->fetchAll();
        if (!empty($hero)) {
            $Response = array(
               $hero
            );
            return $Response;
        }
        return array(
          
        );
    }

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function heroCreate(array $data)
    {
        $this->query("INSERT INTO `hero`( `title`, `shortDescription`, `btnOne`, `btnOneLink`,`image`,`video`, `status`) VALUES (?,?,?,?,?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['shortDescription']);
        $this->bind(3, $data['btnOne']);
        $this->bind(4, $data['btnOneLink']);
        $this->bind(5, $data['image']);
        $this->bind(6, $data['video']);
        $this->bind(7, $data['status']);

        

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }

 


      /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function edithero($id)
    {
        $this->query("SELECT * FROM `hero` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $hero = $this->fetch();
        if (!empty($hero)) {
              return  $hero; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updatehero(array $data): array
    {
        $this->query("UPDATE `hero` SET `title`=?,`shortDescription`=?,`btnOne`=?,`btnOneLink`=?,`image`=?,`video`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['shortDescription']);
        $this->bind(3, $data['btnOne']);
        $this->bind(4, $data['btnOneLink']);
        $this->bind(5, $data['image']);
        $this->bind(6, $data['video']);
        $this->bind(7, $data['status']);
        $this->bind(8, $data['id']);

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }


    public function deleteheroImage($id){
        $this->query("SELECT `image`FROM `hero` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();
        $image = $this->fetch();
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }
        /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function deletehero($id): array
    {
        $this->query("DELETE FROM `hero` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'hero Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }
}
