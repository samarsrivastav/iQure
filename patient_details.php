<?php
// if ($_SERVER['REQUEST_METHOD'] == 'post') {
//     header("location:loading.html");
// } ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Xray</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color:black; color:#b7b7b7;">
    <?php
    use GuzzleHttp\Tests\Psr7\RequestTest;

    include 'partials/_header.php'
        ?>
    <!-- container -->
    <div class="container my-3">
        <h2 class="text-center">Patient's Detail</h2>
        <div class="row">
            <?php
            include '_dbconn.php';
            $pid = $_GET['pid'];
            $ref_table = "patients";
            $fetchdata = $database->getReference($ref_table)
                ->getvalue();

            // loop
            if ($fetchdata > 0) {
                $i = 0;
                foreach ($fetchdata as $key => $row) {
                    $i++;
                    $id = $row['id'];
                    $name = $row['name'];
                    if ($i == $pid) {
                        echo '   <div class="header">
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                            data-bs-smooth-scroll="true" class="scrollspy-example bg-light my-3 p-3 rounded-2" tabindex="0" style="border:7px solid black; color:black; border-radius:20px;">
                            <h2 id="scrollspyHeading1">
                            ' . $id . '. ' . $name . ' 
                            </h2>
                            <p>
                               <br>' . $row['address'] . '
                            </p>Phone:<strong>' . $row['phone'] . '</strong>
                        </div>
                    </div>';
                        break;
                    }
                }
            } else {
                echo "NO data Found";
            }
            ?>
            <br><br><br>

            <h3 class="my-3">Upload Patient's X-ray for the Report Generation</h3>
            <div>
                <?php
               echo '<form action="loading.php?pid='.$_GET['pid'].'" method="post">
                    <input class="form-control form-control-lg" id="formFileLg" type="file" onchange="getFile(event)"
                        accept="image/jpg , image/jpeg">
                    <button type="submit" onclick="uploadImage()" class="btn btn-success my-3">Upload</button>
                </form>';
                ?>
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script src="partials/upload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>