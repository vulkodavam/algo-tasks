<?php
$post = '';
if (isset($_POST['input']) && !empty($_POST['input'])) {
    $post = trim($_POST['input']);
}
?>
    <form method="post" action="">
        <fieldset>
            <label for="inputData">Input string: </label>
            <input type="text" name="input" id="inputData" value="<?php echo $post; ?>" />
            <input type="submit" name="submit" value="submit" />
        </fieldset>
    </form>
<?php
if (isset($_POST) && !empty($_POST)) {
    if (preg_match('/[^a-z]/', $post) || strlen($post) > 1000 || strlen($post) < 1) {
        echo "Invalid Input";
    } else {
        $result = getRotations($post);

        print_r("Result is: <br />" . $result);
    }
}

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