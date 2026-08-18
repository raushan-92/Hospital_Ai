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
        Doctor Management - Hospital Management System
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f5f7fb;
        }

        .option-card {
            border: none;
            border-radius: 18px;
            transition: 0.3s;
        }

        .option-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.12) !important;
        }

        .icon {
            font-size: 55px;
        }

        .header-icon {
            width: 85px;
            height: 85px;
            margin: auto;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f1ff;
        }

        .info-card {
            border: none;
            border-radius: 18px;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-primary shadow-sm">

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

        <div class="header-icon mb-3">

            <span class="icon">
                👨‍⚕️
            </span>

        </div>

        <h1 class="fw-bold">
            Doctor Management
        </h1>

        <p class="text-muted">
            Add, view and manage doctor records
        </p>

    </div>


    <!-- OPTIONS -->

    <div class="row justify-content-center g-4">


        <!-- ADD DOCTOR -->

        <div class="col-md-5">

            <div class="card option-card shadow-sm h-100">

                <div class="card-body text-center p-5">

                    <div class="icon">
                        ➕
                    </div>

                    <h3 class="fw-bold mt-3">
                        Add Doctor
                    </h3>

                    <p class="text-muted">
                        Register a new doctor and
                        save their professional information.
                    </p>

                    <a
                        href="add.php"
                        class="btn btn-primary btn-lg px-4"
                    >
                        + Add Doctor
                    </a>

                </div>

            </div>

        </div>


        <!-- VIEW DOCTORS -->

        <div class="col-md-5">

            <div class="card option-card shadow-sm h-100">

                <div class="card-body text-center p-5">

                    <div class="icon">
                        📋
                    </div>

                    <h3 class="fw-bold mt-3">
                        View Doctors
                    </h3>

                    <p class="text-muted">
                        View and manage all registered
                        doctors in the hospital.
                    </p>

                    <a
                        href="view.php"
                        class="btn btn-success btn-lg px-4"
                    >
                        📋 View Doctors
                    </a>

                </div>

            </div>

        </div>


    </div>


    <!-- QUICK INFORMATION -->

    <div class="card info-card shadow-sm mt-5">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">
                📌 Doctor Management
            </h5>


            <div class="row text-center">


                <!-- ADD -->

                <div class="col-md-4 mb-3">

                    <div class="fs-2">
                        ➕
                    </div>

                    <strong>
                        Register Doctor
                    </strong>

                    <p class="text-muted small mb-0">
                        Add doctor details and specialization
                    </p>

                </div>


                <!-- VIEW -->

                <div class="col-md-4 mb-3">

                    <div class="fs-2">
                        📋
                    </div>

                    <strong>
                        View Records
                    </strong>

                    <p class="text-muted small mb-0">
                        View all registered doctors
                    </p>

                </div>


                <!-- MANAGE -->

                <div class="col-md-4 mb-3">

                    <div class="fs-2">
                        🗑️
                    </div>

                    <strong>
                        Manage Records
                    </strong>

                    <p class="text-muted small mb-0">
                        Manage or remove doctor records
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