<?php
require_once(__dir__ . '/controller.php');
require_once('./model/productCatagoriModel.php');
require_once('./controller/UploadFile.php');
class productcatagorisController extends Controller
{

    public $active = 'productCatagoris';
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new productcatagoris();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function productcatagoris(): array
    {
        return $this->Model->indexproductcatagoris();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createproductcatagoris($data)
    {
     
      
        $Payload = array(
            'productCatagoris' => $data['productCatagoris'],
            'status' => $data['status'],

        );
        $Response = $this->Model->productcatagorisCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: productcatagorisIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function productcatagorisedit($id): array
    {
        return $this->Model->editproductcatagoris($id);
    }

    public function productcatagorisUpdate(array $data)
    {
      

       
        $Payload = array(
            'id' => $data['id'],
            'productCatagoris' => $data['productCatagoris'],
            'status' => $data['status'],

        );
        $Response = $this->Model->Updateproductcatagoris($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: productcatagorisIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function productcatagorisDelete($id)
    {

        $response = $this->Model->deleteproductcatagoris($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: productcatagorisIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: productcatagorisIndex.php");
            return $Response;
        }
    }

}
