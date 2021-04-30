<?php
include('config/db_connect.php');

$title = $job_descrpition = $company = $salary = '';
$errors = array('title' => '', 'job_description' => '', 'company' => '', 'salary' => '');

if (isset($_POST['add'])) {

    //check titile
    if (empty($_POST['title'])) {
        $errors['title'] = 'A job title is required <br />';
    } else {
        $title = $_POST['title'];
    }

    //check job descprition
    if (empty($_POST['job_description'])) {
        $errors['job_description'] = 'A job descprition is required <br />';
    } else {
        $job_descrpition = $_POST['job_description'];
    }

    //check company
    if (empty($_POST['company'])) {
        $errors['company'] = 'A company name is required <br />';
    } else {
        $company = $_POST['company'];
    }

    //check salary field
    if (empty($_POST['salary'])) {
        $errors['salary'] = 'A salary is required <br />';
    } else {
        $company = $_POST['salary'];
    }

    if (array_filter($errors)) {
        //echo errors in the form 
    } else {

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $job_descrpition = mysqli_real_escape_string($conn, $_POST['job_description']);
        $company = mysqli_real_escape_string($conn, $_POST['company']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);

        //create sql
        $sql = "INSERT INTO jobs(title, job_description, company, salary) VALUES('$title', '$job_descrpition',
        '$company', '$salary')";

        //save to db and check
        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: index.php');
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }
        //echo form is valid

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Job</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="./css/master.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="site-wrapper">
        <header class="site-header">
            <h1 class="site-title"><a href="add.php">Add a Job</a></h1>
        </header>



        <section class="container grey-text">
            <h4 class="center">Add a Job</h4>
            <form class="white" action="add.php" method="POST">

                <label>Job title: </label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
                <div class="red-text"><?php echo $errors['title']; ?></div>

                <label>Job description: </label>
                <input type="text" name="job_description" value="<?php echo htmlspecialchars($job_descrpition) ?>">
                <div class="red-text"><?php echo $errors['job_description']; ?></div>

                <label>Company: </label>
                <input type="text" name="company" value="<?php echo htmlspecialchars($company) ?>">
                <div class="red-text"><?php echo $errors['company']; ?></div>

                <label>Salary field: </label>
                <input type="text" name="salary" value="<?php echo htmlspecialchars($salary) ?>">
                <div class="red-text"><?php echo $errors['salary']; ?></div>

                <div class="center">
                    <input type="submit" name="add" value="Add Job" class="btn brand z-depth-0">
                </div>
            </form>
        </section>




        <footer class="site-footer">
            <p>Copyright 2020 | Developer links:
                <a href="edits.php">Edits</a>,
                <a href="index.php">Home</a>,
                <a href="search.php">Search</a>,
                <!-- <a href="single.php">Single</a> -->
            </p>
        </footer>
    </div>

</body>

</html>