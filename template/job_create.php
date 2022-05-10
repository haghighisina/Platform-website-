<?php /* @noinspection All */
require_once __DIR__ . '/include/header.php';
$job = new Job;
?>
<h3 class="page-header mt-5">Creating Job</h3>
<form method="POST" action="create_list_job.php" class="mb-5">
    <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])):
        foreach ($_SESSION['error'] as $error):;?>
            <div class="alert alert-danger"><?= $error;unset($_SESSION['error'])?></div>
    <?php endforeach;endif;?>
    <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])):
        foreach ($_SESSION['success'] as $success):;?>
            <div class="alert alert-success"><?= $success;unset($_SESSION['success'])?></div>
    <?php endforeach;endif;?>
    <div class="form-group">
        <label class="font-weight-bold">Company</label>
        <input class="form-control" type="text" value="<?= $_POST['company'] ??'';?>" name="company">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">category</label>
        <select class="form-control" name="category_id">
            <option value="0">Choose Your Category</option>
            <?php foreach ($categories as $category):;?>
                <option value="<?= $category->id;?>">
                    <?= $category->name;?>
                </option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Job Title</label>
        <input class="form-control" type="text" value="<?= $_POST['job_title'] ??'';?>" name="job_title">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Description</label>
        <textarea class="form-control" type="text" value="<?= $_POST['description'] ??'';?>" name="description"></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Location</label>
        <input class="form-control" type="text" value="<?= $_POST['location'] ??'';?>" name="location">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Salary</label>
        <input class="form-control" type="text" value="<?= $_POST['salary'] ??'';?>" name="salary">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Contact Usr</label>
        <input class="form-control" type="text" value="<?= $_POST['contact_user'] ??'';?>" name="contact_user">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Contact Email</label>
        <input class="form-control" type="email" value="<?= $_POST['contact_email'] ??'';?>" name="contact_email">
    </div>
    <input type="submit" class="btn btn-outline-success" value="Submit" name="submit">
</form>
<?php require_once __DIR__ . '/include/footer.php';