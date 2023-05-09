<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Document</title>

    <style>
        input::-webkit-inner-spin-button {
            opacity: 0;
        }
    </style>
</head>

<body>

    <section class=" vh-100">
        <div class="container d-flex align-items-center justify-content-center h-100">
            <div class="bg-light px-5 shadow rounded-3 py-3">
                <h5 class="fw-bold m-0 text-center">
                    Sign up New Doctor
                </h5>




                <div class="mt-3">
                    <!-- form for adult patient -->
                    <form action="handleNewDoctor.php" method="post" enctype="multipart/form-data">

                        <?php
                        if (isset($_SESSION['errors'])) {
                            echo "<div class='alert alert-danger'>";
                            foreach ($_SESSION['errors'] as $value) {
                                echo "- " . $value . '<br />';
                            }
                            echo "</div>";
                        }
                        unset($_SESSION['errors']);

                        ?>

                        <input value="<?php
                                        if (isset($_SESSION['fName'])) {
                                            echo $_SESSION['fName'];
                                        }
                                        unset($_SESSION['fName']);
                                        ?>" type="text" class="form-control" name="fName" placeholder="First name">


                        <input value="<?php
                                        if (isset($_SESSION['lName'])) {
                                            echo $_SESSION['lName'];
                                        }
                                        unset($_SESSION['lName']);
                                        ?>" style="width: 300px;" type="text" class="form-control my-3" name="lName" placeholder="Last name">
                        <input value="<?php
                                        if (isset($_SESSION['phone'])) {
                                            echo $_SESSION['phone'];
                                        }
                                        unset($_SESSION['phone']);
                                        ?>" style="width: 300px;" type="text" class="form-control my-3" name="phone" placeholder="Phone">

                        <input value="<?php
                                        if (isset($_SESSION['dBirth'])) {
                                            echo $_SESSION['dBirth'];
                                        }
                                        unset($_SESSION['dBirth']);
                                        ?>" style="width: 300px;" type="date" class="form-control my-3" name="dBirth">

                        <input value="<?php
                                        if (isset($_SESSION['nationality'])) {
                                            echo $_SESSION['nationality'];
                                        }
                                        unset($_SESSION['nationality']);
                                        ?>" style="width: 300px;" type="text" class="form-control my-3" name="nationality" placeholder="Nationality">
                        <input value="<?php
                                        if (isset($_SESSION['hospital'])) {
                                            echo $_SESSION['hospital'];
                                        }
                                        unset($_SESSION['hospital']);
                                        ?>" style="width: 300px;" type="text" class="form-control my-3" name="hospital" placeholder="Hospital">

                        <label for="certificates">*Upload Certificates</label>
                        <input id="certificates" style="width: 300px;" type="file" class="form-control my-3" name="certificates[]" multiple>



                        <div class="form-group my-3 row align-items-center">
                            <label class="col-sm-3 col-form-label" for="gender">Gender:</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input id="adultSubmitBtn" name="submit" type="submit" class="btn btn-success w-100">
                    </form>

                    <!-- form for not adult patient (display non until user select not adult) -->

                </div>






            </div>



        </div>
    </section>



</body>

</html>