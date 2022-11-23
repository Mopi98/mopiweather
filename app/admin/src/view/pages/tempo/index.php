

<!doctype html>
<html lang="en">

<head>
    <title>Mopi Weather</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JavaScript -->
    <script src="/admin/src/view/assets/js/app.js"></script>
    <link rel="stylesheet" id="css" href="">
</head>

<body class="vh-100">
    <nav id="navbar" class=" p-2 d-flex justify-content-left fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <form class="form-inline">
                        <div class=" form-group w-100 ">
                            <label for=""></label>
                            <input type="text" name="" id="cidade" class="form-control flex-fill" placeholder="Digite o nome de uma cidade" aria-describedby="helpId">
                            <input name="" id="btn_submit" class="btn btn-primary ml-2" type="button" value="Consultar">
                        </div>
                    </form>
                </div>
                <div id="logo" class="col-4">
                    <a href="/admin/home"><img src="/admin/src/view/assets/css/img/mopinav.png" class="logonav img-fluid" alt=""></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container h-100 d-flex flex-column justify-content-center ">


        <div id="card" class="jumbotron px-3 py-3 text-white " style="border-radius: 5.29rem; background-color:#0E0359;">
            <div class="d-flex flex-row align-items-center justify-content-center mb-5">
                <i class="fas fa-map-marker-alt fa-2x mr-3 "></i>
                <h1 class="display-4" id="view_cidade">Cidade,País</h1>
            </div>
            <div id="tela_tempo" class="d-flex flex-column align-items-center">
                <div class="d-flex mb-5">
                    <div class="form-check mr-5">
                        <input class="form-check-input" type="radio" name="medida" id="exampleRadios1" value="c" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Celsius
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="medida" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Farenheit
                        </label>
                    </div>
                </div>
                <img id="icone_tempo" class="img-fluid mb-4" src="/admin/src/view/assets/css/img/iconestempo/noitenuvem.svg" alt="">
                <p class="d-flex justify-content-center display-1 mb-3" id="temp_atual">Temperatura</p>
                <p class="d-flex justify-content-center h2 mb-1" id="status_tempo">Status</p>
            </div>

        </div>

</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/admin/src/view/pages/tempo/index.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>