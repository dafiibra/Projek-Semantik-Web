<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c3c1353c4c.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Connector untuk menghubungkan PHP dan SPARQL -->
    <?php
        require_once("sparqllib.php");  //untuk sparql lib.
        $search = "" ;
        $filter = "" ;
        
        if (isset($_POST['search'])) {
            $search = $_POST['search']; 
            $data = sparql_get(
            "http://localhost:3030/sepatu",
            "
                PREFIX ns1: <http://example.org/>
                PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>

                SELECT ?Brand ?Model ?Type ?Gender ?Size ?Color ?Material ?Price
                WHERE
                { 
                    ?items
                        ns1:brand     ?Brand ;
                        ns1:model     ?Model ;
                        ns1:type      ?Type ;
                        ns1:gender    ?Gender ;
                        ns1:size      ?Size ;
                        ns1:color     ?Color ;
                        ns1:material  ?Material ;
                        ns1:price     ?Price .
                    FILTER 
                    (regex (?Brand, '$search', 'i') 
                    || regex (?Model, '$search', 'i') 
                    || regex (?Type, '$search', 'i') 
                    || regex (?Gender, '$search', 'i') 
                    || regex (?Size, '$search', 'i') 
                    || regex (?Color, '$search', 'i') 
                    || regex (?Material, '$search', 'i') 
                    || regex (?Price, '$search', 'i'))
                }
            "
            );
        } else {
            $data = sparql_get(
            "http://localhost:3030/sepatu",
            "
                PREFIX ns1: <http://example.org/>
                PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
                
                SELECT ?Brand ?Model ?Type ?Gender ?Size ?Color ?Material ?Price
                WHERE
                { 
                    ?items
                        ns1:brand     ?Brand ;
                        ns1:model     ?Model ;
                        ns1:type      ?Type ;
                        ns1:gender    ?Gender ;
                        ns1:size      ?Size ;
                        ns1:color     ?Color ;
                        ns1:material  ?Material ;
                        ns1:price     ?Price .
                }
            "
            );
        }

        if (!isset($data)) {
            print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
        }
    ?>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container container-fluid">
            <a class="navbar-brand" href="index.php"><img src="src/img/logo.png" style="width:50px" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 h5">
                    <li class="nav-item px-2">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-white" href="about.php">About</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="" method="post" id="search" name="search">
                    <input class="form-control me-2" type="search" placeholder="Search Here" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Body -->
    <div class="container container-fluid my-3">

        <div class="row tentang">
        <div class="col-lg-2">
          <img src="src/img/sptu.jpg" alt="tentang" class="img-fluid" />
        </div>
        <div class="col-lg">
          <h3>Most Hot Shoes All the time!!!</h3>
          <p>
          You can get thousand data of shoes type,price,brand,size HERE!
          </p>
        </div>
      </div>

        


    <div class="container container-fluid my-3">
        <?php
            if ($search != NULL) {
                ?> 
                    <i class="fa-solid fa-magnifying-glass"></i><span>Menampilkan hasil pencarian untuk <b>"<?php echo $search; ?>"</b></span> 
                <?php
            }
        ?>
        <table class="table table-bordered table-hover text-center table-responsive">
            <thead class="table-dark align-middle">
                <tr>
                    <th>Rank</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Gender</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Material</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php $i = 0; ?>
                <?php foreach ($data as $data) : ?>
                    <td><?= ++$i ?></td>
                    <td><?= $data['Brand'] ?></td>
                    <td><?= $data['Model'] ?></td>
                    <td><?= $data['Type'] ?></td>
                    <td><?= $data['Gender'] ?></td>
                    <td><?= $data['Size'] ?></td>
                    <td><?= $data['Color'] ?></td>
                    <td><?= $data['Material'] ?></td>
                    <td><?= $data['Price'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <?php
        if ($search != NULL) {
            ?> 
                <footer class="footer text-light text-center bg-dark pb-1 ">
                    <p>Copyright &copy; All rights reserved -<img src="src/img/logo.png" style="width:75px" alt="Logo"></p>
                </footer>
            <?php
        } else {
            ?>
                <footer class="footer text-light text-center bg-dark pb-1">
                    <p>Copyright &copy; All rights reserved -<img src="src/img/logo.png" style="width:75px" alt="Logo"></p>
                </footer>
            <?php
        }
    ?>
</body>
</html>
