<!DOCTYPE html>
<html lang="it">
<head>
    <title> <?php echo $parameters["title"]; ?> </title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <?php
    if(isset($parameters["js"])):
        foreach($parameters["js"] as $script):
    ?>
        <script src="<?php echo $script; ?>"></script>
    <?php
        endforeach;
    endif;
    ?>
    <noscript>
        <link rel="stylesheet" href="../css/nojavascript.css">
        <meta http-equiv="refresh" content="0; url=<?php echo ROOT."/php/phpPages/noScript.php";?>">
    </noscript>
</head>

<body>
    <?php require_once("cookieBar.php");?>
    <div class="container-fluid p-0">
        <header>
            <div class = "row">
                <div class = "col-12 col-lg-4 text-center">
                    <a href = "index.php">
                        <img id="logoImg" class="img-fluid w-auto mt-2" src="../img/logo2.png" alt="home"/>
                    </a>
                </div>
                <nav class="navbar container-fluid navbar-expand-lg navbar-dark bg-transaparent col-12 col-lg-8">
                    <div class="col-4"></div>
                    <div class="collapse navbar-collapse col-12 col-lg-8 p-0 container-fluid" id="navbarColor03">
                        <div class="mt-1 p-1 bg-light container-fluid rounded rounded-pill shadow-sm">
                            <form action = "search.php" method = "get" class="input-group">
                                <input type="search" name = "search" placeholder="Cerca evento per titolo, descrizione, location o città.." aria-describedby="button-addon1" class="form-control rounded-pill border-0 bg-light">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><em class="fa fa-search"></em></button>
                                </div>
                                <div class="dropdown rounded-pill">
                                    <button class="btn btn btn-link text-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <em class = "fas fa-bars"></em>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <?php
                                        if(isUserLoggedIn()){
                                                require 'loggedItems.php';
                                            } else {
                                                require 'notLoggedItems.php';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <hr/>
    <main>
        <?php
            if (isset($parameters["content"])) {
                require($parameters["content"]);
            }
        ?>
    </main>
    <hr/>
    <footer class="page-footer font-small blue p-4">
        <div class="container-fluid text-center text-light">
            <div class="row ">
                <div class="col-md-4 col-sm-4 col-12">
                    <h5 class="text-uppercase">Chi siamo</h5>
                    <p>
                        Achilli Mattia <br />
                        Innocenti Matteo <br />
                        D'errico Christian <br />
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <h5 class="text-uppercase">Contatti</h5>
                    <p> mattia.achilli@studio.unibo.it</p>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <h5 class="text-uppercase">Info utili</h5>
                    <p> E via </p>
                </div>
            </div>
            <div class="footer-copyright text-center">© 2019 Copyright:
                <a href="#"> Eventbook.it </a>
            </div>
        </div>
    </footer>
</body>
</html>