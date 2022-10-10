<div class="container">

<table>
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Coach</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($exercicesList as $exercices){ ?>
                <tr>
                    <td><?=$exercices->id?></td>
                    <td><?=$exercices->name?></td>
                    <td><?=$exercices->description?></td>
                    <td>
                        <?php
                            foreach($usersList as $users){
                                if($users->ID == $exercices->ID_users){
                                    echo $users->firstname;
                                }
                            }
                        ?>
                        </td>
                    <td class ="activeCase"><a href="/modify-exercice?id=<?=$exercices->id?>"> Voir l'exercice </a></td>
                    <td class="delete"><a href="/delete-exercice?id=<?=$exercices->id?>">Supprimer l'exercice</a> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

<a href="/ajouter-exercice"  id="connection">Ajouter un exercice</a>

    
</div>

