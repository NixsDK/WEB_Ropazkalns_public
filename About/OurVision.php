<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>


<main class="our-story-wrapper">

    <div class="story-header-image">
        <img src="../images/Ropazkalns2.JPG" alt="Ropažkalns Our Vision">
        <div class="story-overlay">
            <h1 class="story-title"><?php echo $texts['our_vision_title'] ?? 'Mūsu vīzija'; ?></h1>
        </div>
    </div>

    <div class="scroll-box">
        <p class="scroll-text">
            <?php echo $texts['our_vision_paragraph_1'] ?? 'Ropažkalns atrodas skaistā Latvijas lauku apvidū, ko ieskauj zaļojoši meži un viļņoti pakalni...'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_vision_paragraph_2'] ?? 'Mūsu misija ir sniegt unikālu un neaizmirstamu pieredzi mūsu viesiem...'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_vision_paragraph_3'] ?? 'Ropažkalnā mēs piedāvājam plašu aktivitāšu klāstu, tostarp pārgājienus...'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_vision_paragraph_4'] ?? 'Papildus āra aktivitātēm mēs piedāvājam arī dažādas naktsmītnes...'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_vision_paragraph_5'] ?? 'Neatkarīgi no tā, vai meklējat mierīgu atpūtu vai piedzīvojumiem bagātu ceļojumu...'; ?>
        </p>
    </div>

    <?php include "../footer.php"; ?>
