<?php
require_once __DIR__."/config/initiate.php";
require_once __DIR__ . '/vendor/autoload.php';

$job = new Job;
$error = [];
$success = [];

if (isset($_POST['submit']) && !empty($_POST['submit'])){
    $company = filter_input(INPUT_POST,'company',FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_POST, 'category_id',FILTER_VALIDATE_INT);
    $job_title = filter_input(INPUT_POST,'job_title',FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST,'location',FILTER_SANITIZE_STRING);
    $salary = filter_input(INPUT_POST,'salary',FILTER_VALIDATE_INT);
    $contact_user = filter_input(INPUT_POST,'contact_user',FILTER_SANITIZE_STRING);
    $contact_email = filter_input(INPUT_POST,'contact_email',FILTER_SANITIZE_EMAIL);

    //use Filter_input_array to filter all data once
    if (isset($company) && empty($company)){
        $error[] = 'company is empty';
    }
    if (isset($category_id) && empty($category_id)){
        $error[] = 'category is empty';
    }
    if (isset($job_title) && empty($job_title)){
        $error[] = 'job_title is empty';
    }
    if (isset($description) && empty($description)){
        $error[] = 'description is empty';
    }
    if (isset($location) && empty($location)){
        $error[] = 'location is empty';
    }
    if (isset($salary) && empty($salary)){
        $error[] = 'salary is empty';
    }
    if (isset($contact_user) && empty($contact_user)){
        $error[] = 'contact_user is empty';
    }
    if (isset($contact_email) && empty($contact_email)){
        $error[] = 'contact_email is empty';
    }

    if (isset($salary) && !empty($salary)) {
        if (true !== is_int($salary)) {
            $error[] = 'salary must be integer type';
        }
    }
    if (!empty($data['contact_email'])){
        if(!$job->checkemail($data['contact_email'])){
            $error[] = "Invalid email address.";
        }
    }
    $_SESSION['error'] = $error;

    if (false !== empty($_SESSION['error'])){
        $job->createJobLister($company, $category_id, $job_title, $description, $location, $salary, $contact_user, $contact_email);
        $success[] = "job has benn added successfully";
        $_SESSION['success'] = $success;
        header("location: ". $_SERVER['PHP_SELF']);
        exit();
    }
}
$template = new Template("Template/job_create.php");
$template->categories = $job->getCategory();
echo $template;

