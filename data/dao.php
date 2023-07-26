<?php 


    require("connection.php");

    function getUser($name){
        $conn = connection();
        $sql = "SELECT * FROM user WHERE name=? ";
        
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("s", $name);

        $stmt->execute();
        $result = $stmt->get_result();
        
        $stmt->close();
        $conn->close();

        return $result->fetch_array();
    }

    function getDay($day){
        $result = connection()->query('SELECT Schedule.*, User.username
        FROM Schedule
        INNER JOIN User ON Schedule.supervisor = User.id WHERE day='.$day.'');

        return $result; 

    }

    function allUsers(){
        $allUsers = connection()->query('SELECT * from user');

        return $allUsers;
    }

    function allDays(){
        $allDays = connection()->query('SELECT * from schedule');

        return $allDays;
    }

    function insert($day, $inithour, $endhour, $month, $description, $userid, $expire, $year){
        $conn = connection();
        $sql = "INSERT INTO schedule(day, inithour, endhour, month, description, supervisor, expire, year) VALUES (?, ?, ? ,?, ?, ?,?, ?) ";
        
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("iiisssss", $day, $inithour, $endhour, $month, $description, $userid, $expire, $year);
        
        if($stmt->execute()){

            echo "<script>location.href = './';</script>";
        }

        $stmt->close();
        $conn->close();
    }

    function delete($id){
        $conn = connection();
        $sql = "DELETE FROM Schedule WHERE id=? ";
        
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("i", $id);

        if($stmt->execute()){

            echo "<script>location.Reload();location.href = './';</script>";
        }

        
        $stmt->close();
        $conn->close();
    }

    function register($name, $password, $username){
        $conn = connection();
        $sql = "INSERT INTO user(name, password, username) VALUES(?,?, ?) ";
        
        $stmt = mysqli_prepare($conn, $sql);    
        $stmt->bind_param("sss", $name, password_hash($password, PASSWORD_DEFAULT), $username);

        if($stmt->execute()){

            echo "<script>location.Reload();location.href = './';</script>";
        }
        
        $stmt->close();
        $conn->close();
    }

    function deleteSup($id){
        $conn = connection();
        $sql = "DELETE FROM User WHERE id=? ";
        
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    function deleteBySupId($id){
        $conn = connection();
        $sql = "DELETE FROM Schedule WHERE supervisor=? ";
        
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("i", $id);

        $stmt->execute();
        
        $stmt->close();
        $conn->close();
    }

    function updateSup($id, $username, $name, $password){
        $conn = connection();
        $sql = "UPDATE user SET name=?, username=?, password=? WHERE id=?";
        
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("sssi", $name, $username, $password, $id);

        if($stmt->execute()){
            echo "<script>location.href = 'admin';</script>";
        }else{
            echo $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    function getSchedule($id){
        $allUsers = connection()->query('SELECT * from schedule WHERE supervisor='.$id.'');

        return $allUsers;
    }



  

?>