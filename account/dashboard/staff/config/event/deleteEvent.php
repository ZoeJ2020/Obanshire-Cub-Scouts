<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];

$delRegister = $conn->prepare('DELETE 
from registered
    where fk_reg_event_id = '.$id.' ');

$delEvent = $conn->prepare('DELETE 
from event
    where id = '.$id.' ');

$delRegister->execute();
$delEvent->execute();
$conn->close();

header("Location: ../../");
?>
