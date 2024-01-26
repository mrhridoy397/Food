<?php
require_once(__dir__ . '/controller.php');
require_once('./model/counterModel.php');
require_once('./controller/UploadFile.php');
class counterController extends Controller
{

    public $active = 'Counter';
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new counter();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function counter(): array
    {
        return $this->Model->indexcounter();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createcounter($data)
    {
     
      
        $Payload = array(
            'title' => $data['title'],
            'count' => $data['count'],
            'status' => $data['status'],

        );
        $Response = $this->Model->counterCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: counterIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function counteredit($id): array
    {
        return $this->Model->editcounter($id);
    }

    public function counterUpdate(array $data)
    {
      

       
        $Payload = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'count' => $data['count'],
            'status' => $data['status'],

        );
        $Response = $this->Model->Updatecounter($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: counterIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function counterDelete($id)
    {

        $response = $this->Model->deletecounter($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: counterIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: counterIndex.php");
            return $Response;
        }
    }

}
