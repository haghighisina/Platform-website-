<?php
require_once __DIR__ . "/config/initiate.php";
require_once __DIR__ . '/vendor/autoload.php';

$job = new Job;

if (isset($_POST['deleteId'])){
    $deleteByID = filter_input(INPUT_POST, 'deleteId', FILTER_VALIDATE_INT);
    if (false !== $job->deleteById($deleteByID)){
        $_SESSION['delete_job'] = "job has been deleted successfully";
        header("location: index.php");
        exit();
    }
}
$template = new Template("Template/job_details.php");
$job_id = isset($_GET['job_id']) ? (int)$_GET['job_id'] : null;
$template->job = $job->getJobDetailsById($job_id);
echo $template;