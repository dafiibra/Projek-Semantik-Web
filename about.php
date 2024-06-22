<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Store - About</title>
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
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
            </div>
        </div>
    </nav>

    <div class="accordion container my-3" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <br>
                About This Web
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <p>Web yang berisikan mengenai produk harga sepatu,merek sepatu,type sepatu,gender,ukuran,warna,material dan juga harga</p>
                </div>
            </div>
        </div>
        <div class="accordion container my-3" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                About the Project
            </h2>
                <div class="accordion-body">
                    <p>Projek Semantik Web pembuatan website berisikan data menggunakkan Bootstrap, Apache Jena Fuseki, NGROK and SPARQL.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion container my-3" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                Dibuat Oleh
            </h2>
                <div class="accordion-body">
                <ol>
            <li>Archi Cantona</li>
            <li>Ibrahim Dafi Iskandar</li>
            <li>Lazia</li>
            <li>Chienta</li>
          </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer text-light text-center bg-dark pb-1">
        <p>Copyright &copy; All rights reserved -<img src="src/img/logo.png" style="width:75px" alt="Logo"></p>
    </footer>
</body>
</html>