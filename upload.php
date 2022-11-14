<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <title>Licence</title>
</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $name = array_map('trim', ($_POST));

        if (empty($_POST('name'))) {
            $errors[] = "Please enter your last name";
        }

        $uploadDir = 'public/uploads/';
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 1048576;


        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Please upload a Jpg, Jpeg or Png file!';
        }

        if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = "Your file must be 1Mb or less";
        }

        $uploadDir = 'public/uploads/';
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
    }


    if (empty($errors)) {
    ?>
        <div class="card" style="width: max-content;">
            <div class="card-header bg-dark text-center">
                <h1>DRIVER'S LICENCE</h1>
            </div>
            <div class="card-body d-flex flex-column align-items-center justify-content-start">
                <p><?= $name ?></p>
                <img src="<?= $uploadFile ?>" alt="Photo d'un Adipose" style="height: 300px" class="bg-dark">
            </div>
        </div>
    <?php
    } else {
        foreach ($errors as $error) {
            echo $error;
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>