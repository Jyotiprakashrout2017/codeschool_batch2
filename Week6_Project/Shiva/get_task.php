<?php
include 'responce.php';
include 'db.php';

try {
    $statement = $pdo->prepare("SELECT employee_id , date(startDate) as startdate, date(endDate) as enddate, priority , taskDetails 
    FROM   tasks");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($response) == 0) {
        $response['status'] = false;
        $response['message'] = "no data found";
        echo json_encode($response);
        return;
    }
    $response['status'] = true;
    $response['message'] = "passed";
    $response['data'] = $resultSet;
    echo json_encode($response);
}
catch (PDOException $e) {
    echo json_encode([
        'status'=>false,
        'message'=>$$e->getMessage()(),
    ]);
}
?>