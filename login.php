<?php

session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Admin Login
    if ($username == "raushan" && $password == "raushan92") {

        $_SESSION["admin"] = $username;

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Invalid username or password.";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login |  LNCT Hospital </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", sans-serif;

            background:
                radial-gradient(circle at top left, #2563eb, transparent 35%),
                radial-gradient(circle at bottom right, #06b6d4, transparent 35%),
                #07111f;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 430px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255,255,255,0.10);
            border: 1px solid rgba(255,255,255,0.20);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
        }

        .logo {
            width: 75px;
            height: 75px;
            margin: auto;

            border-radius: 22px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 38px;

            background: rgba(255,255,255,0.15);
        }

        .title {
            color: white;
            font-weight: 700;
            margin-top: 20px;
        }

        .subtitle {
            color: rgba(255,255,255,0.65);
            margin-bottom: 30px;
        }

        .form-label {
            color: white;
            font-weight: 600;
        }

        .form-control {
            background: rgba(255,255,255,0.10);
            border: 1px solid rgba(255,255,255,0.20);
            color: white;
            padding: 13px;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.45);
        }

        .form-control:focus {
            background: rgba(255,255,255,0.15);
            color: white;
            border-color: #60a5fa;
            box-shadow: none;
        }

        .input-group-text {
            background: rgba(255,255,255,0.10);
            color: white;
            border: 1px solid rgba(255,255,255,0.20);
        }

        .login-btn {
            width: 100%;
            border: none;
            border-radius: 12px;
            padding: 13px;

            font-size: 16px;
            font-weight: 700;

            color: white;

            background: linear-gradient(
                135deg,
                #2563eb,
                #06b6d4
            );

            transition: 0.3s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37,99,235,0.4);
        }

        .error-box {
            background: rgba(220,53,69,0.15);
            border: 1px solid rgba(220,53,69,0.3);
            color: #ffb4bd;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 20px;
            text-align: center;
        }

        .footer-text {
            color: rgba(255,255,255,0.45);
            font-size: 12px;
            text-align: center;
            margin-top: 25px;
        }

    </style>

</head>


<body>


<div class="login-wrapper">

    <div class="login-card">


        <!-- LOGO -->

        <div class="text-center">

            <div class="logo">
                🏥
            </div>

            <h2 class="title">
                LNCT Hospital
            </h2>

            <p class="subtitle">
                 Management 
            </p>

        </div>


        <!-- ERROR -->

        <?php if ($error != "") { ?>

            <div class="error-box">

                ⚠️
                <?php echo htmlspecialchars($error); ?>

            </div>

        <?php } ?>


        <!-- LOGIN FORM -->

        <form method="POST">


            <!-- USERNAME -->

            <label class="form-label mb-2">
                Username
            </label>

            <div class="input-group mb-4">

                <span class="input-group-text">
                    👤
                </span>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="Enter username"
                    required
                >

            </div>


            <!-- PASSWORD -->

            <label class="form-label mb-2">
                Password
            </label>

            <div class="input-group mb-4">

                <span class="input-group-text">
                    🔒
                </span>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Enter password"
                    required
                >

                <button
                    type="button"
                    class="input-group-text"
                    onclick="togglePassword()"
                >
                    👁️
                </button>

            </div>


            <!-- LOGIN -->

            <button
                type="submit"
                class="login-btn"
            >
                Login →
            </button>


        </form>


        <div class="footer-text">

            🔐 Secure Admin Access
            <br>

            © 2026 Hospital Management System

        </div>


    </div>

</div>


<script>

function togglePassword() {

    const password =
        document.getElementById("password");

    if (password.type === "password") {

        password.type = "text";

    } else {

        password.type = "password";

    }

}

</script>


</body>

</html>