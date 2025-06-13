<?php
// Load translations
$langCode = $_GET['lang'] ?? 'lv';
$translationsPath = __DIR__ . "/../translations/$langCode/$langCode.json";

if (file_exists($translationsPath)) {
    $lang = json_decode(file_get_contents($translationsPath), true);
} else {
    die("Translation file not found for language: $langCode");
}

// Load PHPMailer
require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Send form
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmass.co';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gmass';
        $mail->Password   = '7896fc55-3afb-4c58-ba14-bf43053f3149';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('anrik.fedotovs2003@gmail.com', 'Contact Form');
        $mail->addAddress('niksdanielskalnins@gmail.com');
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = 'Name: ' . $name . '<br>Email: ' . $email . '<br>Message: ' . nl2br($message);

        $mail->send();
        $success = $lang['form_success'] ?? 'Email sent successfully.';
    } catch (Exception $e) {
        $error = $lang['form_error'] ?? 'Email could not be sent.' . ' Error: ' . $mail->ErrorInfo;
    }
}
?>

<?php include "../head.php"; ?>

<main>
    <section class="intro-section">
        <div class="info-box">
            <h2><?= $lang['contact_general_title'] ?></h2>
            <p><?= $lang['contact_general_paragraph'] ?></p>

            <?php if (!empty($success)) echo "<p style='color: green;'>$success</p>"; ?>
            <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>

            <form method="POST" action="?lang=<?= htmlspecialchars($langCode) ?>" class="contact-form">
                <label for="name"><?= $lang['form_name'] ?>:</label><br>
                <input type="text" name="name" required><br><br>

                <label for="email"><?= $lang['form_email'] ?>:</label><br>
                <input type="email" name="email" required><br><br>

                <label for="message"><?= $lang['form_message'] ?>:</label><br>
                <textarea name="message" rows="5" required></textarea><br><br>

                <button type="submit" class="btn btn-rent"><?= $lang['form_submit'] ?></button>
            </form>
        </div>
    </section>
</main>

<?php include "../footer.php"; ?>
</body>
</html>
