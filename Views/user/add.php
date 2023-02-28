<div class="col-md-12">
    <form action="<?= isset($user) ? DOMAIN . 'user/update' . $user->id : DOMAIN . 'user/store'  ?>" method="post">
        <div class="card">
            <div class="card-header">
                <h1><?= isset($user) ? 'Edit user' : 'Add user' ?></h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?= isset($user) ? $user->name : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" value="<?= isset($user) ? $user->email : '' ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?=DOMAIN.'/user/index'?>" class="btn btn-primary">Back </a>
            </div>
        </div>
    </form>
</div>