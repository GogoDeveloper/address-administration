<?php
#Define array
$data = [];

#Read file
$json = file_get_contents('comments.json');
$data = json_decode($json, JSON_OBJECT_AS_ARRAY);

if(isset($_POST['submit'])) {
    echo "Your personal data has been submitted!";
    $data[] =
        [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'street' => $_POST['street'],
            'zip' => $_POST['zip'],
            'city' => $_POST['city']
        ];
}
#Write gained information in the file
$json = json_encode($data);
file_put_contents('comments.json', $json);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Address-Administration - Create</title>
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
    </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Address-Administration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete-all.php">Delete All</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Create New Address<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <img src="../images/banner.png" alt="Eins Bulldozer">
        <body>
            <h2>Create new Address</h2>
            <form action="create.php" method="post">
                <input type="text" name="firstname" placeholder="Your First Name" required>
                <input type="text" name="lastname" placeholder="Your Last Name" required>
                <input type="text" name="street" placeholder="Street & House Number" required>
                <input type="text" name="zip" placeholder="Zip-Code" required>
                <input type="text" name="city" placeholder="City" required>
                <button type="submit" name="submit">Submit</button>
            </form>
        </body>
</html>