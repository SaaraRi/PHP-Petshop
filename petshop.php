<?php

declare(strict_types=1);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? "");
    $age = trim($_POST['age'] ?? "");
    $pet_type = $_POST['pet_type'] ?? "";

    if ($name !== "" && $age !== "" && is_numeric($age)) {
        switch ($pet_type) {
            case 'dog':
                $pet = new Dog($name, (int)$age);
                array_push($_SESSION['pets'], $pet);
                break;
            case 'cat':
                $pet = new Cat($name, (int)$age);
                array_push($_SESSION['pets'], $pet);
                break;
            case 'bird':
                $pet = new Bird($name, (int)$age);
                array_push($_SESSION['pets'], $pet);
                break;
            default:
                $message = "Please select a valid pet type.";
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $message = "Please fill out all fields with valid data.";
    }
}
