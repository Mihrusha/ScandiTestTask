<?php 
namespace App\Controller;

use App\Model\DiscModel\Disc;

class Controller
{
    
    
    public function __construct()
    {
        
        $this->disc=new Disc();
    }
    
    public function Hello()
    {
        echo'Hello';
    }

    public function Get_All($conn)
    {
        $this->delete($conn);
        $items= $this->disc->get_all_items($conn);
        include_once ('src\App\View\MainView.php');
    }

    public function delete($conn)
    {
        
       
        if (isset($_POST["delete"]) && (isset($_POST['check']) == true)) {
            $items = $this->disc->delete($conn,$_POST["check"]);
           
        }
    }


}


?>