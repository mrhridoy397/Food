<?php
require_once(__dir__ . './Controller.php');
require_once('./model/CMSModel.php');
require_once('./controller/UploadFile.php');
class CMSController extends Controller
{


    public $active = 'CMS'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        $this->Model = new CMSModel();
    }

        // HeroAria
        public function gethero()
        {
            return $this->Model->indexhero();
        }
    

         // About
         public function getabout()
         {
             return $this->Model->indexAbout();
         }

          // Why Us
          public function getwhy()
          {
              return $this->Model->indexwhy();
          }


           // counter section
           public function getcounter()
           {
               return $this->Model->indexcounter();
           }

             // Stuff section
             public function getstuff()
             {
                 return $this->Model->indexstuff();
             }
 

}