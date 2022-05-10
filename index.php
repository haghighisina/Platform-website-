<?php
require_once __DIR__."/config/initiate.php";
require_once __DIR__ . '/vendor/autoload.php';

$job = new Job;
$template = new Template("Template/frontpage.php");
if (isset($_SESSION['delete_job']) && !empty($_SESSION['delete_job'])){
    foreach ((array)$_SESSION['delete_job'] as $success){
        echo "<div class='alert alert-success'> $success </div>";
    }unset($_SESSION['delete_job']);
}
$category_id = isset($_POST['category']) ? (int)$_POST['category']  : null;

if (isset($category_id) && !empty($category_id)){
    $template->jobs = $job->getCategoryById($category_id);
    $template->title = "Jobs in ". $job->getCategoryNameBtId($category_id)->name;
}else {
    $template->jobs = $job->getAllJobs();
}

$template->categories = $job->getCategory();

echo $template;


