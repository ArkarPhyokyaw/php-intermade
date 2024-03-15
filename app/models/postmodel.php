<?php
class postmodel{
    private $db;
    public function __construct()
    {
        $this->db=new database();
    }
    public function getPostByCatId($id)
    {
        $this->db->query("SELECT * FROM posts WHERE cat_id=:id");
        $this->db->bind(":id",$id);
        return $this->db->multiSet();
    }

    public function insertPost($cat_id,$title,$desc,$image,$content)
    {
        $this->db->query("INSERT INTO posts (cat_id,title,desc,image,content) VALUES (:cat_id,:title,:desc,:image,:content)");
        $this->db->bind(":cat_id",$cat_id);
        $this->db->bind(":title",$title);
        $this->db->bind(":desc",$desc);
        $this->db->bind(":image",$image);
        $this->db->bind(":content",$content);
        return $this->db->execute();
    }
}
?>