<?php
require_once 'header.php';
//require_once 'inc/manager-db.php';

?>

    <div class="ui container main">

        <script>
            $(function(){
                $('#admin').click(function(){
                    $('#DivA').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
                });
            });
        </script>


        <script>
            $(function(){
                $('#prof').click(function(){
                    $('#DivP').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
                });
            });
        </script>

        <?php

        if(protection_admin()){
            echo '<br><center>';
            echo '<font size="50" color="red">';
            echo 'Connectez vous en Admin !!';
            echo '</font></center>';
        }
        else{
            ?>


            <center>
                <br>
                <input type="submit" id="prof" value="Professeur" style="width:260px;height: 75px;color: blue;border:2px solid black;border-radius:7px;">
                <input type="submit" id="admin" value="Administrateur" style="width:260px;height: 75px;color: red;border:2px solid black;border-radius:7px;">
            </center>
            <div id="DivP" style="display:none;">

                <form method="post" action="#">
                    <br>
                    Executer une requete :<br><br>
                    <textarea name="bla" rows="10" cols="200"></textarea>
                    <br><br>
                    <input type="submit" name="req" value="Accepter">
                </form>

            </div>




        <?php

        if (isset($_POST['modif'])) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $login=$_POST['loginuser'];
        $mdp=$_POST['passworduser'];
        $id=$_POST['id'];
        updateSalarieRR($nom,$prenom,$login,$mdp,$id);
        ?>
            <script> location.replace("gestion_admin.php"); </script>
        <?php
        }

        if (isset($_POST['req'])) {
        $bla=$_POST['bla'];
        requete($bla);
        ?>
            <script> location.replace("gestion_admin.php"); </script>
        <?php
        }
        ?>

    <div id="DivA" style="display:none;">

            <table style="text-align: center;" class="ui inverted red large fixed single line celled table">
                <br>
                <h1>Gestion des utilisateurs :</h1><br>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Login</th>
                <th>Mdp</th>
                <th>Email</th>
                <th>Nom-M</th>
                <th>Prénom-M</th>
                <th>Login-M</th>
                <th>Mdp-M</th>
                <th>Mise à jour</th>
                <th>Supprimer</th>
                <?php
                $listeuser = tabutilisateur();
                foreach ($listeuser as $key => $values) {
                    ?>
                    <tr>
                        <td><?php echo $listeuser[$key]->iduser; ?></td>
                        <td><?php echo $listeuser[$key]->nom; ?></td>
                        <td><?php echo $listeuser[$key]->prenom; ?></td>
                        <td><?php echo $listeuser[$key]->datenaissance; ?></td>
                        <td><?php echo $listeuser[$key]->loginuser; ?></td>
                        <td><?php echo $listeuser[$key]->passworduser; ?></td>
                        <td><?php echo $listeuser[$key]->email; ?></td>
                        <form method="post" action="#">
                            <input type="hidden" name="id" value="<?php echo $listeuser[$key]->iduser; ?>">

                            <td>
                                <input type="text" name="nom" value="<?php echo $listeuser[$key]->nom; ?>">
                            </td>
                            <td>
                                <input type="text" name="prenom" value="<?php echo $listeuser[$key]->prenom; ?>">
                            </td>
                            <td>
                                <input type="text" name="loginuser" value="<?php echo $listeuser[$key]->loginuser; ?>">
                            </td>
                            <td>
                                <input type="text" name="passworduser" value="<?php echo $listeuser[$key]->passworduser; ?>">
                            </td>
                            <td>
                                <input type="submit" name="modif" value="Modifier">
                            </td>
                        </form>
                        <td><a href="delete_user.php?iduser=<?php echo $listeuser[$key]->iduser; ?>">Supprimer</a></td>
                    </tr>
                <?php } ?>
            </table>

    </div>

            <?php
        }

        ?>

    </div>

<?php
require_once 'footer.php';
?>