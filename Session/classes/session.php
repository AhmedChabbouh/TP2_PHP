<?php 
class session
{
     private $nbVisites;
    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['nbVisites']))
        {
            $_SESSION['nbVisites'] = 1;
        }
        else
        {
            $_SESSION['nbVisites']++;
        }
        $this->nbVisites = $_SESSION['nbVisites'];

        }
        public function getNbvisites()
        {
            return $this->nbVisites;
        }
        public function reset()
        {
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['nbVisites'] = 0;
            $this->nbVisites = 0;
        }
    }
?>