<?php

declare(strict_types=1);


$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $_POST['name'] ?? "";
    $age = $_POST['age'] ?? "";
    $pet_type = $_POST['pet_type'] ?? "";


    switch ($pet_type) {
        case 'dog':
            $pet = new Dog($name, $age);
            array_push($_SESSION['pets'], $pet);

            //$pets[] = $pet;
            //$pet->sayHello();
            //$pet->petMessage();
            break;
        case 'cat':
            $pet = new Cat($name, $age);
            array_push($_SESSION['pets'], $pet);

            //$pets[] = $pet;
            //$pet->sayHello();
            //$pet->petMessage();
            break;
        case 'bird':
            $pet = new Bird($name, $age);
            array_push($_SESSION['pets'], $pet);
            //$pets[] = $pet;
            //$pet->sayHello();
            //$pet->petMessage();
            break;
        default:
            $message = "Please input pet data";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
