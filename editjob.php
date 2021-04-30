<?php
include_once('config/db_connect.php');

// //write query for all jobs
// $sql = 'SELECT * FROM jobs ORDER BY id';

//make query & get result
$result = mysqli_query($conn, "SELECT * FROM jobs");

// //fetch the resulting rows as an array
// $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id_'])) {

    // $title = $job_descrpition = $company = $salary = '';
    // $errors = array('title' => '', 'job_description' => '', 'company' => '', 'salary' => '');

    // if (array_filter($errors)) {
    //     //echo errors in the form 
    // } else {
    //     $id_to_edit = mysqli_real_escape_string($conn, $_GET['id_to_edit']);
    //     //update sql
    //     $sql = "UPDATE jobs WHERE ('$title', '$job_descrpition',
    // '$company', '$salary')";
    // }
    $id_to_edit = mysqli_real_escape_string($conn, $_POST['id_to_edit']);

	//make sql
	$sql = "UPDATE jobs SET title='$_POST[title]', job_description='$_POST[job_description]',
    company='$_POST[company]', salary='$_POST[salary]' WHERE id = $id_to_edit";

	//make query & get result
	$result = mysqli_query($conn, $sql);

	//fetch the resulting rows as an array
	$job = mysqli_fetch_assoc($result);

    if (mysqli_query($conn, $sql)) {
        //success
        header('Location: index.php');
    } else {
        //error
        echo 'query error: ' . mysqli_error($conn);
    }
}

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Job</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="./css/master.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="site-wrapper">
        <header class="site-header">
            <h1 class="site-title"><a href="">Edit a Job</a></h1>
        </header>

        <section class="container grey-text">
            <h4 class="center">Edit a Job</h4>
            <form class="white" action="editjob.php" method="POST">
            
		<?php if ($job) : ?>
            
                <label>Job title: </label>
                <input type="text" name="title" value=""><?php echo htmlspecialchars($job['title']); ?>
                <div class="red-text"></div>

                <label>Job description: </label>
                <input type="text" name="job_description" value="">
                <div class="red-text"></div>

                <label>Company: </label>
                <input type="text" name="company" value="">
                <div class="red-text"></div>

                <label>Salary field: </label>
                <input type="text" name="salary" value="">
                <div class="red-text"></div>

                <div class="center">
                    <input type="submit" name="edit" value="Edit Job" class="btn brand z-depth-0">
                </div>
                <?php endif; ?>
            </form>
        </section>
        



        <footer class="site-footer">
            <p>Copyright 2020 | Developer links:
                <a href="edits.php">Edits</a>,
                <a href="index.php">Home</a>,
                <!-- <a href="single.php">Single</a> -->
            </p>
        </footer>
    </div>

</body>

</html>