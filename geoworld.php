<?php require_once 'header.php'; ?>
    <script src="js/datamaps.world.min.js"></script>
<center>

    <div id="container" style="position: relative; width: 1200px; height: 680px;"></div>

    <script>
        var map = new Datamap(
            {
            element: document.getElementById('container');

        }
            );
    </script>

</center>
<?php require_once 'footer.php'; ?>