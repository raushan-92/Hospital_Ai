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
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $phone = trim($_POST["phone"]);
    $symptoms = trim($_POST["symptoms"]);

    $sql = "INSERT INTO patients (name, age, gender, phone, symptoms)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sisss",
        $name,
        $age,
        $gender,
        $phone,
        $symptoms
    );

    if ($stmt->execute()) {

        $message = "Patient added successfully!";

    } else {

        $message = "Error adding patient.";

    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Patient - Hospital Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">


<!-- Navbar -->

<nav class="navbar navbar-dark bg-primary">

    <div class="container-fluid">

        <a
            href="../dashboard.php"
            class="navbar-brand fw-bold text-decoration-none"
        >
            🏥 Hospital Management System
        </a>

        <span class="text-white">
            Welcome, <?php echo htmlspecialchars($_SESSION["admin"]); ?>
        </span>

    </div>

</nav>


<!-- Main -->

<div class="container mt-4">


    <div class="row justify-content-center">

        <div class="col-lg-7">


            <div class="card shadow-sm border-0">

                <div class="card-body p-4">


                    <h2 class="mb-1">
                        👤 Add New Patient
                    </h2>

                    <p class="text-muted mb-4">
                        Enter patient information below
                    </p>


                    <?php if ($message != "") { ?>

                        <div class="alert alert-success">

                            <?php echo htmlspecialchars($message); ?>

                        </div>

                    <?php } ?>


                    <form method="POST">


                        <!-- Name -->

                        <div class="mb-3">

                            <label class="form-label">
                                Patient Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter patient name"
                                required
                            >

                        </div>


                        <!-- Age -->

                        <div class="mb-3">

                            <label class="form-label">
                                Age
                            </label>

                            <input
                                type="number"
                                name="age"
                                class="form-control"
                                placeholder="Enter age"
                                min="0"
                                max="120"
                                required
                            >

                        </div>


                        <!-- Gender -->

                        <div class="mb-3">

                            <label class="form-label">
                                Gender
                            </label>

                            <select
                                name="gender"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Gender
                                </option>

                                <option value="Male">
                                    Male
                                </option>

                                <option value="Female">
                                    Female
                                </option>

                                <option value="Other">
                                    Other
                                </option>

                            </select>

                        </div>


                        <!-- Phone -->

                        <div class="mb-3">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                placeholder="Enter phone number"
                            >

                        </div>


                        <!-- Symptoms -->

                        <div class="mb-4">

                            <label class="form-label">
                                Symptoms
                            </label>

                            <textarea
                                name="symptoms"
                                class="form-control"
                                rows="4"
                                placeholder="Example: Fever, headache, cough"
                            ></textarea>

                        </div>


                        <!-- Buttons -->

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Save Patient
                            </button>

                            <a
                                href="view.php"
                                class="btn btn-secondary"
                            >
                                View Patients
                            </a>

                        </div>


                    </form>


                </div>

            </div>


            <div class="mt-3">

                <a
                    href="../dashboard.php"
                    class="text-decoration-none"
                >
                    ← Back to Dashboard
                </a>

            </div>


        </div>

    </div>


</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>