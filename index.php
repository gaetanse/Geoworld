<?php require_once 'header.php'; ?>

<?php
//require_once 'inc/manager-db.php';

if(isset($_GET['continent'])){
    $continent = $_GET['continent'];
    $pays = getCountriesByContinent($continent);
}else{
    $continent = 'Asia';
    $pays = getCountriesByContinent($continent);
}

?>

<div class="ui container main">

    <h1>Liste des pays d' <?php echo $continent;?></h1>

    <div>
        <center>

    </div>
        <center>
        <table style="text-align: center;" class="ui inverted grey large fixed single line celled table">
            <tr>
                <th>Pays</th>
                <th>Surface</th>
                <th>Population</th>
                <th>Duree de vie</th>
                <th>Capitale</th>
            </tr>
            <tr>
                <?php
                foreach ($pays as $key=>$values){

                $drap = drapeau($pays[$key]->Name);
                $drap = $str = strtolower($drap);

                ?>
                <tr>
                <td><i class="<?php echo $drap; ?> flag"></i><?php echo $pays[$key]->Name; echo combler_vide($pays[$key]->Name);?></td>
                <td><?php echo $pays[$key]->SurfaceArea; echo combler_vide($pays[$key]->SurfaceArea);?> km²</td>
                <td><?php echo $pays[$key]->Population; echo combler_vide($pays[$key]->Population);?> habitants</td>
                <td><?php echo $pays[$key]->LifeExpectancy; echo combler_vide($pays[$key]->LifeExpectancy);?> ans</td>
                <td><?php echo getCapital($pays[$key]->Capital); echo combler_vide($pays[$key]->Capital);?></td>
                </tr>
                <?php } ?>
        </table>
        </center>
    </div>
<br>
<?php require_once 'footer.php'; ?>