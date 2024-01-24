<?php
require_once(__dir__ . '/Db.php');
class why extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexwhy()
    {
        $this->query("SELECT * FROM `whay`");
        $this->execute();

        $why = $this->fetchAll();
        if (!empty($why)) {
            $Response = array(
               $why
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
    public function whyCreate(array $data)
    {
        $this->query("INSERT INTO `whay`( `title`, `about`,`status`) VALUES (?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['about']);
        $this->bind(3, $data['status']);

        

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
    public function editwhy($id)
    {
        $this->query("SELECT * FROM `whay` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $why = $this->fetch();
        if (!empty($why)) {
              return $why; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updatewhy(array $data): array
    {
        $this->query("UPDATE `whay` SET `title`=?,`about`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['about']);
        $this->bind(3, $data['status']);
        $this->bind(4, $data['id']);

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
    public function deletewhy($id): array
    {
        $this->query("DELETE FROM `whay` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'Why Delete successfully'
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
