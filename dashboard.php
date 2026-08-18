<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

require_once "config/db.php";

/* Count Patients */
$patient_result = $conn->query("SELECT COUNT(*) AS total FROM patients");
$patient_data = $patient_result->fetch_assoc();
$total_patients = $patient_data["total"];

/* Count Doctors */
$doctor_result = $conn->query("SELECT COUNT(*) AS total FROM doctors");
$doctor_data = $doctor_result->fetch_assoc();
$total_doctors = $doctor_data["total"];

/* Count Appointments */
$appointment_result = $conn->query("SELECT COUNT(*) AS total FROM appointments");
$appointment_data = $appointment_result->fetch_assoc();
$total_appointments = $appointment_data["total"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - LNCT Hospital </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<!-- Navigation Bar -->

<nav class="navbar navbar-dark bg-primary">

    <div class="container-fluid">

        <span class="navbar-brand fw-bold">
            🏥 LNCT Hospital 
        </span>

        <span class="text-white">
            Welcome, <?php echo htmlspecialchars($_SESSION["admin"]); ?>
        </span>

    </div>

</nav>


<!-- Main Content -->

<div class="container mt-4">

    <h2 class="mb-4">
        Dashboard
    </h2>


    <!-- Statistics -->

    <div class="row g-4">


        <!-- Patients -->

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h5 class="card-title">
                        👤 Total Patients
                    </h5>

                    <h2 class="text-primary">
                        <?php echo $total_patients; ?>
                    </h2>

                    <a
                        href="patients/"
                        class="btn btn-primary"
                    >
                        Manage Patients
                    </a>

                </div>

            </div>

        </div>


        <!-- Doctors -->

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h5 class="card-title">
                        👨‍⚕️ Total Doctors
                    </h5>

                    <h2 class="text-success">
                        <?php echo $total_doctors; ?>
                    </h2>

                    <a
                        href="doctors/"
                        class="btn btn-success"
                    >
                        Manage Doctors
                    </a>

                </div>

            </div>

        </div>


        <!-- Appointments -->

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h5 class="card-title">
                        📅 Appointments
                    </h5>

                    <h2 class="text-warning">
                        <?php echo $total_appointments; ?>
                    </h2>

                    <a
                        href="appointments/"
                        class="btn btn-warning"
                    >
                        View Appointments
                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- AI Chatbot -->

    <div class="card shadow-sm border-0 mt-5">

        <div class="card-body">

            <h4>
                🤖 AI Medical Assistant
            </h4>

            <p class="text-muted">
                Get general health information using our
                rule-based medical chatbot.
            </p>

            <a
                href="ai/chatbot.php"
                class="btn btn-dark"
            >
                Open Medical Chatbot
            </a>

        </div>

    </div>


    <!-- Quick Actions -->

    <div class="card shadow-sm border-0 mt-4">

        <div class="card-body">

            <h4>
                Quick Actions
            </h4>

            <div class="d-flex gap-2 flex-wrap">

                <a
                    href="patients/add.php"
                    class="btn btn-outline-primary"
                >
                    + Add Patient
                </a>

                <a
                    href="doctors/add.php"
                    class="btn btn-outline-success"
                >
                    + Add Doctor
                </a>

                <a
                    href="appointments/add.php"
                    class="btn btn-outline-warning"
                >
                    + Book Appointment
                </a>

            </div>

        </div>

    </div>


    <!-- Logout -->

    <div class="text-center mt-5 mb-4">

        <a
            href="logout.php"
            class="btn btn-danger"
        >
            Logout
        </a>

    </div>

</div>


<!-- Bootstrap JavaScript -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>