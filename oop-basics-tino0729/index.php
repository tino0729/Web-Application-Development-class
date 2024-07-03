<?php

class Car
{
    /* ********************************************************************** */
    /* Properties (private)                                                 */
    /* ********************************************************************** */
    private $alias;
    private $brand;
    private $model;
    private $year;

    /* ********************************************************************** */
    /* Constructor to initialize properties                                  */
    /* ********************************************************************** */
    public function __construct($alias, $brand, $model, $year)
    {
        $this->alias = $alias;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    /* ********************************************************************** */
    /* Getter and Setter methods (public)                                    */
    /* ********************************************************************** */
    // Getter for alias
    public function getAlias()
    {
        return $this->alias;
    }

    // Getter for brand
    public function getBrand()
    {
        return $this->brand;
    }

    // Getter for model
    public function getModel()
    {
        return $this->model;
    }

    // Getter for year
    public function getYear()
    {
        return $this->year;
    }

    /* ********************************************************************** */
    /* Methods (public)                                                      */
    /* ********************************************************************** */
    public function displayCarInfoAsUL()
    {
        // Display car information as an html ul (using getter methods)
        echo "<h3>Car:</h3>";
        echo "<ul>";
        echo "<li>Alias: {$this->getAlias()}</li>";
        echo "<li>Brand: {$this->getBrand()}</li>";
        echo "<li>Model: {$this->getModel()}</li>";
        echo "<li>Year: {$this->getYear()}</li>";
        echo "</ul>";
    }
}

// Create the cars array and add the cars
$cars = [
    new Car("Bev", "Toyota", "Camry", 2022),
    new Car("HotMess", "Honda", "Accord", 2021),
    new Car("Betsy", "Ford", "F-150", 2020),
    new Car("Cookie", "Chevrolet", "Silverado", 2019),
];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Car Information</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            min-height: 100vh;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            margin-bottom: 20px;
        }

        ul li {
            margin: 5px 0;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            margin-left: 20px;
        }

        table {
            width: 800px;
            margin: 0 20px;
            border-collapse: collapse;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Car Aliases</h2>

    <?php
    // Display car info for each car in list format (html ul)
    foreach ($cars as $car) {
        $car->displayCarInfoAsUL();
    }
    ?>

    <h2>Car Information</h2>
    <table>
        <tr>
            <th>Alias</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
        </tr>

        <?php
        // Add tr and td elements with car info for all of the cars (using getters)
        foreach ($cars as $car) {
            echo "<tr>";
            echo "<td>{$car->getAlias()}</td>";
            echo "<td>{$car->getBrand()}</td>";
            echo "<td>{$car->getModel()}</td>";
            echo "<td>{$car->getYear()}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>

