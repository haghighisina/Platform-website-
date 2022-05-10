<?php
require_once __DIR__ . '/include/header.php';?>

<h4 class="page-header mt-5 mb-5"><?= $job->job_title ?? ""; ?> <?= ($job->location)?? "" ;?></h4>
<small class="mb-5">Posted By <?= $job->contact_user ?? "" ;?> On <?= $job->post_date ?? "";?></small><hr>
<p class="lead"><?= $job->description ?? "";?></p>
<ul class="list-group mb-5">
    <li class="list-group-item"><strong>Company:</strong>&nbsp;<?= $job->company ?? "";?></li>
    <li class="list-group-item"><strong>Salary:</strong>&nbsp;<?= $job->salary ?? "";?></li>
    <li class="list-group-item"><strong>Contact Email:</strong>&nbsp;<?= $job->contact_email ?? "";?></li>
</ul>
<a class="btn btn-outline-primary mb-5" href="index.php">Go Back to Home </a>
<form method="POST" action="edit.php">
    <input type="hidden" name="editid" value="<?= $job->id ?? 1;?>">
    <input type="submit" class="btn btn-outline-danger mb-5" value="Edit">
</form>

<form method="POST" action="job.php" class="mb-5 d-inline">
    <input type="hidden" name="deleteId" value="<?= $job->id ?? 1;?>">
    <input type="submit" class="btn btn-outline-danger mb-5" value="Delete">
</form>
<br><br>
<?php require_once __DIR__ . '/include/footer.php';
