<?php
// đây là require đứng từ file index 
require_once 'Models/Task.php';

class TaskController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Task();
    }

    public function index()
    {


        $query = $this->model->getBdd()->query('select t.*,  sum(l.log_time) as log_time1, u.name as pic
        FROM logs as l join tasks as t on l.task_id=t.id 
        join users as u on u.id=t.user_id
        group by (l.task_id) ');

        $tasks = $query->fetchAll();
        return $this->render('task/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return $this->render('task/create');
    }

    public function store()
    {
        $query = $this->model->getBdd()->prepare('insert into tasks (title,description, start_date, end_date, estimate) values (:title,:description,:start_date,:end_date,:estimate);');
        $query->execute([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'estimate' => empty($_POST['estimate']) ? 0 : $_POST['estimate'],

        ]);
        $_SESSION['success'] = "save successfully";
        return header('Location:' . DOMAIN . '/task/index');
    }

    public function edit($id)
    {
        $query = $this->model->getBdd()->prepare('select * from tasks where id=:id');
        $task = $query->execute(['id' => $id]);
        $task = $query->fetch();
        return $this->render('task/create', ['task' => $task]);
    }

    public function update($id)
    {

        //start_date=:start_date, end_date=:end_date, 
        $query = $this->model->getBdd()->prepare('update tasks set title=:title, description=:description, estimate=:estimate where id=:id');
        $query->execute([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            // 'start_date' => $_POST['start_date'],
            // 'end_date' => $_POST['end_date'],
            'estimate' => empty($_POST['estimate']) ? 0 : $_POST['estimate'],
            'id' => $id
        ]);
        $_SESSION['success'] = "save successfully";
        return header('Location:' . DOMAIN . '/task/index');
    }


    public function destroy($id)
    {
        $query  = $this->model->getBdd()->prepare('delete from tasks where id=:id');
        $query->execute([
            'id' => $id
        ]);
        $_SESSION['success'] = "deleted successfully";
        return header('Location:' . DOMAIN . '/task/index');
    }

    public function show($id)
    {

        $querylog=  $this->model->getBdd()->prepare('select * from logs where task_id=:id order by create_at ASC');
        $logs=$querylog->execute (['id' => $id]);
        $logs=$querylog->fetchall();

        $query = $this->model->getBdd()->prepare('select * from tasks where id=:id');
        $task = $query->execute(['id' => $id]);
        $task = $query->fetch();
        return $this->render('task/show', ['task' => $task]);
    }

    public function addlog($task_id)
    {
        var_dump($_POST);
        //$task_id = $_POST(['task_id']);
        $query = $this->model->getBdd()->prepare('insert into logs (task_id, log_time,progress, content, create_at)
        values (:task_id, :log_time, :progress, :content, :create_at);');
        $log = $query->execute([
           'task_id' =>$task_id,
            'log_time' => $_POST['log_time'],
            'progress' => $_POST['progress'],
            'content' => $_POST['content'],
            'create_at' => date('Y-m-d H:i:s'),
        ]);

        $_SESSION['success'] = "add log successfully";
        return header('Location:' . DOMAIN . '/task/show/' . $task_id);
    }
}
