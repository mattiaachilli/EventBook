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
        if (isset($parameters["datePicker"])) {
            echo $parameters["datePicker"];
        }
    ?>
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
                                <label for = "search-bar" class = "sr-only">Cerca evento</label>
                                <input type="search" id = "search-bar" name = "search" placeholder="Cerca evento per titolo, descrizione, location o citt??.." aria-describedby="button-addon1" class="form-control rounded-pill border-0 bg-light">
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
        <?php require_once("cookieBar.php");?>
    </main>
    <hr/>
    <footer class="page-footer font-small blue p-4">
        <div class="container-fluid text-center text-light">
            <div class="row ">
                <div class="col-md-4 col-sm-4 col-12">
                    <h3>Chi siamo</h3>
                    <p>
                        Achilli Mattia <br/>
                        D'Errico Christian <br/>
                        Innocenti Matteo <br/>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 col-12 text-truncate">
                    <h3>Contatti</h3>
                    <p> mattia.achilli@studio.unibo.it <br/>
                        christian.derrico@studio.unibo.it <br/>
                        matteo.innocenti2@studio.unibo.it <br/>
                    </p>                    

                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <h3>Info utili</h3>
                    <p> Se sei su PC prova <br/>
                        il nostro sito anche da smartphone,<br/> 
                        non te ne pentirai! </p>
                </div>
            </div>
            <div class="footer-copyright text-center">?? 2019 Copyright:
                <a href="#"> Eventbook.it </a>
            </div>
        </div>
    </footer>
</body>
</html>