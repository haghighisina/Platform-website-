<?php require_once __DIR__.'/include/header.php';?>
    <div class="jumbotron">
        <h1>find a job</h1>
        <form method="POST" action="index.php">
            <select class="form-control" name="category">
                <option value="0">Choose Your Category</option>
                <?php foreach ($categories as $category):;?>
                    <option value="<?= $category->id;?>">
                        <?= $category->name;?>
                    </option>
                <?php endforeach;?>
            </select>
            <input class="btn btn-success" value="click" type="submit">
        </form>
    </div>
    <h5 class="mb-5"><b><?= isset($title)?$title:'' ;?></b></h5>
    <?php foreach ($jobs as $job):;?>
    <div class="row marketing">
        <div class="col-md-10">
            <h4><?= $job->company;?></h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
        </div>
        <div class="col-md-2">
<!--            send the job id with Query string-->
            <a class="shadow-none p-3 mb-5 bg-light rounded" href="job.php?job_id=<?= $job->id;?>">View </a>
        </div>
    </div>
    <?php endforeach;?>
<?php require_once __DIR__.'/include/footer.php'; ?>
