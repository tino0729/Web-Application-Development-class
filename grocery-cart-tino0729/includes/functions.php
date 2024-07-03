<?php
function pretty_dump(mixed $var, string $name = ''): void
{
    $short_type_names = [
        'boolean' => 'bool',
        'integer' => 'int',
        'double' => 'float',
        'string' => 'str',
    ];

    // Style CSS to your liking
    echo '
<pre style="
        background-color:#f5f5f5;
        color:#333;
		line-height:1.2;
        font-size:14px;
        padding:10px;
        margin:10px;
        border-radius:5px;
        border:1px solid #ddd;
        min-width:600px;
		max-width:960px;
		width:fit-content;
		overflow:auto;
		box-sizing:border-box;
    ">';
    if ($name) {
        echo "Name: <strong>$name</strong><br >";
    }
    echo "Type: <strong>" . gettype($var) . (is_array($var) ? '(' . count($var) . ')' : '')  . "</strong><br >";
    echo ".................................<br >";
    if (is_array($var)) {
        foreach ($var as $k => $v) {
            if (is_array($v)) {
                echo str_pad($k, 30) . " => ";
                pretty_dump($v);
            } else {
                // Use short type names
                $type = $short_type_names[gettype($v)] ?? gettype($v);

                // If boolean value, show true/false instead of 1/0
                $v = $type === 'bool' ? ($v ? 'true' : 'false') : $v;

                // If string value, show it in quotes
                $v = $type === 'str' ? "'$v'" : $v;

                echo str_pad($k, 30) . ' => ' . $type . ' ' . $v . "\n";
            }
        }
    } else {
        print_r($var);
    }
    echo '</pre>';
}
