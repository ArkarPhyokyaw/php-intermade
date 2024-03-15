<?php
class usermodel{
    private $db;
    public function __construct()
    {
        $this->db=new database();
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM intermade_mvc");
        return $this->db->multiSet();
    }

    public function register($name, $email, $password)
    {
       $password = password_hash($password, PASSWORD_BCRYPT);
       $this->db->query("INSERT INTO intermade_mvc (name, email, password) VALUES (:name, :email, :password)");
       $this->db->bind(':name', $name);
       $this->db->bind(':email', $email);
       $this->db->bind(':password', $password);
       return $this->db->execute();//this is register
    }

    public function getUserbyEmail($email)
    {
        $this->db->query("SELECT * FROM intermade_mvc WHERE email=:email ");
        $this->db->bind(':email',$email);
        $row=$this->db->singleSet();

        if(empty($row)){
            return false;
        }else{
            return $row;
        }
           
        
    }

}
?>