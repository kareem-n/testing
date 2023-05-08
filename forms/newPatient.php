<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
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
                    Sign up New patient
                </h5>

                <div class="form-check mt-3">
                    <input class="form-check-input" value="adult" type="radio" name="patientType" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Adult (+13)
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" value="not-adult" type="radio" name="patientType" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        not Adult
                    </label>
                </div>


                <div class="form-container mt-3">

                    <!-- form for adult patient -->
                    <form class="adultForm" action="">
                        <div class="adultError d-none alert alert-danger"></div>
                        <input style="width: 300px;" required type="text" class="form-control" name="fName" placeholder="First name">
                        <input style="width: 300px;" required type="text" class="form-control my-3" name="lName" placeholder="Last name">
                        <input style="width: 300px;" required type="number" class="form-control" name="age" placeholder="Age">
                        <input style="width: 300px;" required type="text" class="form-control my-3" name="phone" placeholder="Phone">
                        <input style="width: 300px;" required type="date" class="form-control my-3" name="dBirth">
                        <input style="width: 300px;" required type="email" class="form-control" name="email" placeholder="Email">
                        <input style="width: 300px;" required type="password" class="form-control my-3" name="password" placeholder="Password">
                        <input id="adultSubmitBtn" required type="submit" value="filled" class="btn btn-success w-100">
                    </form>

                    <!-- form for not adult patient (display non until user select not adult) -->
                    <form class="notAdultForm d-none" action="">
                        <div class="notAdultError alert d-none alert-danger"></div>
                        <input style="width: 300px;" type="text" class="form-control" name="fName" placeholder="First name">
                        <input style="width: 300px;" type="text" class="form-control my-3" name="lName" placeholder="Last name">
                        <input style="width: 300px;" type="number" class="form-control" name="age" placeholder="Age">
                        <input style="width: 300px;" type="text" class="form-control my-3" name="phone" placeholder="Parent Phone">
                        <input style="width: 300px;" type="date" class="form-control my-3" name="dBirth">
                        <input style="width: 300px;" type="email" class="form-control" name="email" placeholder="Email">
                        <input style="width: 300px;" type="password" class="form-control my-3" name="password" placeholder="Password">
                        <input id="notAdultSubmitBtn" value="filled" type="submit" class="btn btn-success w-100">
                    </form>
                </div>






            </div>



        </div>
    </section>

    <script>
        let adultForm = document.querySelector(".adultForm");
        let notAdultForm = document.querySelector(".notAdultForm");

        function getSelectedRadio() {
            const radios = document.querySelectorAll('input[name="patientType"]');
            let selectedValue;
            for (const radio of radios) {
                if (radio.checked) {
                    selectedValue = radio.value;
                    break;
                }
            }
            if (selectedValue == 'adult') {
                adultForm.classList.remove("d-none");
                notAdultForm.classList.add("d-none");
            } else {
                adultForm.classList.add("d-none");
                notAdultForm.classList.remove("d-none");
            }

        }

        const radioButtons = document.querySelectorAll('input[name="patientType"]');
        for (const radioButton of radioButtons) {
            radioButton.addEventListener('change', getSelectedRadio);
        }
    </script>

    <script src="patientFormRegex.js"></script>


</body>

</html>