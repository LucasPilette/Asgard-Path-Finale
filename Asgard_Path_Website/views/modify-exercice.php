<div class="container">
    <form action="" method="post" class='signUpForm'novalidate>
        <div class="formDiv">
            <label for="name"> Nom</label>
        <input type="text"id="name" name="name" required value="<?= $exercice->name ?? '' ?>">
        <div class="error"><?= $errors['lastname'] ?? '' ?></div>
        <label for="description"> Description</label>
        <input type="text"id="description" name="description" required value="<?= $exercice->description ?? '' ?>">
        <div class="error"><?= $errors['description'] ?? '' ?></div>
        <div class="submitDiv">
        <input type="submit" value="Modifier">
        </div>
        </div>
    </form>
</div>