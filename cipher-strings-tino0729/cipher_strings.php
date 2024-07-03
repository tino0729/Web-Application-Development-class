<?php
/* ********************************************************************
* This program will encrypt and decrypt a message using a cipher string.
* The cipher is created by mapping each letter of the alphabet to a word
* in the cipher string via an associative array:
* a => word1
* b => word2
* ...
* A reverse mapping array is also created:
* word1 => a
* word2 => b
* ...
* Words are separated by spaces, and punctuation is removed in the encrypted message.
*
* Example:
* Cipher string = "quick brown fox jumps over lazy dog..."
* Text to encrypt = "aab"
* Encrypted text = "quick quick brown"
* ******************************************************************* */

declare(strict_types=1);

/*
* This function will create a cipher array and a reverse cipher array.
* The cipher array will map each letter of the alphabet to a word in the cipher string.
* The reverse cipher array will map each word in the cipher string to a letter of the alphabet.
*/
function createCipher($cipher_array): array
{
    // Unicode reference: https://unicode-table.com/en/
    // Reference: https://www.php.net/manual/en/function.ord.php
    // Reference: https://www.php.net/manual/en/function.chr.php
    $cipher = [];
    $reverse_cipher = [];

    // Get base_ordinal to the ordinal of the letter 'a' using ord().
    $base_ordinal = ord('a');

    // Write a loop that iterates 26 times.
    for ($i = 0; $i < 26; $i++) {
        // Get the letter ordinal as an offset from the base ordinal.
        $letter_ordinal = $base_ordinal + $i;

        // Convert the letter ordinal to a letter using chr().
        $letter = chr($letter_ordinal);

        // Add cipher and reverse cipher entries.
        $cipher[$letter] = $cipher_array[$i];
        $reverse_cipher[$cipher_array[$i]] = $letter;
    }

    return [$cipher, $reverse_cipher];
}

/*
* This function will decrypt a message using the reverse cipher array.
* The decrypted message will be returned.
*/
function decryptMessage(string $message, array $reverse_cipher): string
{
    // Reference: https://www.php.net/manual/en/function.explode.php
    // Reference: https://www.php.net/manual/en/function.array-key-exists.php
    // Reference: https://www.php.net/manual/en/function.rtrim.php
    $decrypted_message = '';

    // Explode the string into an array of words using explode().
    $message_array = explode(' ', $message);

    // Loop through each word in the message and append to the decrypted message.
    // If the word exists in the reverse cipher array, then decrypt the letter.
    // If the word is not in the array, leave it as-is.
    foreach ($message_array as $word) {
        if (array_key_exists($word, $reverse_cipher)) {
            $decrypted_message .= $reverse_cipher[$word];
        } else {
            $decrypted_message .= $word;
        }

        $decrypted_message .= ' ';
    }

    // Remove the trailing space at the end of the message.
    $decrypted_message = rtrim($decrypted_message);

    return $decrypted_message;
}

/*
* This function will encrypt a message using the cipher array.
* The encrypted message will be returned.
*/
function encryptMessage(string $message, array $cipher_array): string
{
    // Reference: https://www.php.net/manual/en/function.explode.php
    // Reference: https://www.php.net/manual/en/function.ctype-alpha.php

    // Remove any punctuation to start. It's much harder otherwise.
    $message = removePunctuationAndLowercase($message);
    $encrypted_message = '';

    // Loop through each letter in the message and append to the encrypted message.
    // If the character is not a letter, leave it as-is.
    // Otherwise, encrypt the letter.
    for ($i = 0; $i < strlen($message); $i++) {
        $char = $message[$i];

        if (ctype_alpha($char)) {
            // Encrypt the letter if it's an alphabet character.
            $encrypted_message .= $cipher_array[$char] . ' ';
        } else {
            // Leave non-alphabet characters as-is.
            $encrypted_message .= $char;
        }
    }

    // Remove the trailing space on the end of the message.
    $encrypted_message = rtrim($encrypted_message);

    return $encrypted_message;
}

/*
* This function will take a string and return an array of words.
* Any punctuation will be removed.
* Any duplicate words will be removed.
* If there are more than 26 words, only the first 26 will be returned.
*/
function getCipherArray($cipher_string): array
{
    // Reference: https://www.php.net/manual/en/function.explode.php
    // Reference: https://www.php.net/manual/en/function.array-slice.php
    // Reference: https://www.php.net/manual/en/function.array-unique.php

    // Remove any punctuation.
    $cipher_string = removePunctuationAndLowercase($cipher_string);

    // Explode the string into an array of words using explode().
    $cipher_array = array_slice(array_unique(explode(' ', $cipher_string)), 0, 26);

    // Make sure the string has at least 26 words.
    if (count($cipher_array) < 26) {
        throw new Exception('The cipher string must have at least 26 words.');
    }

    // Return only the first 26 words of the unique array using array_slice().
    return $cipher_array;
}

/*
* This function will remove any punctuation from a string and convert to lowercase.
* The modified string will be returned.
*/
function removePunctuationAndLowercase(string $string): string
{
    // Nothing to change here.
    return preg_replace('/[^a-z ]/', '', strtolower($string));
}

// The cipher string.
$cipher_string = "Deadlights jack lad schooner scallywag dance hempen jig carouser broadside cable strike colors. Bring spring upon her cable holystone blow man down spanker Shiver me timbers to go on account lookout wherry doubloon chase. Belay yo-ho-ho keelhaul squiffy black spot yardarm spyglass sheet transom heave.";

// The message to encrypt.
$message = "Blackbeard's holy keg!";

// Create cipher
$cipher_array = getCipherArray($cipher_string);
list($cipher, $reverse_cipher) = createCipher($cipher_array);

// Encrypt
$encrypted_message = encryptMessage($message, $cipher);

// Print the encrypted message (and a line break for neatness).
echo $encrypted_message;
echo '<br>';

// Decrypt
$decrypted_message = decryptMessage($encrypted_message, $reverse_cipher);

// Print the decrypted message.
echo $decrypted_message;
?>
