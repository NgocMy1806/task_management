<div class="col-md-12">
    <form action="<?= isset($task) ? DOMAIN . '/task/update/' . $task->id : DOMAIN . '/task/store' ?>" method="post">

        <div class="card">
            <div class="card-header">
                <h1><?= isset($task) ? 'Edit task:' . $task->title : 'Add task' ?> </h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
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
                    <!-- <input class="flatpickr form-control input" placeholder="Select Date.." tabindex="0" type="text" readonly="readonly"> -->
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">end date</label>
                    <input type="datetime-local" name="end_date" class="form-control" id="end_date" placeholder="end_date" value="<?= isset($task) ? date('Y-m-d', strtotime($task->end_date)) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="estimate" class="form-label">estimate</label>
                    <input type="number" name="estimate" class="form-control" id="estimate" placeholder="task estimate">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><?= isset($task) ? 'Edit' : 'Add' ?></button>
                <button type="reset" class="btn btn-secondary">reset</button>
            </div>

    </form>
</div>
</div>