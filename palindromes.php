<form method="post" action="">
    <fieldset>
        <input type="text" name="input" id="inputData" value="<?php echo $_POST['input']; ?>" />
        <input type="submit" name="submit" value="submit" />
    </fieldset>
</form>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$result = getRotations($_POST['input']);


print_r("Result is: <br />" . $result);



function getRotations($input)
{
    $result = '';
    $inputArr = str_split($input);
    foreach ($inputArr as $index => $character) {
        $rotation = getRotation($input, $index);
        if (isPalindrome($rotation) === true) {
            $result .= $rotation . '<br />';
        }
    }

    if (empty($result)) {
        $result = 'NONE<br />';
    }

    return $result;
}

function getRotation($input, $index)
{
    $return = substr($input, $index) . substr($input, 0, $index);
    return $return;
}

function isPalindrome($string)
{
    $isPalindrome = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $string));
    return $isPalindrome == strrev($isPalindrome);
}