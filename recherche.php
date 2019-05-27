<?php require_once 'header.php'; ?>

    <div class="ui container main">
        <?php
        require_once 'inc/manager-db.php';


        if (isset($_POST['ville'])) {
            $ville = $_POST['Tville'];
            $ville2 = cherchVille($ville);
        }

        if (isset($_POST['pays'])) {
            $pays = $_POST['Tpays'];
            $ville2 = cherchPays($pays);
        }

        ?>
        <h1>Recherche sur

            <?php
            if (isset($_POST['ville'])) {
            echo $ville;
            }
            if (isset($_POST['pays'])) {
            echo $pays;
            }
            ?>

        </h1>
        <div>
            <center>

        </div>
        <body>
        <center>
            <table style="text-align: center;" class="ui inverted grey large fixed single line celled table">

                <?php

                if (isset($_POST['ville'])) {
                    ?>
                    <tr>
                        <th>IdCountry</th>
                        <th>Name</th>
                        <th>District</th>
                        <th>Population</th>

                    </tr>
                    <?php
                }

                if (isset($_POST['pays'])) {
                    ?>
                    <tr>
                        <th>Pays</th>
                        <th>Surface</th>
                        <th>Population</th>
                        <th>Duree de vie</th>
                        <th>Capitale</th>

                    </tr>
                    <?php
                }

                ?>


                <tr>
                    <?php
                    foreach ($ville2 as $key=>$values){

                         if (isset($_POST['pays'])) {
                             $drap = drapeau($ville2[$key]->Name);
                             $drap = $str = strtolower($drap);
                         }

                    if (isset($_POST['ville'])) {
                        $drap2 = drapeau2($ville2[$key]->idCountry);
                        $drap2 = $str = strtolower($drap2);
                    }

                    ?>

                    <?php

                    if (isset($_POST['ville'])) {
                    ?>
                <tr>
                    <td><?php echo $ville2[$key]->idCountry; echo combler_vide($ville2[$key]->idCountry);?></td>
                    <td><i class="<?php echo $drap2; ?> flag"></i> <?php echo $ville2[$key]->Name; echo combler_vide($ville2[$key]->Name);?></td>
                    <td><?php echo $ville2[$key]->District; echo combler_vide($ville2[$key]->District);?></td>
                    <td><?php echo $ville2[$key]->Population; echo combler_vide($ville2[$key]->Population);?> habitants</td>
                </tr>
            <?php
            }

            if (isset($_POST['pays'])) {
                ?>
                <tr>
                    <td><i class="<?php echo $drap; ?> flag"></i> <?php echo $ville2[$key]->Name; echo combler_vide($ville2[$key]->Name);?></td>
                    <td><?php echo $ville2[$key]->SurfaceArea; echo combler_vide($ville2[$key]->SurfaceArea);?> km²</td>
                    <td><?php echo $ville2[$key]->Population; echo combler_vide($ville2[$key]->Population);?> habitants</td>
                    <td><?php echo $ville2[$key]->LifeExpectancy; echo combler_vide($ville2[$key]->LifeExpectancy);?> ans</td>
                    <td><?php echo getCapital($ville2[$key]->Capital); echo combler_vide($ville2[$key]->Capital);?></td>

                </tr>
            </table>
            <table style="text-align: center;" class="ui inverted grey large fixed single line celled table">

                    <tr>

                        <th>id</th>
                        <th>Code</th>
                        <th>Region</th>
                        <th>IndepYear</th>
                        <th>LifeExpectancy</th>

                    </tr>


                <tr>
                    <td><?php echo $ville2[$key]->id; echo combler_vide($ville2[$key]->id);?></td>
                    <td><?php echo $ville2[$key]->Code; echo combler_vide($ville2[$key]->Code);?></td>
                    <td><?php echo $ville2[$key]->Region; echo combler_vide($ville2[$key]->Region);?></td>
                    <td><?php echo $ville2[$key]->IndepYear; echo combler_vide($ville2[$key]->IndepYear);?></td>
                    <td><?php echo $ville2[$key]->LifeExpectancy; echo combler_vide($ville2[$key]->LifeExpectancy);?></td>
                </tr>
            </table>
            <table style="text-align: center;" class="ui inverted grey large fixed single line celled table">

                <tr>

                    <th>GNP</th>
                    <th>GNPOld</th>
                    <th>LocalName</th>
                    <th>GovernmentForm</th>
                    <th>HeadOfState</th>

                </tr>


                <tr>
                    <td><?php echo $ville2[$key]->GNP; echo combler_vide($ville2[$key]->GNP);?></td>
                    <td><?php echo $ville2[$key]->GNPOld; echo combler_vide($ville2[$key]->GNPOld);?></td>
                    <td><?php echo $ville2[$key]->LocalName; echo combler_vide($ville2[$key]->LocalName);?></td>
                    <td><?php echo $ville2[$key]->GovernmentForm; echo combler_vide($ville2[$key]->GovernmentForm);?></td>
                    <td><?php echo $ville2[$key]->HeadOfState; echo combler_vide($ville2[$key]->HeadOfState);?></td>
                </tr>

                <?php
            }

            ?>

            <?php } ?>
                </tr>
            </table>
        </center>
    </div>
    </body>
    <br>
<?php
require_once 'footer.php';
?>