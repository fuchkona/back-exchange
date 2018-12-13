<div class="restApi-default-index">
    <div class="jumbotron">
        <h1>Welcome to api page!</h1>
        <p>Here you can see all allowed api</p>
    </div>
    <hr>
    <?= $this->render("api/site.php") ?>
    <?= $this->render("api/tasks.php") ?>
    <?= $this->render("api/comments.php") ?>
    <?= $this->render("api/files.php") ?>
    <?= $this->render("api/requests.php") ?>
    <?= $this->render("api/user.php") ?>

</div>
