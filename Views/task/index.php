<div class="col-md-12">
  <a href="<?= DOMAIN . '/task/create'; ?>" class="btn btn-secondary float-right">Add new</a>
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
        <th scope="col">title</th>
        <th scope="col">description</th>
        <th scope="col">start date</th>
        <th scope="col">end date</th>
        <th scope="col">estimate</th>
        <th scope="col">logged time</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tasks as $key => $task) : ?>
        <tr>
          <th scope="row"><?php echo $key + 1; ?></th>
          <td><?= $task->title;  ?></td>
          <td><?= $task->description;  ?></td>
          <td><?= $task->start_date;  ?></td>
          <th><?= $task->end_date;  ?></th>
          <td><?= $task->estimate ?? 0;  ?></td>
          <td><?= $task->log_time ?? 0;  ?></td>
          <td>
            <a href="<?= DOMAIN . '/task/edit/' . $task->id; ?>" class="btn btn-secondary"><i class="fa-regular fa-pen-to-square"></i></a>
            <a href="<?= DOMAIN . '/task/show/' . $task->id; ?>" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a>
            <a href="<?= DOMAIN . '/task/destroy/' . $task->id; ?>" class="btn btn-secondary"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>