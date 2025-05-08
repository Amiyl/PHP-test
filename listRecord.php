<?php

/*
    Integrity Statement:
    I certify that this submission is my own original work.
    Name: [Amiyl Naimzadeh] 
 */


try {
    // 1. Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=bcs350fa24', 'userfa24', 'pwdfa24');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Determine the sorting field from the submitted form
    $sort_field = isset($_POST['sort_field']) ? $_POST['sort_field'] : 'sid';
    $allowed_fields = ['sid', 'name', 'email', 'phone', 'start_year', 'gpa'];
    if (!in_array($sort_field, $allowed_fields)) {
        $sort_field = 'sid';
    }

    // 3. Fetch sorted records from the 'student' table
    $stmt = $pdo->prepare("SELECT * FROM student ORDER BY $sort_field");
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 4. Display sorting form and table of records
    echo "<form method='post'>";
    echo "<label for='sort_field'>Sort By: </label>";
    echo "<select name='sort_field' id='sort_field' onchange='this.form.submit()'>";
    foreach ($allowed_fields as $field) {
        $selected = $field === $sort_field ? "selected" : "";
        echo "<option value='$field' $selected>" . ucfirst($field) . "</option>";
    }
    echo "</select>";
    echo "</form>";

    echo "<table border='1'>";
    echo "<tr><th>SID</th><th>Name</th><th>Email</th><th>Phone</th><th>Start Year</th><th>GPA</th></tr>";
    foreach ($students as $student) {
        echo "<tr>";
        foreach ($student as $field) {
            echo "<td>" . htmlspecialchars($field) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>