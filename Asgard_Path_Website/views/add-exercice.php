<div class="container">
    <form action="" method="post" class='signUpForm'novalidate>
        <div class="formDiv">
            <label for="name"> Nom</label>
        <input type="text"id="name" name="name" required value="<?= $name ?? '' ?>">
        <div class="error"><?= $errors['lastname'] ?? '' ?></div>
        <label for="description"> Description</label>
        <input type="text"id="description" name="description" required value="<?= $description ?? '' ?>">
        <div class="error"><?= $errors['description'] ?? '' ?></div>
        <div class="submitDiv">
        <input type="submit" value="Ajouter">
        </div>
        </div>
    </form>
</div>