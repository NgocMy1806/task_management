<div class="col-md-12">

    <div class="card">
        <div class="card-header">
            <h1>Task detail </h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>title</th>
                        <td><?= $task->title ?></td>
                    </tr>
                    <tr>
                        <th>description</th>
                        <td><?= $task->description ?></td>
                    </tr>
                    <tr>
                        <th>start_date</th>
                        <td><?= $task->start_date ?></td>
                    </tr>
                    <tr>
                        <th>end date</th>
                        <td><?= $task->end_date ?></td>
                    </tr>
                    <tr>
                        <th>estimate</th>
                        <td><?= $task->estimate ?></td>
                    </tr>
                    <tr>
                        <th>log time (all)</th>
                        <td><?= $task->log_time1 ?></td>
                    </tr>

                </tbody>
            </table>

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

        </div>
        <div class="card-footer">
            <a href="<?= DOMAIN . '/task/index'; ?>" class="btn btn-secondary">Back</i></a>
            <a href="<?= DOMAIN . '/task/edit/' . $task->id; ?>" class="btn btn-secondary">Edit</i></a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#log" data-bs-whatever="@mdo">Log time</button>
        </div>

    </div>


    <div class="modal fade" id="log" tabindex="-1" aria-labelledby="log" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">log time</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= DOMAIN . '/task/addlog/' . $task->id; ?>" method="post">
                    <div class="modal-body">
                        <!-- <input type="hidden" id="task_id" name="task_id" value="<?= $task->id; ?>"> -->

                        <div class="mb-3">
                            <label for="log_time" class="form-label">log_time</label>
                            <input type="number" name="log_time" class="form-control" id="log_time" placeholder="log time">
                        </div>
                        <div class="mb-3">
                            <label for="progress" class="form-label">progress(%)</label>
                            <input type="number" name="progress" class="form-control" id="progress" placeholder="progress">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">content</label>
                            <input type="textarea" name="content" class="form-control" id="content" placeholder="content">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success"><?= $_SESSION['success']; ?></div>

        <?PHP unset($_SESSION['success']); ?>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">logged time</th>
                <th scope="col">progress</th>
                <th scope="col">content</th>
                <th scope="col">created date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $key => $log) : ?>
                <tr>
                    <th scope="row"><?php echo $key + 1; ?></th>
                    <td><?= $log->log_time;  ?></td>
                    <td><?= $log->progress;  ?></td>
                    <td><?= $log->content;  ?></td>
                    <th><?= $log->create_at;  ?></th>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>