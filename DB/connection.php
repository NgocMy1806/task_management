<?php
class Connection 
{
    private  $db = null;

    public function getBdd()
    {
        if (!$this->db){
            $this->db= new PDO('mysql:host=localhost;dbname=todo_lists','root','root'); // vào dự án thật thì cần viết thông tin username vs pass vào trong file env, chứ ko đc viết thẳng vào code thế này)
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return $this->db;
    }
}