<?php

include('config/db_connect.php');
$id = mysqli_real_escape_string($conn, $_GET['id']);

//check get request id param
if (isset($_GET['id'])) {

	//make sql
	$sql = "SELECT * FROM jobs WHERE id = $id";

	//make query & get result
	$result = mysqli_query($conn, $sql);

	//fetch the resulting rows as an array
	$job = mysqli_fetch_assoc($result);

	//free result from memory
	mysqli_free_result($result);

	//close connection
	mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Single</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h2 class="site-title"><a href="index.php">Job Offers</a></h2>
		</header>
		<?php if ($job) : ?>
			<div class="job-single">
				<main class="job-main">
					<div class="job-card">
						<div class="job-primary">
							<header class="job-header">
								<h2 class="job-title"><a href="#"><?php echo htmlspecialchars($job['title']); ?></a></h2>
								<div class="job-meta">
									<a class="meta-company" href="#"><?php echo htmlspecialchars($job['company']) ?></a>
									<span class="meta-date">Posted 14 days ago</span>
								</div>
								<div class="job-details">
									<span class="job-location">The Hague (The Netherlands)</span>
									<span class="job-type">Contract staff</span>
								</div>
							</header>

							<div class="job-body">
								<p>
									<?php echo htmlspecialchars($job['job_description']); ?>
								</p>
							</div>
						</div>
					</div>
				</main>
				<aside class="job-secondary">
					<div class="job-logo">
						<div class="job-logo-box">
							<img src="https://i.imgur.com/ZbILm3F.png" alt="">
						</div>
					</div>
					<a href="#" class="button button-wide">Apply now</a>
					<a href="apple.com">apple.com</a>
				</aside>
			</div>
		<?php else :  ?>
			<h4>No such job exist!</h4>

		<?php endif; ?>


		<h2 class="section-heading">Other related jobs:</h2>
		<?php if ($job) : ?>

			<ul class="jobs-listing">
				<li class="job-card">
					<div class="job-primary">

						<h2 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h2>
						<div class="job-meta">
							<a class="meta-company" href="#"><?php echo htmlspecialchars($job['company']) ?></a>
							<span class="meta-date">Posted 14 days ago</span>
						</div>
						<div class="job-details">
							<div>Salary feild: <a><?php echo htmlspecialchars($job['salary']); ?></a> BGN</div>
							<span class="job-location">The Hague (The Netherlands)</span>
							<span class="job-type">Contract staff</span>
						</div>
					</div>
					<div class="job-logo">
						<div class="job-logo-box">
							<img src="https://i.imgur.com/ZbILm3F.png" alt="">
						</div>
					</div>
				</li>

			<?php endif; ?>

			</ul>

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