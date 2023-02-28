<div class="col-md-12">
    <a href="<?= DOMAIN . 'user/add'; ?>"> Add user </a>
</div>
<div class="col-md-12">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key=>$user): ?>
                <tr>
                    <td><?=$key+1 ; ?></td>
                    <td><?=$user->name ?></td>
                    <td><?=$user->email ?> </td>
                    <td>
                        <a href="<?=DOMAIN.'user/edit/'.$user->id;?>"class="btn btn-secondary" >Edit</a>
                        <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deluser">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="deluser" tabindex="-1" aria-labelledby="log" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= DOMAIN . '/user/destroy/' . $user->id; ?>" method="post">
                    <div class="modal-body">
                       Are your sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>