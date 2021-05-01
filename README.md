# DevriX-Job-board

1. Introduction and an overview
>This is a repository for a simple job board project listing website similar to jobs.bg
The project has a landing page listing all jobs, simple admin area for editing jobs submissions.

2. Requirements
>For this project, I used PHP and created a simple database for having the job offers using MySQL.
This simple PHP project has the following functionality:
  2.1. A simple Job board page listing all job offers
  2.2. A submission form providing the option to submit a new job offer
  2.3. A dashboard page for administrators to be able to see all jobs submissions, being able to edit and delete entries
  
3. Front-end Views  
In regards to the front-end views, I used the resources specifically prepared for me which can be found here:
Code: https://github.com/xavortm/html-template-jobs/tree/main
This is how the front-end should look like: https://html-template-jobs.vercel.app/

4. End Result:
>Having a submittission form for submitting job offers.
  A single offer has:
  >>Title
  >>Description
  >>Company
  >>Salary field
  
>Having a list of submitted offers
>Having a simple administrative panel listing job offers and being able to delete and edit offers
>Having a README.md file in the Git repository explaining the required setup for the project and short information about the project
>An export of your final database for reviewing the structure and the data

5. Bonus points
>Having an option to approve/reject submissions from the administrative panel - SOMEWHAT DONE, BUT THERE IS MORE TO BE REQUIRED.
>Having an option to search by a keyword for jobs - DONE.
>Having a paginated listing page, being able to go to page 2, page 3, etc.


6. Short information about the files
>From index.php you will access the homepage where all current job offers are listed.
>There you can choose a job offer and it will take you to a single page about it.
>The connection to the database is located in the 'config' folder as db_connect.php and is set as own file for simplicity.
>From index.php you can access three other pages: 'Edits' - edits.php, 'Home' - index.php and 'Search' - search.php; this navigation is also present in each page footer.
>The sql file for the database is located in the 'database' folder as joblister.sql.
>From the 'Edits' page you can add new job offers and delete current ones.

