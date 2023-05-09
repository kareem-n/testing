<?php

session_start();

$mysqli = new mysqli("127.0.0.1", "root", "", "testing_galal");

$errors = [];

// Function to sanitize and validate input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        extract($_POST);
        // first name

        if (empty($_POST["fName"])) {
            $errors[] = "First name is required";
        } else {
            $name = test_input($_POST["fName"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $errors[] = "Only letters and white space allowed";
            }
        }
        // last name
        if (empty($_POST["lName"])) {
            $errors[] = "Last name is required";
        } else {
            $name = test_input($_POST["lName"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $errors[] = "Only letters and white space allowed";
            }
        }

        // phone number 
        if (empty($_POST["phone"])) {
            $errors["phone"] = "Phone number is required";
        } else {
            $phone = test_input($_POST["phone"]);
            // Check if phone number is valid
            if (!preg_match("/^[0-9\+\-\(\) ]{8,20}$/", $phone)) {
                $errors["phone"] = "Invalid phone number";
            }
        }

        // Data of birth
        if (empty($_POST["dBirth"])) {
            $errors[] = "Date is required";
        } else {
            $date = $_POST["dBirth"];
            // Check if date is in valid format
            if (!preg_match("/^\d{4}\-\d{2}\-\d{2}$/", $date)) {
                $errors[] = "Invalid date format";
            } else {
                // Check if date is a valid date
                $date_parts = explode('-', $date);
                if (!checkdate($date_parts[1], $date_parts[2], $date_parts[0])) {
                    $errors[] = "Invalid date";
                }
            }
        }

        // Validate nationality
        if (empty($_POST["nationality"])) {
            $errors[] = "Nationality is required";
        } else {
            $nationality = test_input($_POST["nationality"]);
            // Check if nationality only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $nationality)) {
                $errors[] = "invalid nationality name";
            }
        }

        // Hospital name

        if (empty($_POST["hospital"])) {
            $errors[] = "Hospital is required";
        } else {
            $hospital = test_input($_POST["hospital"]);
            // Check if hospital only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $hospital)) {
                $errors[] = "invalid hospital name";
            }
        }

        $gender = $_POST["gender"];
        // Check if gender is a valid option
        if ($gender != "male" && $gender != "female") {
            $errors["gender"] = "Invalid gender";
        }

        if (empty($errors)) {

            $query = "INSERT INTO doctors (firstname, lastname, phone, birthdate, nationality, hospital, gender) VALUES ('$fName','$lName','$phone','$dBirth','$nationality','$hospital','$gender')";

            if ($mysqli->query($query)) {
                $user_id = $mysqli->insert_id;
                $query = "DELETE FROM doctors WHERE id=$user_id";

                if (!empty($_FILES["certificates"]["name"][0])) {
                    // Loop through uploaded files
                    for ($i = 0; $i < count($_FILES["certificates"]["name"]); $i++) {
                        $file_name = $_FILES["certificates"]["name"][$i];
                        $file_tmp = $_FILES["certificates"]["tmp_name"][$i];
                        $file_size = $_FILES["certificates"]["size"][$i];
                        $file_type = $_FILES["certificates"]["type"][$i];
                        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

                        $extensions = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG');

                        // valid extension file type
                        if (!in_array($file_extension, $extensions)) {
                            $errors[] = "image should only be png, jpeg and jpg";
                            $mysqli->query($query);

                            break;
                        }


                        // Validate file size (max 2MB)
                        if ($file_size > 2097152) {
                            $errors[] = "File size must be less than 2MB";
                            $mysqli->query($query);

                            break;
                        }
                        $timestamp = time();
                        $random_number = rand(1000, 9999);
                        $file_name = $timestamp . '_' . $random_number . '_' . $file_name;

                        $query = "INSERT INTO certificates(filename, doctor_id) VALUES ('$file_name','$user_id')";

                        if ($mysqli->query($query)) {
                            move_uploaded_file($file_tmp, "certificates_uploads/$file_name");
                        };


                        // Move uploaded file to server directory


                        // Store file name in array for later use
                        // $certificate_files[] = $file_destination;
                    }
                } else {
                    $errors[] = 'certificate is required';
                    $mysqli->query($query);
                }
            }

            if (!empty($errors)) {
                $_SESSION['fName'] = $fName;
                $_SESSION['lName'] = $lName;
                $_SESSION['phone'] = $phone;
                $_SESSION['dBirth'] = $dBirth;
                $_SESSION['nationality'] = $nationality;
                $_SESSION['hospital'] = $hospital;
                $_SESSION['errors'] = $errors;
            }
            // Check if certificates have been uploaded
            header("location:newDoctor.php");
        } else {

            $_SESSION['fName'] = $fName;
            $_SESSION['lName'] = $lName;
            $_SESSION['phone'] = $phone;
            $_SESSION['dBirth'] = $dBirth;
            $_SESSION['nationality'] = $nationality;
            $_SESSION['hospital'] = $hospital;
            $_SESSION['errors'] = $errors;
            header("location:newDoctor.php");
        }
    }
}
