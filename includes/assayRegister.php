<?php
include "../DataLayer/db.php";
include "../LogicLayer/UserManager.php";
if(isset($_POST['newAssay'])){
    $newAssay = $_POST['newAssay'];
    $results = json_decode($_POST['newAssay'], true);
    $tc = $results['Assay'][0]['tc'];
    $assayNumber = $results['Assay'][0]['assayNumber'];
    if(UserManager::insertAssay($tc, $assayNumber))
        echo "asdad";
    echo "qweqweq";
}
?>