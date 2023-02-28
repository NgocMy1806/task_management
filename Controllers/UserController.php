<?php
require_once 'Models/User.php';

class UserController extends Controller
{
    public $model;
    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {
        $query = $this->model->getBdd()->query('select * from users');
        $users = $query->fetchAll();
        return $this->render('user/index', ['users' => $users]);
    }

    public function add()
    {
        return $this->render('user/add');
    }

    public function store()
    {
        $query = $this->model->getBdd()->prepare('insert into users (name,email) values(:name,:email)');
        $query->execute([
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ]);
        $_SESSION['success'] = 'add user successfully';
        return header('Location:' . DOMAIN . '/user/index');
    }

    public function edit($id)
    {
        $query = $this->model->getBdd()->prepare('select * from users where id=:id');
        $user = $query->excute([
            'id' => $id
        ]);
        $user = $query->fetch();
        return $this->render('user/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $query = $this->model->getBdd()->prepare('update users set name=:name, email=:email where id=:id');
        $query->execute([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'id' => $id
        ]);
        $_SESSION['success'] = 'Update user successfully';
        return header('Location:' . DOMAIN . '/user/index');
    }

    public function destroy ($id){
        $query=$this->model->getBdd()->prepare('delete from users where id=:id');
        $query->execute([
            'id'=>$id
        ]);
        $_SESSION['success']="delete successfully";
        return header('Location:'.DOMAIN.'/user/index');
    }
}
