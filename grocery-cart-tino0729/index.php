
<?php
declare(strict_types=1);
include "includes/functions.php";


/**
 * PHP GET Lab
 *
 * This script demonstrates the use of PHP's $_GET superglobal to handle form submissions.
 * It defines a list of items with their product codes and handles the selection of these items.
 * The selected items are retrieved from the query string of a GET request.
 * The array of selected items coming from GET is named 'selected_items'.
 */

// Product codes for each item.
// Do not modify this array.
$items = [
    'A1B2C3' => 'Apple',
    'D4E5F6' => 'Banana',
    'G7H8I9' => 'Orange',
    'J1K2L3' => 'Grapes',
    'M4N5O6' => 'Mango',
];

/* ***************************************************************** */
// 1. Initialize the selected items array to an empty array.
/* ***************************************************************** */
$selectedItems = [];

// If this is the result of a form submission, then the query string will contain the "selected_items" key.
/* ***************************************************************** */
// 2a. Check if the selected_items key exists in the query string.
// 2b. Check if the selected_items key is of type array.
/* ***************************************************************** */
if (isset($_GET['selected_items']) && is_array($_GET['selected_items'])) {
    /* ***************************************************************** */
    // 3. If those conditions are met, then assign the GET items to the 
    // $selectedItems variable.
    /* ***************************************************************** */
    $selectedItems = $_GET['selected_items'];
}

// Hint: now is a good time to dump the $selectedItems variable to see what it contains.
// You can test this by hacking the query string to include the selected_items key.
// e.g.: http://localhost/php_get.php?selected_items[]=A1B2C3&selected_items[]=D4E5F6
?>

<!DOCTYPE html>
<html lang="en">

<!-- You can collapse the head by clicking the arrow on the left. -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP GET Lab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        input[type="submit"],
        a,
        a:visited {
            font-size: 1rem;
            padding: 10px;
            margin-top: 10px;
            margin-right: 10px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .flex-column {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <div style="display: flex;">
        <!-- Leaving the action attribute empty will submit the form to the same page. -->
        <!-- No changes needed. -->
        <form action="" method="GET" class="flex-column">
            <h3>Choose Items:</h3>
            <ul>
                <?php
                /* ***************************************************************** */
                // 4. Display checkbox links.
                /* ***************************************************************** */
                // START LOOP
                foreach ($items as $code => $name) {
                    /* ***************************************************************** */
                    // 5. Determine if the item is selected from a previous form submission.
                    // You can do this by checking if the item's key exists in the $selectedItems array.
                    // Set the value of the $checked variable to 'checked' if the item is selected.
                    /* ***************************************************************** */
                    $checked = in_array($code, $selectedItems) ? 'checked' : '';
                    /* ***************************************************************** */
                    // 6. Write out the html for list item with the checkbox.
                    // Previously selected items should be checked. 
                    // HINTS: 
                    // - You will need to use the keys, values, and $checked variables in the html.
                    // - Your values must end up in a GET variable named 'selected_items'
                    // - Be sure to set the name attribute to an array by adding [] to the end of the name.
                    /* ***************************************************************** */
                    echo "<li><label><input type='checkbox' name='selected_items[]' value='$code' $checked> $name</label></li>";
                }
                // END LOOP
                ?>
            </ul>

            <!-- This will submit the form. -->
            <!-- No changes needed. -->
            <input type="submit" value="Show Selected Items">

            <!-- ***************************************************************** -->
            <!-- 7. Reset the form by linking to the PHP_SELF server variable (set href)
            <!-- This will make a GET request to the same page, but with no query string. -->
            <!-- ***************************************************************** -->
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Reset Selection</a>
        </form>

        <div class="flex-column">
            <?php
            // Check if any items are selected from the form submission.
            // Only display this section if there are selected items.
            // if (???) {
            echo '<h3>Selected Items:</h2>';
            echo '<ul>';
            /* ***************************************************************** */
            // 8. Loop through the selected items and display them in a list.
            /* ***************************************************************** */
            // START LOOP
            foreach ($selectedItems as $selectedItem) {
                /* ***************************************************************** */
                // 9. Check if the selected item exists in the items array.
                // The user could have modified the query string to include an invalid item.
                /* ***************************************************************** */
                if (array_key_exists($selectedItem, $items)) {
                    /* ***************************************************************** */
                    // 8. Add the item to the list.
                    /* ***************************************************************** */
                    echo "<li>{$items[$selectedItem]}</li>";
                }
            }
            // END LOOP
            echo '</ul>';
            // }
            ?>
        </div>
    </div>

</body>

</html>
```