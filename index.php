<?php

include('config/db_connect.php');

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
	<title>Home</title>
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
						<h2 class="job-title">
						<a href="single.php?id=<?php echo $job['id']?>"><?php echo htmlspecialchars($job['title']); ?></a>
						</h2>
							<div class="job-meta">
							<a class="meta-company"><?php echo htmlspecialchars($job['company']) ?></a>
							<span class="meta-date">Posted 14 days ago</span>
						</div>
						<div class="job-details">
							<div>Salary feild: <a><?php echo htmlspecialchars($job['salary']); ?></a> BGN</div>
							<span class="job-location">The Hague (The Netherlands)</span>
							<div>
							<a class="job-type" href="single.php?id=<?php echo $job['id']?>">Contract staff</a>
							</div>
						</div>
					</div>
					<div class="job-logo">
						<div class="job-logo-box">
							<img src="https://i.imgur.com/ZbILm3F.png" alt="">
						</div>
					</div>
				</li>
			<?php endforeach; ?> 
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