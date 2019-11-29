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
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <header>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12 pr-5">
                        <a href="index.php"><img id="logoImg" class="img-fluid pt-1" src="../img/logo2.png" alt="" /></a>
                    </div>
                    <div class="col-md-2 col-sm-1 col-xs-12"> </div>
                    <div class="col-md-4 col-sm-5 col-10">
                        <form>
                            <div class="form-row mt-4">
                                <input type="search" class="form-control w-75 mr-3" id="search" placeholder="Ricerca evento..">
                                <button class="btn btn-primary" type="submit">Cerca</button>
                            </div>
                            <!--
                            <div class="mt-4">
                                <input class="form-control w-75" type="search" placeholder="Cerca evento.." autocomplete="true" />
                                <button type="submit" class="btn btn-primary page-btn ml-5">Cerca</button>
                            </div>
                            -->
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-2 col-2">
                        <a href="#">
                            <img class="img-fluid mt-4" src="../img/carrello.png" alt="carrello" />
                        </a>
                    </div>
                </div>
            </header>
    </div>
    <hr/>
    <?php
        if (isset($parameters["content"])) {
            require($parameters["content"]);
        }
    ?>
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
                        <p> ..... </p>
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