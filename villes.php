<?php require_once 'header.php'; ?>

<div class="ui container main">
    <h1>Liste des villes</h1>
    <div>
        <center>
            <?php
            require_once 'inc/manager-db.php';
            $ville = getAllCity();

            ?>
    </div>
    <center>
        <table style="text-align: center;" class="ui inverted grey large fixed single line celled table">
            <tr>
                <th>Name</th>
                <th>District</th>
                <th>Population</th>
            </tr>
            <tr>
                <?php
                foreach ($ville as $key=>$values){

                $drap = drapeau2($ville[$key]->idCountry);
                $drap = $str = strtolower($drap);

                ?>
            <tr>
                <td><i class="<?php echo $drap; ?> flag"></i><?php echo $ville[$key]->Name; echo combler_vide($ville[$key]->Name);?></td>
                <td><?php echo $ville[$key]->District; echo combler_vide($ville[$key]->District);?></td>
                <td><?php echo $ville[$key]->Population; echo combler_vide($ville[$key]->Population);?> habitants</td>
            </tr>
            <?php } ?>
        </table>
    </center>
</div>
<br>

<?php
require_once 'footer.php';
?>
