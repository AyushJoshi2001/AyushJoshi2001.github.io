<?php

    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $suggestion = $_POST['suggestion'];

    if(!empty($username) || !empty($gender) || !empty($email) || !empty($phone) || !empty($suggestion)){
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "form_data";

        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if(mysqli_connect_error()){
            die('Connext Erroe('.mysqli_connect_errno().')'. mysqli_connect_error());

        }else{
            $INSERT = "INSERT INTO form(username, gender, email, phone, suggestion) VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssis", $username, $gender, $email, $phone, $suggestion);
            
            $stmt->execute();
            echo "Your suggestion / query have been submitted.";

            $stmt->close();
            $conn->close();
        }

    }else{
        echo "All fields are required";
        die();
    }

?>