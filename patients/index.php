<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Patient Management - Hospital Management System
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        .option-card {
            transition: 0.3s;
            border: none;
        }

        .option-card:hover {
            transform: translateY(-5px);
        }

        .icon {
            font-size: 55px;
        }

    </style>

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

        <a
            href="../dashboard.php"
            class="btn btn-light btn-sm"
        >
            Dashboard
        </a>

    </div>

</nav>


<!-- MAIN -->

<div class="container py-5">


    <!-- HEADER -->

    <div class="text-center mb-5">

        <div class="icon">
            👤
        </div>

        <h1 class="fw-bold">
            Patient Management
        </h1>

        <p class="text-muted">
            Add, view and manage patient records
        </p>

    </div>


    <!-- OPTIONS -->

    <div class="row justify-content-center g-4">


        <!-- ADD PATIENT -->

        <div class="col-md-5">

            <div
                class="card option-card shadow-sm h-100"
            >

                <div class="card-body text-center p-5">

                    <div class="icon">
                        ➕
                    </div>

                    <h3 class="fw-bold mt-3">
                        Add Patient
                    </h3>

                    <p class="text-muted">
                        Register a new patient and
                        save their information.
                    </p>

                    <a
                        href="add.php"
                        class="btn btn-primary btn-lg px-4"
                    >
                        + Add Patient
                    </a>

                </div>

            </div>

        </div>


        <!-- VIEW PATIENTS -->

        <div class="col-md-5">

            <div
                class="card option-card shadow-sm h-100"
            >

                <div class="card-body text-center p-5">

                    <div class="icon">
                        📋
                    </div>

                    <h3 class="fw-bold mt-3">
                        View Patients
                    </h3>

                    <p class="text-muted">
                        View and manage all registered
                        patient records.
                    </p>

                    <a
                        href="view.php"
                        class="btn btn-success btn-lg px-4"
                    >
                        📋 View Patients
                    </a>

                </div>

            </div>

        </div>


    </div>


    <!-- QUICK INFORMATION -->

    <div class="card border-0 shadow-sm mt-5">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-3">
                📌 Patient Management
            </h5>

            <div class="row text-center">


                <div class="col-md-4 mb-3">

                    <div class="fs-3">
                        ➕
                    </div>

                    <strong>
                        Register Patient
                    </strong>

                    <p class="text-muted small mb-0">
                        Add new patient information
                    </p>

                </div>


                <div class="col-md-4 mb-3">

                    <div class="fs-3">
                        📋
                    </div>

                    <strong>
                        View Records
                    </strong>

                    <p class="text-muted small mb-0">
                        View registered patients
                    </p>

                </div>


                <div class="col-md-4 mb-3">

                    <div class="fs-3">
                        🗑️
                    </div>

                    <strong>
                        Manage Records
                    </strong>

                    <p class="text-muted small mb-0">
                        Delete patient records when required
                    </p>

                </div>


            </div>

        </div>

    </div>


    <!-- BACK -->

    <div class="text-center mt-4">

        <a
            href="../dashboard.php"
            class="btn btn-outline-secondary"
        >
            ← Back to Dashboard
        </a>

    </div>


</div>


</body>

</html>