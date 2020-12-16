<?php
if (isset($_POST['page'])) {

    $sql = mysqli_connect("localhost", "root");
    $sql->query("USE furworks");

    $res = $sql->query("SELECT * FROM goods WHERE id>" . (($_POST['page'] - 1) * 10) . " AND id <= " . ($_POST["page"] * 10) . ";");
    $sql->close();

    $arr = array();

    for ($i = 0;; ++$i) {
        $row = mysqli_fetch_array($res);
        if (empty($row)) {
            break;
        }
        $arr[$i] = $row;
    }

    echo json_encode($arr);
} else {

    echo json_encode(array("bobik" => 22));
}
