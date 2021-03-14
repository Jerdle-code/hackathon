<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "<pre>";
var_dump($_POST);
var_dump(file_get_contents("php://input"));
echo "</pre>";
?>

</body>
</html>