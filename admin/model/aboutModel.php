<?php
require_once(__dir__ . '/Db.php');
class about extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexabout()
    {
        $this->query("SELECT * FROM `about`");
        $this->execute();

        $about = $this->fetchAll();
        if (!empty($about)) {
            $Response = array(
               $about
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
    public function aboutCreate(array $data)
    {
        $this->query("INSERT INTO `about`( `title`, `about`, `phone_title`, `phone`,`image`,`video`, `status`) VALUES (?,?,?,?,?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['about']);
        $this->bind(3, $data['phone_title']);
        $this->bind(4, $data['phone']);
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
    public function editabout($id)
    {
        $this->query("SELECT * FROM `about` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $about = $this->fetch();
        if (!empty($about)) {
              return $about; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updateabout(array $data): array
    {
        $this->query("UPDATE `about` SET `title`=?,`about`=?,`phone_title`=?,`phone`=?,`image`=?,`video`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['about']);
        $this->bind(3, $data['phone_title']);
        $this->bind(4, $data['phone']);
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


    public function deleteaboutImage($id){
        $this->query("SELECT `image`FROM `about` WHERE `id` = :id");
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
    public function deleteabout($id): array
    {
        $this->query("DELETE FROM `about` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'About Delete successfully'
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
