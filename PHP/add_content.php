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
               <li class="nav-item active">
                  <a class="nav-link" href="add_content.php">Add Grades</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="view_content.php">View Grades</a>
               </li>
            </ul>
         </div>
      </nav>
      <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           // validate form data and store in variables
           $name = trim($_POST['name']);
           $collegeId = trim($_POST['college_id']);
           $grade1 = trim($_POST['grade1']);
           $grade2 = trim($_POST['grade2']);
           $grade3 = trim($_POST['grade3']);
           
           // connect to the database
           $host = "localhost";
           $username = "test";
           $password = "test";
           $database = "php-assignment-1";
           $conn = mysqli_connect($host, $username, $password, $database);
           if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
           }
           
           // insert form data into database table
           $sql = "INSERT INTO students (name, college_id, grade1, grade2, grade3) VALUES ('$name', '$collegeId', '$grade1', '$grade2', '$grade3')";
           if (mysqli_query($conn, $sql)) {
             echo "Record added successfully!";
           } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           }
           
           // close the database connection
           mysqli_close($conn);
         }
         ?>
      <!--div container to start the form section, it gets the input and send it to sql DB through PHP-->
      <div class="container">
         <h1>Add Student Grades</h1>
         <form method="POST">
            <div class="form-group">
               <label for="name">STUDENT NAME:</label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Type here your student name" required>
            </div>
            <div class="form-group">
               <label for="college_id">COLLEGE ID:</label>
               <input type="number" class="form-control" id="college_id" name="college_id" placeholder="Type here your College ID (9 digits)" minlength="9" maxlength="9" required>
            </div>
            <div class="form-group">
               <label for="grade1">PHP GRADE:</label>
               <input type="number" class="form-control" id="grade1" name="grade1" placeholder="Type here your PHP grade (0-100)" min="0" max="100" required>
            </div>
            <div class="form-group">
               <label for="grade2">HTML GRADE:</label>
               <input type="number" class="form-control" id="grade2" name="grade2" placeholder="Type here your HTML grade (0-100)" min="0" max="100" required>
            </div>
            <div class="form-group">
               <label for="grade3">CSS GRADE:</label>
               <input type="number" class="form-control" id="grade3" name="grade3" placeholder="Type here your CSS grade (0-100)" min="0" max="100" required>
            </div>
            <!--Submit button of the form-->
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
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