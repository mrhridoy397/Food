<?php
require_once(__dir__ . '/controller.php');
require_once('./model/heroModel.php');
require_once('./controller/UploadFile.php');
class heroController extends Controller
{

    public $active = 'Hero Aria'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new hero();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function gethero(): array
    {
        return $this->Model->indexhero();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createhero($data, $file)
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
            'shortDescription' => $data['shortDescription'],
            'btnOne' => $data['btnOne'],
            'btnOneLink' => $data['btnOneLink'],
            'image' => $image,
            'video' => $data['video'],
            'status' => $data['status'],

        );
        $Response = $this->Model->heroCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: heroIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function heroedit($id): array
    {
        return $this->Model->edithero($id);
    }

    public function heroUpdate(array $data, $file)
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
            'shortDescription' => $data['shortDescription'],
            'btnOne' => $data['btnOne'],
            'btnOneLink' => $data['btnOneLink'],
            'image' => $image,
            'video' => $data['video'],
            'status' => $data['status'],

        );
        $Response = $this->Model->Updatehero($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: heroIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function heroDelete($id)
    {
        $image = $this->Model->deleteheroImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/R_Food/".$image['image']);
        }

        $response = $this->Model->deletehero($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: heroIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: heroIndex.php");
            return $Response;
        }
    }

}
