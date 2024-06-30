<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Difference Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Calculate Age Difference</h1>
        <form action="process.php" method="post" class="input-form">
            <label for="string1">String 1:</label>
            <input type="text" id="string1" name="string1" required>
            <br><br>
            <label for="string2">String 2:</label>
            <input type="text" id="string2" name="string2" required>
            <br><br>
            <button type="submit">Calculate</button>
        </form>

        <?php
        // this is used to check if result parameter is set in url
        if (isset($_GET['result']) && $_GET['result'] == 'true') {
            // Display result with entered strings
            $string1 = htmlspecialchars($_GET['string1']);
            $string2 = htmlspecialchars($_GET['string2']);

            require 'db.php';

            //fetching data from database based on string1 and string2
            $stmt = $pdo->prepare("SELECT * FROM age_differences WHERE string_1 = ? AND string_2 = ?");
            $stmt->execute([$string1, $string2]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
            
                $dob1 = date('Y-m-d', strtotime($row['dob_1']));
                $dob2 = date('Y-m-d', strtotime($row['dob_2']));
                $ageDifference = $row['age_difference'];

                echo '<div class="output">';
                echo '<h2>Age Difference Result</h2>';
                echo "<p>String 1: <strong>$string1</strong> | DOB: <strong>$dob1</strong></p>";
                echo "<p>String 2: <strong>$string2</strong> | DOB: <strong>$dob2</strong></p>";
                echo "<p>The age difference between <strong>$string1</strong> and <strong>$string2</strong> is <strong>$ageDifference</strong> years.</p>";
                echo '</div>';
            } else {
                echo '<p>No results found.</p>';
            }
        }
        ?>
        
    </div>
</body>
</html>
