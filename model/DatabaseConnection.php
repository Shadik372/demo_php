<?php

class DatabaseConnection
{

    function openConnection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "lnf";

        $connection = new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_name
        );

        if ($connection->connect_error) {

            die(
                "Can not connect to the database, please double check the credentials. "
                . $connection->connect_error
            );
        }

        return $connection;
    }


    function checkEmail($connection, $tableName, $email)
    {
        $sql = "SELECT * FROM $tableName
                WHERE email = '" . $email . "'";

        $result = $connection->query($sql);

        return $result;
    }


    function signup(
        $connection,
        $tableName,
        $name,
        $email,
        $phone,
        $password,
        $role
    ) {

        $sql = "INSERT INTO $tableName
                (name, email, phone, password, role)
                VALUES(
                    '" . $name . "',
                    '" . $email . "',
                    '" . $phone . "',
                    '" . $password . "',
                    '" . $role . "'
                )";

        $result = $connection->query($sql);

        return $result;
    }


    function login($connection, $tableName, $email, $password)
    {
        $sql = "SELECT * FROM $tableName
                WHERE email = '" . $email . "'
                AND password = '" . $password . "'";

        $result = $connection->query($sql);

        return $result;
    }

}

?>