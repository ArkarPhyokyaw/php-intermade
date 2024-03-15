<?php
class home extends controller
{
  private $usermodel;
   public function __construct()
   {
     $this->usermodel=$this->model("usermodel");
   }

   public function index($data=[])
   {
     $data=$this->usermodel->getAllUser(); // Corrected line
      $this->view("home/index",$data);
   }
}
?>
