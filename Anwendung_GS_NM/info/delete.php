<?php
/**
 *
 * Programmieren I - 4/4 Application
 *
 * @author Gottfried Stoll <gottfried.stoll.zh@gmail.com>
 * @date 28.11.2018
 */


$filename = 'comments.json';
$json = file_get_contents($filename);
$data =  json_decode($json,JSON_OBJECT_AS_ARRAY);

if(isset($_GET['submit'])) {
    echo "Your address has been successfully deleted!";
    unset($data[(int)$_GET['id']]);
}

$json = json_encode($data);
file_put_contents($filename, $json);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Address-Administration - Delete</title>
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../index.php">Address-Administration</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete-all.php">Delete All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create New Address</a>
                    </li>
                </ul>
            </div>
        </nav>
        <img src="../images/banner.png" alt="Eins Bulldozer">
        <main>
            <h2>Delete Address</h2>
            <table class="table">

                <!-- Table-header -->
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Street</th>
                    <th scope="col">Zip-Code</th>
                    <th scope="col">City</th>
                </tr>
                </thead>

                <!--Table-body-->
                <tbody>
                    <div class="addresslist">
                        <tr>
                            <th scope="row">
                            </th>
                            <td>
                                <?php  print $data[(int)$_GET['id']]['firstname'];?>
                            </td>
                            <td>
                                <?php  print $data[(int)$_GET['id']]['lastname'];?>
                            </td>
                            <td>
                                <?php  print $data[(int)$_GET['id']]['street'];?>
                            </td>
                            <td>
                                <?php  print $data[(int)$_GET['id']]['zip'];?>
                            </td>
                            <td>
                                <?php  print $data[(int)$_GET['id']]['city'];?>
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Delete Address
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Address</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            You are about to delete this address!<br>Are you sure?
                        </div>
                        <form action="delete.php" method="get">
                            <div class="modal-footer">

                                <input type="hidden" name="id" value="<?php print $_GET['id'];?>">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="submit">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>