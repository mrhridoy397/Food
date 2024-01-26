<?php
require_once(__dir__ . '/Db.php');
class counter extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexcounter()
    {
        $this->query("SELECT * FROM `counter`");
        $this->execute();

        $counter = $this->fetchAll();
        if (!empty($counter)) {
            $Response = array(
               $counter
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
    public function counterCreate(array $data)
    {
        $this->query("INSERT INTO `counter`( `title`, `count`,`status`) VALUES (?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['count']);
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
    public function editcounter($id)
    {
        $this->query("SELECT * FROM `counter` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $counter = $this->fetch();
        if (!empty($counter)) {
              return $counter; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updatecounter(array $data): array
    {
        $this->query("UPDATE `counter` SET `title`=?,`count`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['count']);
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
    public function deletecounter($id): array
    {
        $this->query("DELETE FROM `counter` WHERE `id` = :id");
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
