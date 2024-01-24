<?php
require_once(__dir__ . '/controller.php');
require_once('./model/whyModel.php');
require_once('./controller/UploadFile.php');
class whyController extends Controller
{

    public $active = 'Why';
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new why();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function why(): array
    {
        return $this->Model->indexwhy();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createwhy($data)
    {
     
      
        $Payload = array(
            'title' => $data['title'],
            'about' => $data['about'],
            'status' => $data['status'],

        );
        $Response = $this->Model->whyCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: whyIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function whyedit($id): array
    {
        return $this->Model->editwhy($id);
    }

    public function whyUpdate(array $data)
    {
      

       
        $Payload = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'about' => $data['about'],
            'status' => $data['status'],

        );
        $Response = $this->Model->Updatewhy($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: whyIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function whyDelete($id)
    {

        $response = $this->Model->deletewhy($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: whyIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: whyIndex.php");
            return $Response;
        }
    }

}
