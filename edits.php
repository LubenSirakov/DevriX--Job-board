<?php
include('config/db_connect.php');

if (isset($_POST['delete'])) {

	$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

	$sql = "DELETE FROM jobs WHERE id = $id_to_delete";

	if (mysqli_query($conn, $sql)) {
		//success
		header('Location: index.php');
	} else {
		//error
		echo 'query error: ' . mysqli_error($conn);
	}
}

//write query for all jobs
$sql = 'SELECT * FROM jobs ORDER BY id';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
	<title>Edits</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="index.php">Job Offers</a></h1>
		</header>

		<ul class="jobs-listing">
			<?php foreach ($jobs as $job) : ?>
				<li class="job-card">

					<div class="job-primary">

						<h2 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h2>
						<div class="job-meta">
							<a class="meta-company" href="#"><?php echo htmlspecialchars($job['company']) ?></a>
							<span class="meta-date">Posted 14 days ago</span>
						</div>

					</div>
					<div class="job-edit">
						<!-- edit from -->
						<form action="editjob.php" method="POST">
							<input type="hidden" name="id_to_edit" value="single.php?id_to_edit=<?php echo $job['id'] ?>">
							<input type="submit" name="edit" value="Edit" class="btn brand z-depth-0">
						</form>
						<!-- delete from -->
						<form action="edits.php" method="POST">
							<input type="hidden" name="id_to_delete" value="<?php echo $job['id'] ?>">
							<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
						</form>
					</div>
				</li>
			<?php endforeach; ?>

		</ul>

		<section class="container grey-text">
			<h4 class="center"></h4>
			<form class="white" action="add.php" method="POST">
				<div class="center">
					<input type="submit" name="submit" value="Add Job" class="btn brand z-depth-0">
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