<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $string1 = $_POST['string1'];
    $string2 = $_POST['string2'];

    // Fetching user data from randomuser.me API
    $url1 = "https://randomuser.me/api/?seed=$string1";
    $url2 = "https://randomuser.me/api/?seed=$string2";

    $user1 = json_decode(file_get_contents($url1), true);
    $user2 = json_decode(file_get_contents($url2), true);

    if (isset($user1['error']) || isset($user2['error'])) {
        die('Error fetching user data from API.');
    }

    // used to get date of birth for each user
    $dob1 = new DateTime($user1['results'][0]['dob']['date']);
    $dob2 = new DateTime($user2['results'][0]['dob']['date']);

    // using date of birth to calculate ages
    $age1 = $dob1->diff(new DateTime('now'))->y;
    $age2 = $dob2->diff(new DateTime('now'))->y;

    // this is used to calculate age difference
    $ageDifference = abs($age1 - $age2);

    // this is used to store data in db
    $stmt = $pdo->prepare("INSERT INTO age_differences (string_1, dob_1, age_1, string_2, dob_2, age_2, age_difference) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$string1, $dob1->format('Y-m-d'), $age1, $string2, $dob2->format('Y-m-d'), $age2, $ageDifference]);

    
    if (php_sapi_name() != 'cli') {
        header("Location: index.php?result=true&string1=$string1&string2=$string2");
    } else {
        echo "String 1: <strong>$string1</strong> | DOB: <strong>" . $dob1->format('Y-m-d') . "</strong> | Age: <strong>$age1</strong><br>";
        echo "String 2: <strong>$string2</strong> | DOB: <strong>" . $dob2->format('Y-m-d') . "</strong> | Age: <strong>$age2</strong><br>";
        echo "The age difference between <strong>$string1</strong> and <strong>$string2</strong> is <strong>$ageDifference</strong> years.";
    }
}

