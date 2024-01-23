<?php
require_once(__dir__ . '/controller.php');
require_once('./model/aboutModel.php');
require_once('./controller/UploadFile.php');
class aboutController extends Controller
{

    public $active = 'About';
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new about();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function about(): array
    {
        return $this->Model->indexabout();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createabout($data, $file)
    {
       if($file['image'] != ""){
         $fileName = new upload();
        $fileName->startupload($file);
        $fileName->uploadfile();
        $image  =  $fileName->dbupload;
       }
       else{
        $image = "";
       }

      
        $Payload = array(
            'title' => $data['title'],
            'about' => $data['about'],
            'phone_title' => $data['phone_title'],
            'phone' => $data['phone'],
            'image' => $image,
            'video' => $data['video'],
            'status' => $data['status'],

        );
        $Response = $this->Model->aboutCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: aboutIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function aboutedit($id): array
    {
        return $this->Model->editabout($id);
    }

    public function aboutUpdate(array $data, $file)
    {
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } 
        else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/R_Food/" . $data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        }

       
        $Payload = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'about' => $data['about'],
            'phone_title' => $data['phone_title'],
            'phone' => $data['phone'],
            'image' => $image,
            'video' => $data['video'],
            'status' => $data['status'],

        );
        $Response = $this->Model->Updateabout($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: aboutIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function aboutDelete($id)
    {
        $image = $this->Model->deleteaboutImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/R_Food/".$image['image']);
        }

        $response = $this->Model->deleteabout($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: aboutIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: aboutIndex.php");
            return $Response;
        }
    }

}
