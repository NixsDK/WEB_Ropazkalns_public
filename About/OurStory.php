<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>


<main class="our-story-wrapper">

    <!-- Header image and title -->
    <div class="story-header-image">
        <img src="../images/Ropazkalns2.JPG" alt="Ropažkalns Our Story">
        <div class="story-overlay">
            <h1 class="story-title">
                <?php echo $texts['our_story_title'] ?? 'Mūsu stāsts'; ?>
            </h1>
        </div>
    </div>

    <!-- Scrollable story content -->
    <div class="scroll-box">
        <p class="scroll-text">
            <?php echo $texts['our_story_paragraph_1'] ?? 'Ropažkalns radās no mūsu aizraušanās ar dabu un lauku vidi.'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_story_paragraph_2'] ?? 'Apkārt esošie zaļojošie meži un mierīgie pakalni iedvesmoja mūs izveidot vietu, kur cilvēki var atrast mieru un atpūsties prom no pilsētas kņadas.'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_story_paragraph_3'] ?? 'Ideja radās no personīgas pieredzes – vēlmes atrast vietu Latvijā, kur var vienkārši baudīt klusumu, telpu un dabu bez traucējumiem.'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_story_paragraph_4'] ?? 'Papildu āra aktivitātēm piedāvājam arī naktsmītnes, kas harmoniski iekļaujas dabā.'; ?>
        </p>

        <p class="scroll-text">
            <?php echo $texts['our_story_paragraph_5'] ?? 'Aicinām jūs piedzīvot klusumu, mieru un īstu saikni ar dabu Ropažkalnā.'; ?>
        </p>
    </div>

</main>

<?php include "../footer.php"; ?>
</body>
</html>