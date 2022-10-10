<div class="c">
    <form action="" method="post" novalidate>
        <div class="formDiv">
            <label for="lastname"> Nom</label>
        <input type="text"id="lastname" name="lastname" required value="<?= $user->lastname ?? '' ?>">
        <div class="error"><?= $errors['lastname'] ?? '' ?></div>
        <label for="firstname"> Prénom</label>
        <input type="text"id="firstname" name="firstname" required value="<?= $user->firstname ?? '' ?>">
        <div class="error"><?= $errors['firstname'] ?? '' ?></div>
        <label for="email"> E-mail</label>
        <input type="email"id="email" name="email" required value="<?= $user->mail ?? '' ?>">
        <div class="error"><?= $errors['email'] ?? '' ?></div>
        <label for="login"> Pseudo</label>
        <input type="text"id="login" name="login" required value="<?= $user->login ?? '' ?>">
        <div class="error"><?= $errors['login'] ?? '' ?></div>
        <div class="submitDiv">
        <input type="submit" value="Modifier">
        </div>
        </div>
    </form>
</div>