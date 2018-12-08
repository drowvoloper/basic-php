<!--This project was made following the steps in a tutorial made by @mayomidele1-->

<html>
<head>
    <title>Create Todo list</title>
</head>
<body>
    <h1>Create Todo List</h1>
    <form method="post" action="create.php">
        <p>Todo title: </p>
        <input name="todoTitle" type="text">
        
        <p>Todo description: </p>
        <input name="todoDescription" type="text">
    <br>
        <input type="submit" value="Enviar" name="submit">

    </form>
</body>
</html>

<?php

    require_once("db_connect.php");

    if(isset($_POST['submit'])) {

        $title = $_POST['todoTitle'];
        $description = $_POST['todoDescription'];

        echo 'you filled title ' . $title . '<br /> and description ' . $description;

        //connect to database
        db();
        global $link;
        $query = "INSERT INTO todo(todoTitle,todoDescription,date) VALUES ('$title','$description',now())";

        $insertTodo = mysqli_query($link, $query);

        if($insertTodo) {
            echo "successfully";
        } else {
            echo mysqli_error($link);
        }
        mysqli_close($link);
        }

?>