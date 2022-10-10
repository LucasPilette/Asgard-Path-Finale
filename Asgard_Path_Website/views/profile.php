<div class="container">
<?php if(!empty($_SESSION['user_id'])){?>


    <p class="profileName"> Bonjour <?=$user->firstname.' '.$user->lastname?></p>

<?php 
};
if(isset($userList)){
?>

<table>
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Login</th>
            <th>Rôle</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
            <?php foreach($userList as $users){ ?>
                <tr>
                    <td><?=$users->ID?></td>
                    <td><?=$users->lastname?></td>
                    <td><?=$users->firstname?></td>
                    <td><a href="mailto:<?=$users->mail?>"><?=$users->mail?></a></td>
                    <td><?=$users->login?></td>
                    <td>
                        <?php
                            switch($users->id_roles){
                                case 1:
                                    $role = 'Admin';
                                    break;
                                case 2:
                                    $role = 'Utilisateur';
                                    break;
                                case 3: 
                                    $role = 'Coach';
                                    break;
                            }
                            echo $role;
                        ?>
                        </td>
                    <td class ="activeCase"><a href="/infos-utilisateur?id=<?=$users->ID?>"> Voir le profil </a></td>
                    <td class="delete"><a href="/delete-user?id=<?=$users->ID?>">Supprimer l'utilisateur</a> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    
    

    <a href="/exercices" id="connection">Modifier exercices</a>
    <?php
    }
?>


<form action="/profile" method="POST" class="disconnect">
    <input type="submit" value="Déconnexion" id="connection" />
</form>
</div>

