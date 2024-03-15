<?php
class post extends controller
{
   private $postmodel;
   private $catmodel;
   public function __construct()
   {
    $this->postmodel=$this->model("postmodel");
    $this->catmodel=$this->model("categorymodel");
   }
   public function home($params =[])
   {
      $params[0];
      $data=[
         'cats'=>'',
         'posts'=>''
      ];
      $data['cats']=$this->catmodel->getAllCategory();
      $data['posts']=$this->postmodel->getPostByCatId($params[0]);
      $this->view("admin/post/home",$data);

   }

   public function created()

   {
         $data=[
               'cats'=>'',
               'title'=>'',
               'file'=>'',
               'desc'=>'',
                 'content'=>'',
               'title_err'=>'',
               'file_err'=>'',
               'content_err'=>'',
               'desc_err'=>''
              ];
         $data['cats']=$this->catmodel->getAllCategory();
   
         if ($_SERVER["REQUEST_METHOD"] == "POST") 
         {
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $files=$_FILES['file'];
            $data['title']=$_POST['title'];
            $data['desc']=$_POST['desc'];
            $data['content']=$_POST['content'];
            if(empty($data["title"])){
               $data['title_err']="title must supply";
            }
            if(empty($data['content'])){
               $data['content_err']="content must supply";
            }
            if(empty($data['desc'])){
               $data['desc_err']="desc must supply";
            }

               if(empty($data['title_err']&&$data['content_err']&&$data['desc_err'])){
                  if(!empty($files['name'])){
                     move_uploaded_file($files['tmp_name'],"assets/uploads".$files["name"]);
                      if( $this-> postmodel->insertPost($_POST['cat_id'],$data['title'],$data['desc'],$files['name'],$data['content']))
                         {
                           flash("pis","post insert success");
                           redirected(URLROOT ."post/home/1");
                         }else{
                           $this->view("admin/post/created",$data);
                         }
                     }else{
                       
                        $this->view("admin/post/created",$data);
                     }
               }else{
                  $this->view("admin/post/created",$data);
               }
         }else{
               $this->view("admin/post/created",$data);
    }
}

}
?>