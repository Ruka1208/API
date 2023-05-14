<?php
    
    include_once('../../../model/account_management/account_management.php');
    include_once('../../../controller/api/account_management/read.php');
    $users = new Users($connect);
    $read = $users->read();
    $url = '../../../controller/api/account_management/read.php';
    $data = file_get_contents($url); 
    $users_array = json_decode($data, true); 
    $stmt = $users->read();
    if ($stmt->rowCount() > 0) {
        $users_array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users_item = array(
                'id_users' => $row['id_users'],
                'username' => $row['username'],
                'email' => $row['email'],  
            );
            array_push($users_array, $users_item);
        }
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Username</th><th>Email</th></tr></thead>";
        echo "<tbody>";
        foreach ($users_array as $user) {
            echo "<tr>";
            echo "<td>".$user['id_users']."</td>";
            echo "<td>".$user['username']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No users found. Error: " . json_encode($stmt->errorInfo());
    }
?>