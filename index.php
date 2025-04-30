<?php

session_start();

class Petshop
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $name = ucfirst($name);
        $this->name = $name;
        $this->age = $age;
    }

    public function sayHello()
    {
        return "My name is " . "<span id='name'>" . "{$this->name}" . "</span>, <br>" . "and I'm " . "<span id='age'>" . "{$this->age}" . "</span> " . "years old.";
    }
}

class Dog extends Petshop
{
    public function petMessage()
    {
        if ($this->age < 5) {
            return "No pupperazzi, please!";
        } elseif ($this->age > 6 && $this->age < 10) {
            return "Cooome to the bark siide... ";
        } else {
            return "You’re my pup of tea," . "<br>" . "fur-real!";
        }
    }

    public function petImage()
    {
        return "https://placedog.net/800/640?id={$this->age}";
    }
};

class Cat extends Petshop
{
    public function petMessage()
    {
        if ($this->age < 6) {
            return "Press paws and" . "<br>" . "live in the meow!";
        } elseif ($this->age > 7 && $this->age < 12) {
            return "With the right cattitude," . "<br>" . "anything is pawsible!";
        } else {
            return "Meoooow!" . "<br>" . "Hope you have a purrfect day!";
        }
    }

    public function petImage()
    {
        return "https://cataas.com/cat/says/{$this->name}";
    }
}

class Bird extends Petshop
{
    public function petMessage()
    {
        if ($this->age < 10) {
            return "When you're feeling beak," . "<br>" . "let me carry some of your birdens!";
        } elseif ($this->age > 11 && $this->age < 20) {
            return "Just winging it here," . "<br>" . "how are you?";
        } else {
            return "Are you actually a lovebird," . "<br>" . "or just a tweetie pie?";
        }
    }

    public function petImage()
    {
        if ($this->age < 10) {
            return "https://www.birds4homesaviary.com/wp-content/uploads/2018/08/1-1.jpeg";
        } elseif ($this->age > 11 && $this->age < 20) {
            return "https://www.allthingswild.co.uk/wp-content/uploads/2022/01/dc6f962a-bf6d-4dcc-94a4-5d1489692c66.jpg";
        } else {
            return "https://petmeshop.com/wp-content/uploads/2020/09/vet-lovebird.jpg";
        }
    }
}

include "petshop.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&family=Bubblegum+Sans&family=Cal+Sans&family=Candal&family=Caprasimo&family=Carter+One&family=Chela+One&family=Chewy&family=Coiny&family=Concert+One&family=Dangrek&family=Dongle&family=Englebert&family=Fredoka:wght@300..700&family=Give+You+Glory&family=Gorditas:wght@400;700&family=Grandstander:ital,wght@0,100..900;1,100..900&family=Happy+Monkey&family=Jua&family=Klee+One&family=Knewave&family=Mitr:wght@200;300;400;500;600;700&family=Pacifico&family=Passion+One:wght@400;700;900&family=Playpen+Sans:wght@100..800&family=Poetsen+One&family=Protest+Strike&family=Quicksand:wght@300..700&family=Rum+Raisin&family=Sniglet:wght@400;800&family=Spicy+Rice&family=Titan+One&family=Trade+Winds&family=Wendy+One&display=swap" rel="stylesheet">

</head>

<body>
    <div class="page-container">
        <h1>Petshop Database &#x1F43E;</h1>
        <div class="form-container">
            <h2>Add Your Pet</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-input">
                    <label for="pet_type">Type of pet:</label>
                    <select name="pet_type" id="pet_type" <?php $pet_type = $_POST["pet_type"] ?? ""; ?>>
                        <option name="dog" value="dog">dog</option>
                        <option name="cat" value="cat">cat</option>
                        <option name="bird" value="bird">bird</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="name">Pet's name:</label>
                    <input type="text" name="name" />
                </div>
                <div class="form-input">
                    <label for="age">Pet's age:</label>
                    <input type="number" name="age" />
                </div>
                <input type="submit" value="Submit" id="submit-btn" />
                <?php if (!empty($message)): ?> <p class="error"> <?php echo $message; ?> </p> <?php endif; ?>
            </form>
        </div>
        <h2>Meet Our Loyal Customers</h2>
        <div class="pet-gallery">

            <?php

            if (!isset($_SESSION['pets'])) {
                $_SESSION['pets'] = array();
            }

            if (!isset($pet)) {
                $pet = array();
            }

            foreach ($_SESSION['pets'] as $pet) {
                echo '<div class="card">';
                echo '<p class="hello">' . $pet->sayHello() . '</p>';
                echo '<img src="' . $pet->petImage() . '" alt="">';
                echo '<p class="pet-msg">' . $pet->petMessage() . '</p>';
                echo '</div>';
            }
            ?>



        </div>
    </div>
    <footer>Copyright&copy; Saara Rikama/React25K</footer>
</body>

</html>