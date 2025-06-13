<?php
>

<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>

<main class="rental-section">
    <h2><?= htmlspecialchars($translations['contact_booking_title'] ?? 'TITLE MISSING') ?></h2>
    <p><?= htmlspecialchars($translations['contact_booking_paragraph'] ?? 'PARAGRAPH MISSING') ?></p>

    <?php include '../Calendar.php'; ?>
</main>

<?php include "../footer.php"; ?>
