<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

$response = "";
$question = "";

/* Chatbot Logic */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $question = strtolower(trim($_POST["question"]));

    /* Fever */
    if (
        strpos($question, "fever") !== false ||
        strpos($question, "temperature") !== false
    ) {
        $response = "Fever is an increase in body temperature and can have many causes, including infections. Rest, stay hydrated, and monitor your symptoms. If the fever is high, persistent, or accompanied by serious symptoms, consult a qualified doctor.";
    }

    /* Headache */
    elseif (
        strpos($question, "headache") !== false ||
        strpos($question, "head pain") !== false
    ) {
        $response = "Headache can occur due to stress, dehydration, lack of sleep, or other causes. Rest and drink enough water. If the headache is sudden, severe, recurrent, or accompanied by other concerning symptoms, seek medical advice.";
    }

    /* Cough */
    elseif (
        strpos($question, "cough") !== false ||
        strpos($question, "coughing") !== false
    ) {
        $response = "Cough may occur due to a cold, allergy, infection, or other conditions. Stay hydrated and rest. Consult a doctor if the cough persists, becomes severe, or is associated with breathing difficulty.";
    }

    /* Cold */
    elseif (
        strpos($question, "cold") !== false ||
        strpos($question, "runny nose") !== false ||
        strpos($question, "sneezing") !== false ||
        strpos($question, "sardi") !== false ||
        strpos($question, "jukam") !== false
    ) {
        $response = "A common cold may cause a runny nose, sneezing, sore throat, and cough. Rest and stay hydrated. Seek medical advice if symptoms become severe or do not improve.";
    }

    /* Sore Throat */
    elseif (
        strpos($question, "sore throat") !== false ||
        strpos($question, "throat pain") !== false
    ) {
        $response = "A sore throat can occur with viral infections, allergies, or other conditions. Drinking fluids and resting may help. Consult a healthcare professional if symptoms are severe or persistent.";
    }

    /* Diabetes */
    elseif (
        strpos($question, "diabetes") !== false ||
        strpos($question, "blood sugar") !== false ||
        strpos($question, "sugar disease") !== false
    ) {
        $response = "Diabetes is a condition involving elevated blood glucose levels. Regular monitoring, healthy eating, physical activity, and medical guidance are important. A healthcare professional should diagnose and manage diabetes.";
    }

    /* Blood Pressure */
    elseif (
        strpos($question, "blood pressure") !== false ||
        strpos($question, " bp ") !== false ||
        $question == "bp"
    ) {
        $response = "Blood pressure can be affected by many factors. Regular monitoring and a healthy lifestyle are important. If your readings are consistently high or low, consult a healthcare professional.";
    }

    /* Dengue */
    elseif (strpos($question, "dengue") !== false) {
        $response = "Dengue is a mosquito-borne viral infection that can cause fever, headache, body aches, nausea, and rash. Seek medical evaluation if dengue is suspected, especially if warning signs such as severe abdominal pain, persistent vomiting, bleeding, or extreme weakness occur.";
    }

    /* Malaria */
    elseif (strpos($question, "malaria") !== false) {
        $response = "Malaria is a mosquito-borne infection that may cause fever, chills, sweating, headache, and weakness. It requires medical evaluation and appropriate treatment. Seek medical care if malaria is suspected.";
    }

    /* Typhoid */
    elseif (strpos($question, "typhoid") !== false) {
        $response = "Typhoid fever is a bacterial infection that may cause prolonged fever, weakness, stomach problems, and headache. Medical testing and treatment are important. Consult a qualified healthcare professional.";
    }

    /* Vomiting */
    elseif (
        strpos($question, "vomiting") !== false ||
        strpos($question, "vomit") !== false
    ) {
        $response = "Vomiting can occur due to infections, food-related illness, medicines, or other causes. Drink fluids carefully to avoid dehydration. Seek medical care if vomiting is severe, persistent, or associated with blood or serious symptoms.";
    }

    /* Diarrhea */
    elseif (
        strpos($question, "diarrhea") !== false ||
        strpos($question, "loose motion") !== false
    ) {
        $response = "Diarrhea can lead to dehydration. Drink adequate fluids and consider oral rehydration solutions when appropriate. Seek medical advice if symptoms are severe, persistent, or accompanied by blood or significant weakness.";
    }

    /* Stomach Pain */
    elseif (
        strpos($question, "stomach pain") !== false ||
        strpos($question, "abdominal pain") !== false ||
        strpos($question, "belly pain") !== false
    ) {
        $response = "Stomach or abdominal pain can have many causes. Avoid self-diagnosis because the cause can range from minor problems to conditions requiring medical attention. Consult a healthcare professional if pain is severe, persistent, or worsening.";
    }

    /* Allergy */
    elseif (
        strpos($question, "allergy") !== false ||
        strpos($question, "allergic") !== false
    ) {
        $response = "Allergies can cause symptoms such as sneezing, itching, rash, or watery eyes. Identifying and avoiding triggers can help. Seek urgent medical attention if there is difficulty breathing or swelling of the face or throat.";
    }

    /* Asthma */
    elseif (
        strpos($question, "asthma") !== false ||
        strpos($question, "wheezing") !== false
    ) {
        $response = "Asthma can cause breathing difficulty, wheezing, coughing, or chest tightness. People with asthma should follow their prescribed treatment plan. Severe breathing difficulty requires urgent medical attention.";
    }

    /* Back Pain */
    elseif (
        strpos($question, "back pain") !== false ||
        strpos($question, "backache") !== false
    ) {
        $response = "Back pain can result from muscle strain, posture, injury, or other conditions. Gentle activity and proper posture may help in some cases. Consult a healthcare professional if pain is severe, persistent, or associated with weakness or numbness.";
    }

    /* Toothache */
    elseif (
        strpos($question, "toothache") !== false ||
        strpos($question, "tooth pain") !== false
    ) {
        $response = "Tooth pain may be caused by cavities, infection, gum problems, or other dental conditions. Maintain oral hygiene and arrange a dental examination, especially if pain or swelling persists.";
    }

    /* Dehydration */
    elseif (
        strpos($question, "dehydration") !== false ||
        strpos($question, "dehydrated") !== false
    ) {
        $response = "Dehydration occurs when the body loses more fluid than it takes in. Common signs can include thirst, dry mouth, weakness, and reduced urination. Drink appropriate fluids and seek medical care if dehydration is severe.";
    }

    /* Skin Problems */
    elseif (
        strpos($question, "skin rash") !== false ||
        strpos($question, "rash") !== false ||
        strpos($question, "itching") !== false
    ) {
        $response = "Skin rashes and itching can have many causes, including allergies, irritation, infections, or other conditions. Avoid known irritants and consult a healthcare professional if the rash is severe, spreading, or persistent.";
    }

    /* Pregnancy */
    elseif (
        strpos($question, "pregnancy") !== false ||
        strpos($question, "pregnant") !== false
    ) {
        $response = "Pregnancy-related health questions should be discussed with a qualified healthcare professional. Regular prenatal care is important, and urgent symptoms should receive prompt medical attention.";
    }

    /* Mental Health */
    elseif (
        strpos($question, "stress") !== false ||
        strpos($question, "anxiety") !== false ||
        strpos($question, "depression") !== false
    ) {
        $response = "Stress, anxiety, and low mood can affect daily life. Maintaining sleep, physical activity, social connection, and healthy routines may help. If symptoms are persistent or affecting daily functioning, consider speaking with a qualified mental-health professional.";
    }

    /* Doctor / Appointment */
    elseif (
        strpos($question, "doctor") !== false ||
        strpos($question, "appointment") !== false
    ) {
        $response = "You can use the Appointment Management section of this Hospital Management System to book an appointment with a doctor.";
    }

    /* Hospital */
    elseif (
        strpos($question, "hospital") !== false ||
        strpos($question, "system") !== false
    ) {
        $response = "Welcome to the Hospital Management System. You can manage patients, doctors, appointments, and use this chatbot for general health information.";
    }

    /* Greeting */
    elseif (
        $question == "hi" ||
        $question == "hello" ||
        $question == "hey" ||
        $question == "namaste"
    ) {
        $response = "Hello! 👋 I am the Hospital Medical Chatbot. You can ask me about common health topics such as fever, headache, cough, cold, diabetes, blood pressure, dengue, malaria, and more.";
    }

    /* Unknown */
    else {
        $response = "I couldn't identify the medical topic in your question yet.

Please try asking about:

• Fever
• Headache
• Cough
• Cold / Sardi-Jukam
• Sore throat
• Diabetes
• Blood pressure
• Dengue
• Malaria
• Typhoid
• Vomiting
• Diarrhea
• Stomach pain
• Allergy
• Asthma
• Back pain
• Toothache
• Dehydration
• Skin rash
• Stress or anxiety

You can also ask about doctors or appointments.";
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Medical Chatbot - Hospital Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            min-height: 100vh;
        }

        .chat-card {
            max-width: 850px;
            margin: auto;
        }

        .bot-icon {
            font-size: 55px;
        }

        .response-box {
            background: #f1f8ff;
            border-left: 5px solid #0d6efd;
            white-space: normal;
        }

        .topic-btn {
            margin: 4px;
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


    <div class="chat-card">


        <!-- CHATBOT CARD -->

        <div class="card border-0 shadow">


            <!-- HEADER -->

            <div class="card-body text-center p-4">

                <div class="bot-icon">
                    🤖
                </div>

                <h2 class="fw-bold">
                    Medical Assistant
                </h2>

                <p class="text-muted">
                    Rule-Based Medical Chatbot
                </p>

                <span class="badge bg-success">
                    ● Online
                </span>

            </div>


            <hr class="m-0">


            <!-- CHAT AREA -->

            <div class="card-body p-4">


                <?php if ($response != "") { ?>

                    <!-- USER QUESTION -->

                    <div class="mb-3">

                        <div class="text-end">

                            <span class="badge bg-primary p-2">
                                You
                            </span>

                        </div>

                        <div class="alert alert-primary mt-2">

                            <?php
                            echo htmlspecialchars($question);
                            ?>

                        </div>

                    </div>


                    <!-- BOT RESPONSE -->

                    <div class="mb-4">

                        <span class="badge bg-success p-2">
                            🤖 Medical Assistant
                        </span>

                        <div class="response-box p-3 mt-2 rounded">

                            <?php
                            echo nl2br(
                                htmlspecialchars($response)
                            );
                            ?>

                        </div>

                    </div>

                <?php } else { ?>


                    <!-- WELCOME -->

                    <div class="text-center p-4">

                        <h5>
                            👋 Hello!
                        </h5>

                        <p class="text-muted">
                            Ask me a general health-related question.
                        </p>

                    </div>


                <?php } ?>


                <!-- QUESTION FORM -->

                <form method="POST">

                    <label class="form-label fw-semibold">

                        Ask your question

                    </label>

                    <textarea
                        name="question"
                        class="form-control"
                        rows="3"
                        placeholder="Example: What are the symptoms of dengue?"
                        required
                    ><?php
                        echo htmlspecialchars($question);
                    ?></textarea>


                    <div class="d-grid mt-3">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg"
                        >

                            🤖 Ask Medical Assistant

                        </button>

                    </div>

                </form>


            </div>


            <!-- COMMON TOPICS -->

            <div class="card-footer bg-white p-4">

                <h6 class="fw-bold">
                    💡 Common Topics
                </h6>

                <div>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('What are the symptoms of fever?')"
                    >
                        Fever
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('What should I do for headache?')"
                    >
                        Headache
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('I have cough')"
                    >
                        Cough
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('I have sardi jukam')"
                    >
                        Cold
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('What are dengue symptoms?')"
                    >
                        Dengue
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('Tell me about malaria')"
                    >
                        Malaria
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('What is diabetes?')"
                    >
                        Diabetes
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm topic-btn"
                        onclick="askTopic('What is blood pressure?')"
                    >
                        Blood Pressure
                    </button>

                </div>

            </div>


            <!-- DISCLAIMER -->

            <div class="card-footer bg-light">

                <small class="text-muted">

                    ⚠️ <strong>Medical Disclaimer:</strong>
                    This chatbot provides general educational
                    information only. It does not provide medical
                    diagnosis or prescribe medication. For diagnosis
                    or treatment, consult a qualified healthcare
                    professional.

                </small>

            </div>


        </div>


        <!-- BACK -->

        <div class="text-center mt-3">

            <a
                href="../dashboard.php"
                class="text-decoration-none"
            >
                ← Back to Dashboard
            </a>

        </div>


    </div>

</div>


<script>

function askTopic(text) {

    document.querySelector(
        'textarea[name="question"]'
    ).value = text;

    document.querySelector(
        'textarea[name="question"]'
    ).focus();

}

</script>


</body>

</html>