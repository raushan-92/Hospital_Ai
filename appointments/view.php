<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

require_once "../config/db.php";

/*
    Get appointment information
    together with patient and doctor names
*/

$sql = "
    SELECT
        appointments.id,
        patients.name AS patient_name,
        doctors.name AS doctor_name,
        appointments.appointment_date,
        appointments.appointment_time
    FROM appointments
    LEFT JOIN patients
        ON appointments.patient_id = patients.id
    LEFT JOIN doctors
        ON appointments.doctor_id = doctors.id
    ORDER BY appointments.id DESC
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Appointments - Hospital Management System
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


<!-- MAIN CONTENT -->

<div class="container mt-4">


    <!-- HEADER -->

    <div
        class="d-flex justify-content-between align-items-center mb-4"
    >

        <div>

            <h2 class="fw-bold">

                📅 Appointment Management

            </h2>

            <p class="text-muted mb-0">

                View and manage patient appointments

            </p>

        </div>


        <a
            href="add.php"
            class="btn btn-primary"
        >

            + Book Appointment

        </a>

    </div>


    <!-- APPOINTMENT TABLE -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table
                    class="table table-hover align-middle"
                >

                    <thead class="table-primary">

                        <tr>

                            <th>ID</th>

                            <th>👤 Patient</th>

                            <th>👨‍⚕️ Doctor</th>

                            <th>📅 Date</th>

                            <th>🕐 Time</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php

                    if ($result && $result->num_rows > 0) {

                        while (
                            $appointment =
                            $result->fetch_assoc()
                        ) {

                    ?>

                        <tr>


                            <!-- ID -->

                            <td class="fw-semibold">

                                <?php
                                echo $appointment["id"];
                                ?>

                            </td>


                            <!-- PATIENT -->

                            <td>

                                <span class="fw-semibold">

                                    👤

                                    <?php

                                    echo htmlspecialchars(
                                        $appointment["patient_name"]
                                        ?? "Unknown Patient"
                                    );

                                    ?>

                                </span>

                            </td>


                            <!-- DOCTOR -->

                            <td>

                                👨‍⚕️

                                <?php

                                echo htmlspecialchars(
                                    $appointment["doctor_name"]
                                    ?? "Unknown Doctor"
                                );

                                ?>

                            </td>


                            <!-- DATE -->

                            <td>

                                <span
                                    class="badge bg-info text-dark"
                                >

                                    <?php

                                    echo htmlspecialchars(
                                        $appointment[
                                            "appointment_date"
                                        ]
                                    );

                                    ?>

                                </span>

                            </td>


                            <!-- TIME -->

                            <td>

                                <span
                                    class="badge bg-secondary"
                                >

                                    <?php

                                    echo htmlspecialchars(
                                        $appointment[
                                            "appointment_time"
                                        ]
                                    );

                                    ?>

                                </span>

                            </td>


                            <!-- DELETE -->

                            <td>

                                <a
                                    href="delete.php?id=<?php echo $appointment["id"]; ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this appointment?');"
                                >

                                    🗑️ Delete

                                </a>

                            </td>


                        </tr>


                    <?php

                        }

                    } else {

                    ?>


                        <!-- NO APPOINTMENTS -->

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5"
                            >

                                <div class="fs-1">

                                    📅

                                </div>

                                <h5
                                    class="text-muted"
                                >

                                    No appointments found

                                </h5>

                                <p class="text-muted">

                                    Book a new appointment
                                    to see it here.

                                </p>

                                <a
                                    href="add.php"
                                    class="btn btn-primary"
                                >

                                    + Book Appointment

                                </a>

                            </td>

                        </tr>


                    <?php

                    }

                    ?>


                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- BACK BUTTON -->

    <div class="mt-4">

        <a
            href="../dashboard.php"
            class="btn btn-secondary"
        >

            ← Back to Dashboard

        </a>

    </div>


</div>


<!-- BOOTSTRAP JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>