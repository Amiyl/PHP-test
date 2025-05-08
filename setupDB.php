<?php
/*
 Integrity Statement:
 certify that this submission is my own original work.
 Name: [Amiyl Naimzadeh]
*/



try {
    // 1. Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=bcs350fa24', 'userfa24', 'pwdfa24');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Drop and create the 'student' table
    $pdo->exec("DROP TABLE IF EXISTS student");
    $pdo->exec("CREATE TABLE IF NOT EXISTS student (
        sid VARCHAR(10) PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(15),
        start_year YEAR,
        gpa DECIMAL(3, 2)
    )");

    // 3. Insert initial data into the 'student' table
    $pdo->exec("INSERT INTO student (sid, name, email, phone, start_year, gpa) VALUES
        ('12202', 'Zetty Lieberman', 'liebez@far.edu', '631-348-4873', 2021, 2.80),
        ('15483', 'Jack Allison', 'allisj@far.edu', '234-837-9872', 2021, 3.75),
        ('27372','Kyle Menchin', 'menchk@far.edu','929-384-1927', 2022, 3.10),
        ('42010','Alice Brown','browna@far.edu','212-123-4567', 2023, 3.50)");

    // 4. Drop and create the 'users' table
    $pdo->exec("DROP TABLE IF EXISTS users");
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        username VARCHAR(32) PRIMARY KEY NOT NULL,
        email VARCHAR(32) NOT NULL,
        password VARCHAR(256) NOT NULL
    )");

    // 5. Display success message
    echo "<fieldset>";
    echo "<legend>Setup Information</legend>";
    echo "Tables 'student' and 'users' have been created and initial data inserted.";
    echo "</fieldset>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
