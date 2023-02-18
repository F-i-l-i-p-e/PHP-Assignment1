<!DOCTYPE html>
<html>
   <head>
      <title>Student Record</title>
      <meta name="author" content="Filipe Nogueira Santos">
      <meta name="description" content="PHP Assignment 1 pages and DB for a Student Record">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="../CSS/style.css">
      <link rel="icon" type="image/png" href="../IMAGES/favicon.png">
   </head>
   <body>
      <!--Start of navbar using bootstrap classes, it breaks for mobile friendly use-->
      <nav class="navbar navbar-expand-lg navbar-dark">
         <!--logo/brand-->
         <a class="navbar-brand" href="../index.html">
         SG
         </a>
         <!-- menu selection with index, add content and view content pages-->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="../index.html">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="add_content.php">Add Grades</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="view_content.php">View Grades</a>
               </li>
            </ul>
         </div>
      </nav>
      <!-- div for the table that is set in the view content/ student records-->
      <div class="container">
         <h1>View Student Records</h1>
         <table class="table table-striped table-sm">
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>College ID</th>
               <th>PHP</th>
               <th>HTML</th>
               <th>CSS</th>
               <th>Average</th>
            </tr>
            <?php
               // connect to the database
               $host = "localhost";
               $username = "test";
               $password = "test";
               $database = "php-assignment-1";
               $conn = mysqli_connect($host, $username, $password, $database);
               if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
               }
               
               // retrieve the student records from the database
               $sql = "SELECT id, name, college_id, grade1, grade2, grade3, round((grade1+grade2+grade3)/3, 1) AS average FROM students";
               $result = mysqli_query($conn, $sql);
               if (mysqli_num_rows($result) > 0) {
                 // output each row of the table
                 while($row = mysqli_fetch_assoc($result)) {
                   echo "<tr>";
                   echo "<td>" . $row["id"] . "</td>";
                   echo "<td>" . $row["name"] . "</td>";
                   echo "<td>" . $row["college_id"] . "</td>";
                   echo "<td>" . $row["grade1"] . "</td>";
                   echo "<td>" . $row["grade2"] . "</td>";
                   echo "<td>" . $row["grade3"] . "</td>";
                   echo "<td>" . round($row["average"], 1) . "</td>";
                   echo "</tr>";
                 }
               } else {
                 echo "<tr><td colspan='7'>No student record was found!</td></tr>";
               }
               
               // close the database connection
               mysqli_close($conn);
               ?>
         </table>
      </div>
      <footer>
         <div class="container-fluid p-3">
            <p class="font-weight-bold">SG | PHP Assignment for Student Grades Record</p>
         </div>
      </footer>
      <!--add JS scripts for bootstrap, it is located at the end of the page for faster loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
</html>