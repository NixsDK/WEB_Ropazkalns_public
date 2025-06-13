<?php
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
