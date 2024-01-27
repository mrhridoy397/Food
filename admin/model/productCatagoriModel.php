<?php
require_once(__dir__ . '/Db.php');
class productcatagoris extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexproductcatagoris()
    {
        $this->query("SELECT * FROM `productcatagoris`");
        $this->execute();

        $productcatagoris = $this->fetchAll();
        if (!empty($productcatagoris)) {
            $Response = array(
               $productcatagoris
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
    public function productcatagorisCreate(array $data)
    {
        $this->query("INSERT INTO `productcatagoris`( `productCatagoris`,`status`) VALUES (?,?)");
        $this->bind(1, $data['productCatagoris']);
        $this->bind(2, $data['status']);

        

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
    public function editproductcatagoris($id)
    {
        $this->query("SELECT * FROM `productcatagoris` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $productcatagoris = $this->fetch();
        if (!empty($productcatagoris)) {
              return $productcatagoris; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updateproductcatagoris(array $data): array
    {
        $this->query("UPDATE `productcatagoris` SET `productCatagoris`=?,`status`=? WHERE `id` =?");
        $this->bind(1, $data['productCatagoris']);
        $this->bind(2, $data['status']);
        $this->bind(3, $data['id']);

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
    public function deleteproductcatagoris($id): array
    {
        $this->query("DELETE FROM `productcatagoris` WHERE `id` = :id");
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
