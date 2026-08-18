<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

require_once "../config/db.php";

$sql = "SELECT * FROM patients ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patients - Hospital Management System</title>

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


    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>
                👤 Patient Management
            </h2>

            <p class="text-muted">
                Manage registered patients
            </p>

        </div>


        <a
            href="add.php"
            class="btn btn-primary"
        >
            + Add Patient
        </a>

    </div>


    <!-- Patient Table -->

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th>ID</th>

                            <th>Name</th>

                            <th>Age</th>

                            <th>Gender</th>

                            <th>Phone</th>

                            <th>Symptoms</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    if ($result->num_rows > 0) {

                        while ($patient = $result->fetch_assoc()) {

                    ?>

                        <tr>

                            <td>
                                <?php echo $patient["id"]; ?>
                            </td>

                            <td class="fw-semibold">
                                <?php echo htmlspecialchars($patient["name"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($patient["age"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($patient["gender"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($patient["phone"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($patient["symptoms"]); ?>
                            </td>

                            <td>

                                <a
                                    href="delete.php?id=<?php echo $patient["id"]; ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this patient?');"
                                >
                                    🗑️ Delete
                                </a>

                            </td>

                        </tr>

                    <?php

                        }

                    } else {

                    ?>

                        <tr>

                            <td
                                colspan="7"
                                class="text-center text-muted py-4"
                            >

                                No patients found.

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- Back -->

    <div class="mt-4">

        <a
            href="../dashboard.php"
            class="btn btn-secondary"
        >
            ← Back to Dashboard
        </a>

    </div>


</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>