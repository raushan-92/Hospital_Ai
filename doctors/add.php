<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

require_once "../config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $specialization = trim($_POST["specialization"]);
    $phone = trim($_POST["phone"]);

    $sql = "INSERT INTO doctors (name, specialization, phone)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sss",
        $name,
        $specialization,
        $phone
    );

    if ($stmt->execute()) {
        $message = "Doctor added successfully!";
    } else {
        $message = "Error adding doctor.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Doctor - Hospital Management System</title>

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
            class="navbar-brand fw-bold"
        >
            🏥 Hospital Management System
        </a>

        <span class="text-white">
            Welcome,
            <?php echo htmlspecialchars($_SESSION["admin"]); ?>
        </span>

    </div>

</nav>


<!-- MAIN CONTENT -->

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">


            <!-- CARD -->

            <div class="card border-0 shadow">

                <div class="card-body p-4">


                    <!-- HEADER -->

                    <div class="text-center mb-4">

                        <div class="fs-1">
                            👨‍⚕️
                        </div>

                        <h2 class="fw-bold">
                            Add New Doctor
                        </h2>

                        <p class="text-muted">
                            Enter doctor information
                        </p>

                    </div>


                    <!-- SUCCESS MESSAGE -->

                    <?php if ($message != "") { ?>

                        <div class="alert alert-success text-center">

                            ✅
                            <?php echo htmlspecialchars($message); ?>

                        </div>

                    <?php } ?>


                    <!-- FORM -->

                    <form method="POST">


                        <!-- DOCTOR NAME -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Doctor Name
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    👨‍⚕️
                                </span>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Enter doctor name"
                                    required
                                >

                            </div>

                        </div>


                        <!-- SPECIALIZATION -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Specialization
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    🩺
                                </span>

                                <select
                                    name="specialization"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Select Specialization
                                    </option>

                                    <option value="General Physician">
                                        General Physician
                                    </option>

                                    <option value="Cardiologist">
                                        Cardiologist
                                    </option>

                                    <option value="Dermatologist">
                                        Dermatologist
                                    </option>

                                    <option value="Neurologist">
                                        Neurologist
                                    </option>

                                    <option value="Pediatrician">
                                        Pediatrician
                                    </option>

                                    <option value="Orthopedic">
                                        Orthopedic
                                    </option>

                                    <option value="Dentist">
                                        Dentist
                                    </option>

                                    <option value="Gynecologist">
                                        Gynecologist
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- PHONE -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Phone Number
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    📱
                                </span>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Enter phone number"
                                >

                            </div>

                        </div>


                        <!-- BUTTONS -->

                        <div class="d-grid gap-2">

                            <button
                                type="submit"
                                class="btn btn-success btn-lg"
                            >
                                ➕ Save Doctor
                            </button>

                            <a
                                href="view.php"
                                class="btn btn-outline-primary"
                            >
                                👨‍⚕️ View Doctors
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


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>