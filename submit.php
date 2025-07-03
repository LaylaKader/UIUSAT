<?php

include('db_connect.php');

session_start();


if(isset($_SESSION['username'])){
    echo "Happy1";
    $username=mysqli_real_escape_string($conn,$_SESSION['username']);
  
    $sql = "SELECT * FROM student WHERE s_id='$username'";
    $result = mysqli_query($conn, $sql);
    $user=mysqli_fetch_assoc($result);

  
    $_SESSION['username'] = $username;
}



if (isset($_POST['submit'])) {
    echo "Happy2";
    $a_name = $_POST['name'];
    $a_category = $_POST['category'];
    $a_description = $_POST['description'];
    $a_keywords = $_POST['keywords'];
    $a_s_id = $user['s_id'];
    $a_v_id = $_POST['tag_verifier'];
    $a_external_link = $_POST['external_file_link'];
    $a_file_link = $_POST['file_link'];
    
    
    $sql2 = "INSERT INTO achievements (name, category, description, keywords, s_id, v_id, external_links, file_link)
        VALUES ('$a_name', '$a_category', '$a_description', '$a_keywords', '$a_s_id', '$a_v_id', '$a_external_link', '$a_file_link')";
    $result = mysqli_query($conn, $sql2);

    if ($result) {
        echo "Happy3";
        header("location:profile.php");
    }
    else {
        echo "Happy4";
        echo "<script>alert('Something went wrong!')</script>";
    }
  
    // mysqli_free_result($result);
}



mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Submitting Achievement</title>
    <link rel="stylesheet" href="Bcolor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>
    <div class="container form-main" style="margin-top: 100px;">
        <h2 style="text-align: center;">
            Add Achievements
        </h2>
        <br>
        <div class="container pt-5 pb-5" style="background-color: #d4d4d2; width: 850px;">

            <form action="" class="form-input  d-flex justify-content-center" method="POST">

                <div class="row mx-5" style="width: 400px;">

                    <div class="col col-lg-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Choose Achievement Type </label>
                            <select name="category">
                                <option value="project">Project</option>
                                <option value="internship">Internship</option>
                                <option value="honors and awards">Honors and Awards</option>
                                <option value="extra curriculam activities">Extra Curriculam Activities</option>
                            </select><br>
                        </div>
                    </div>

                    <div class="col col-lg-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name Of Achievement</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name Of Achievement"
                                name="name" />
                        </div>
                    </div>

                    <div class="col col-lg-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">External File Link </label>
                            <input type="link" class="form-control" id="exampleFormControlInput1"
                                placeholder="One link only" name="external_file_link" />
                        </div>
                    </div>

                    <div class="col col-lg-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Maximum 2000 characters" name="description" />
                        </div>
                    </div>

                    <div class="col col-lg-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Keywords</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="(comma-separated list)"
                                name="keywords" />
                        </div>
                    </div>

                    <div class="col col-lg-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tag Verifier</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Verifier Username" name="tag_verifier" />
                        </div>
                    </div>

                    <div class="col col-lg-12 text-center"> <br>
                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file_link">
                            <button type="submit" name="submit">Upload</button> <!-- no need -->
                        </form> </br>
                    </div>

                    <div class="col col-lg-12 text-center"> <br>
                        <button type="submit" class="btn btn-outline-primary" style="width: 80px; background-color: rgb(33, 57, 33); color: white; border-radius: 0%;
                         border: 0px transparent;" name="submit">Submit</button> </br>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

</body>

</html>