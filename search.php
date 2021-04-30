<?php
//include db config file
require_once 'config/db_connect.php';

//if search form is submitted
$searchKeyword = $whrSQL = '';
if (isset($_POST['searchSubmit'])) {
    $searchKeyword = $_POST['keyword'];
    if (!empty($searchKeyword)) {
        //sql query to filter records based on the search term
        $whrSQL = "WHERE (title LIKE '%" . $searchKeyword . "%' OR job_description LIKE '%" . $searchKeyword . "%'
        OR company LIKE '%" . $searchKeyword . "%' OR salary LIKE '%" . $searchKeyword . "%')";
    }
}
//get matched records from the database
$result = $conn->query("SELECT * FROM jobs $whrSQL ORDER BY id DESC");

//highlight words in text
function highlightWords($text, $word)
{
    $text = preg_replace('#' . preg_quote($word) . '#i', '<span class="hlw">\\0</span>', $text);
    return $text;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="./css/master.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="site-wrapper">
        <header class="site-header">
            <h1 class="site-title"><a href="search.php">Search for Job Offers</a></h1>
        </header>


        <!-- search form -->
        <form method="POST">
            <input type="text" name="keyword" class="form-control" value="<?php echo $searchKeyword; ?>" placeholder="Search by keyword...">
            <div class="input-group-append">
                <input type="submit" name="searchSubmit" class="btn btn-outline-seconday" value="Search">
                <a href="index.php" class="btn btn-outline-seconday">Reset</a>
            </div>
        </form>

        <!-- search results -->
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = !empty($searchKeyword) ? highlightWords($row['title'], $searchKeyword) : $row['title'];
                $job_description = !empty($searchKeyword) ? highlightWords($row['job_description'], $searchKeyword) : $row['job_description'];
                $company = !empty($searchKeyword) ? highlightWords($row['company'], $searchKeyword) : $row['company'];
                $salary = !empty($searchKeyword) ? highlightWords($row['salary'], $searchKeyword) : $row['salary'];
        ?>

                <li class="job-card">
                    <div class="list-item">
                        <h2 class="job-title"><?php echo $title; ?>
                        </h2>
                        <div class="job-body"><p><?php echo $job_description; ?></p>
                        <div class="job-meta">
                        <a class="meta-company" href="#"><?php echo $company; ?></a>
                        <span class="meta-date">Posted 14 days ago</span>
                        <div>Salary feild: <a><?php echo $salary; ?></a> BGN</div>
							<span class="job-location">The Hague (The Netherlands)</span>
							<div>
							<a class="job-type" href="single.php?id=<?php echo $job['id']?>">Contract staff</a>
							</div>


                </li>
            <?php }
        } else { ?>
            <p>No jobs found...</p>
        <?php }  ?>
        <footer class="site-footer">
            <p>Copyright 2020 | Developer links:
                <a href="edits.php">Edits</a>,
                <a href="index.php">Home</a>,
                <a href="search.php">Search</a>,
                <!-- <a href="single.php?id=<?php echo array_rand($jobs, 1); ?>">Single</a> -->
            </p>
        </footer>
    </div>

</body>

</html>