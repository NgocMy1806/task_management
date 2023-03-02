create table users (
    id int AUTO_INCREMENT not null,
    name varchar(250),
    email varchar (250),
    password char (40),
    
    PRIMARY KEY (id)
    );


    ALTER TABLE tasks
ADD CONSTRAINT  
FOREIGN KEY (user_id) 
REFERENCES users (id);

<!-- <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="task title" value="<?= isset($task) ? $task->title : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="task description" value="<?= isset($task) ? $task->description : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">start date</label>
                    <input type="datetime-local" name="start_date" class="form-control" id="start_date" placeholder="start_date" value="<?= isset($task) ? date('Y-m-d', strtotime($task->start_date)) : '' ?>">
                    
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">end date</label>
                    <input type="datetime-local" name="end_date" class="form-control" id="end_date" placeholder="end_date" value="<?= isset($task) ? date('Y-m-d', strtotime($task->end_date)) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="estimate" class="form-label">estimate</label>
                    <input type="number" name="estimate" class="form-control" id="estimate" placeholder="task estimate">
                </div> -->



                CREATE TEMPORARY TABLE task_logs SELECT sum(log_time) as log_time1, task_id FROM logs GROUP BY task_id;
select t.*,  tl.log_time1 as log_time1, u.name as pic
        FROM tasks as t 
        left join task_logs as tl  on tl.task_id=t.id 
        left join users as u on u.id=t.user_id
        