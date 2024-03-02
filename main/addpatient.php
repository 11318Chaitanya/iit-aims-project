<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assests/css/sidebar.css">

    <style>
    main {
        height: 100%;
        width: 100%;
        overflow: auto;
    }
    </style>

</head>

<body>

    <div class="d-flex">

        <?php include 'sidebar.php';?>

        <main class="d-flex mx-2">
            <div class="container my-4">
            <?php
            
            if(isset($_GET['subSuccess']) && $_GET['subSuccess']=="true"){
                echo '<div class="alert alert-success alert-dismissible fade show my-0 mb-2" role="alert">
              <strong>Successful!</strong> Patient added successfully.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else if(isset($_GET['subSuccess']) && $_GET['subSuccess']=="false"){
                echo '<div class="alert alert-danger alert-dismissible fade show my-0 mb-2" role="alert">
              <strong>Error! </strong> Failed to add Patient.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            
            ?>
                <h1>Add Patient</h1>
                <form action="/project/healthcarepro/partials/handelsubmission/__handelpatientdata.php" method="post"
                    enctype="multipart/form-data">
                    <h2>Personal details: </h2>
                    <div class="mb-3">
                        <label for="patientname" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="patientname" name="patientname">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label me-3">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patientgender" id="gender_radio1"
                                value="male">
                            <label class="form-check-label" for="gender_radio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patientgender" id="gender_radio2"
                                value="female">
                            <label class="form-check-label" for="gender_radio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patientgender" id="gender_radio3"
                                value="others">
                            <label class="form-check-label" for="gender_radio3">Others</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="patientdob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="patientdob" name="patientdob">
                    </div>
                    <div class="mb-3">
                        <label for="patientcontactnum" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="patientcontactnum" name="patientcontactnum">
                    </div>
                    <div class="mb-3">
                        <label for="patientadharnum" class="form-label">AdharCard Number</label>
                        <input type="number" class="form-control" id="patientadharnum" name="patientadharnum">
                    </div>
                    <div class="mb-3">
                        <label for="patientid" class="form-label">Patient Id</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="patientid" name="patientid" readonly>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" onclick="generatePatientId()">Generate</button>
                            </div>
                        </div>
                    </div>
                    <h2>Medical details: </h2>
                    <div class="mb-3">
                        <label for="patientbp" class="form-label">Blood Pressure</label>
                        <input type="text" class="form-control" id="patientbp" name="patientbp">
                    </div>
                    <div class="mb-3">
                        <label for="patientsugar" class="form-label">Sugar level</label>
                        <input type="number" class="form-control" id="patientsugar" name="patientsugar">
                    </div>
                    <div class="mb-3">
                        <label for="patientimgvid" class="form-label">Patient Images/videos</label>
                        <input type="file" class="form-control" id="patientimgvid" name="patientimgvid[]" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="patientseverity" class="form-label me-3">Severity index</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patientseverity" id="patient_severity1"
                                value="normal">
                            <label class="form-check-label text-success" for="patient_severity1">Normal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patientseverity" id="patient_severity2"
                                value="mild">
                            <label class="form-check-label text-warning" for="patient_severity2">Mild</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patientseverity" id="patient_severity3"
                                value="high">
                            <label class="form-check-label text-danger" for="patient_severity3">High</label>
                        </div>
                    </div>
                    <h3>Diagnostics:</h3>
                    <div class="mb-3">
                        <label for="patientdiagnostictext" class="form-label">Details:</label>
                        <textarea name="patientdiagnostictext" id="patientdiagnostictext" cols="30" rows="5"
                            class="form-control"></textarea>
                        <div class="d-flex mt-3 align-items-center">
                            <span>Add images/files:</span><input type="file" class="form-control"
                                id="patientdiagnosticfile" name="patientdiagnosticfile[]" multiple>
                        </div>
                    </div>
                    <h3>Medication:</h3>
                    <div class="mb-3">
                        <label for="patientmedicationtext" class="form-label">Medications given:</label>
                        <textarea name="patientmedicationtext" id="patientmedicationtext" cols="30" rows="5"
                            class="form-control"></textarea>
                        <div class="d-flex mt-3 align-items-center">
                            <span>Add images/files:</span><input type="file" class="form-control"
                                id="patientmedicationfile" name="patientmedicationfile[]" multiple>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="patientmedicalhistory" class="form-label">Medical History:</label>
                        <textarea name="patientmedicalhistory" id="patientmedicalhistory" cols="30" rows="5"
                            class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="doctorcomment" class="form-label">Doctor's comment:</label>
                        <textarea name="doctorcomment" id="doctorcomment" cols="30" rows="5"
                            class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </main>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
    function generatePatientId() {
        // Get the values of patient name, date of birth, and Aadhar number
        var patientName = document.getElementById('patientname').value;
        var patientDob = document.getElementById('patientdob').value;
        var patientAadhar = document.getElementById('patientadharnum').value;

        // Check if all fields are filled
        if (patientName && patientDob && patientAadhar) {
            // Extract initials from name
            var initials = getInitials(patientName);

            // Extract last two digits of the year from date of birth
            // var dobYear = patientDob.substring(patientDob.length - 4);

            var dob = convertDateToYYYYMMDD(patientDob);

            // Take the first five digits from the Aadhar number
            var aadharDigits = patientAadhar.substring(0, 5);

            // Concatenate the parts to form the patient ID
            var patientId = initials.toUpperCase() + dob + "_"+ aadharDigits;

            // Fill the patient id field
            document.getElementById('patientid').value = patientId;
            console.log(patientId);
        } else {
            alert('Please fill in all the reqired fields.');
        }
    }

    // Function to extract initials from name
    function getInitials(name) {
        var parts = name.split(' ');
        var initials = '';
        for (var i = 0; i < parts.length; i++) {
            initials += parts[i].charAt(0);
        }
        return initials;
    }
    // Function to generate dob
    function convertDateToYYYYMMDD(dateString) {
        // Split the input string into year, month, and day components
        var parts = dateString.split('-');

        // Concatenate the components to form the YYYYMMDD format
        var formattedDate = parts[0] + parts[1] + parts[2];

        return formattedDate;
    }
    </script>

    <script>
    /* global bootstrap: false */
    (() => {
        'use strict'
        const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(tooltipTriggerEl => {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })()
    </script>
</body>

</html>