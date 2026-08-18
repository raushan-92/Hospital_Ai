<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

require_once "../config/db.php";

$message = "";
$message_type = "";


/* Get Patients */

$patients = $conn->query(
    "SELECT id, name FROM patients ORDER BY name ASC"
);


/* Get Doctors */

$doctors = $conn->query(
    "SELECT id, name, specialization
     FROM doctors
     ORDER BY name ASC"
);


/* Book Appointment */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_id = intval($_POST["patient_id"]);
    $doctor_id = intval($_POST["doctor_id"]);
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["appointment_time"];


    /* Check patient */

    if ($patient_id <= 0 || $doctor_id <= 0) {

        $message = "Please select a patient and doctor.";
        $message_type = "danger";

    } else {

        /* Insert appointment */

        $sql = "INSERT INTO appointments
                (patient_id, doctor_id, appointment_date, appointment_time)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "iiss",
            $patient_id,
            $doctor_id,
            $appointment_date,
            $appointment_time
        );


        if ($stmt->execute()) {

            $message = "Appointment booked successfully!";
            $message_type = "success";

        } else {

            $message = "Error booking appointment: " . $conn->error;
            $message_type = "danger";

        }

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Book Appointment - Hospital Management System
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-light">


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-primary">

    <div class="container-fluid">

        <a
            href="../dashboard.php"
            class="navbar-brand fw-bold text-decoration-none"
        >
            🏥 Hospital Management System
        </a>

        <span class="text-white">
            📅 Appointment Management
        </span>

    </div>

</nav>


<!-- MAIN -->

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-7">


            <div class="card border-0 shadow">

                <div class="card-body p-4">


                    <!-- HEADER -->

                    <div class="text-center mb-4">

                        <div class="fs-1">
                            📅
                        </div>

                        <h2 class="fw-bold">
                            Book Appointment
                        </h2>

                        <p class="text-muted">
                            Assign a patient to a doctor
                        </p>

                    </div>


                    <!-- MESSAGE -->

                    <?php if ($message != "") { ?>

                        <div
                            class="alert alert-<?php echo $message_type; ?> text-center"
                        >

                            <?php

                            if ($message_type == "success") {
                                echo "✅ ";
                            } else {
                                echo "⚠️ ";
                            }

                            echo htmlspecialchars($message);

                            ?>

                        </div>

                    <?php } ?>


                    <form method="POST">


                        <!-- PATIENT -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                👤 Select Patient

                            </label>

                            <select
                                name="patient_id"
                                class="form-select form-select-lg"
                                required
                            >

                                <option value="">
                                    -- Select Patient --
                                </option>


                                <?php

                                if ($patients) {

                                    while (
                                        $patient =
                                        $patients->fetch_assoc()
                                    ) {

                                ?>

                                    <option
                                        value="<?php echo $patient["id"]; ?>"
                                    >

                                        <?php

                                        echo htmlspecialchars(
                                            $patient["name"]
                                        );

                                        ?>

                                    </option>

                                <?php

                                    }

                                }

                                ?>

                            </select>

                        </div>


                        <!-- DOCTOR -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                👨‍⚕️ Select Doctor

                            </label>

                            <select
                                name="doctor_id"
                                class="form-select form-select-lg"
                                required
                            >

                                <option value="">
                                    -- Select Doctor --
                                </option>


                                <?php

                                if ($doctors) {

                                    while (
                                        $doctor =
                                        $doctors->fetch_assoc()
                                    ) {

                                ?>

                                    <option
                                        value="<?php echo $doctor["id"]; ?>"
                                    >

                                        <?php

                                        echo htmlspecialchars(
                                            $doctor["name"]
                                        );

                                        ?>

                                        -

                                        <?php

                                        echo htmlspecialchars(
                                            $doctor["specialization"]
                                        );

                                        ?>

                                    </option>

                                <?php

                                    }

                                }

                                ?>

                            </select>

                        </div>


                        <!-- DATE -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                📅 Appointment Date

                            </label>

                            <input
                                type="date"
                                name="appointment_date"
                                class="form-control form-control-lg"
                                min="<?php echo date('Y-m-d'); ?>"
                                required
                            >

                        </div>


                        <!-- TIME -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                🕐 Appointment Time

                            </label>

                            <input
                                type="time"
                                name="appointment_time"
                                class="form-control form-control-lg"
                                required
                            >

                        </div>


                        <!-- BUTTON -->

                        <div class="d-grid gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg"
                            >

                                📅 Book Appointment

                            </button>


                            <a
                                href="view.php"
                                class="btn btn-outline-primary"
                            >

                                📋 View Appointments

                            </a>


                            <a
                                href="../dashboard.php"
                                class="btn btn-outline-secondary"
                            >

                                ← Back to Dashboard

                            </a>

                        </div>


                    </form>


                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>