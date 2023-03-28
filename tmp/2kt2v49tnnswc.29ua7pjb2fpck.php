<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (@$document_title) ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">

</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ADPS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ($BASE) ?>/table">Tabel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ($BASE) ?>/add">Adauga</a>
                    </li>
                </ul>
                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#search-modal">Cauta</button>
            </div>
        </div>
    </nav>
    <!-- Search modal -->
    <div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="search-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>test</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inchide</button>
            <button type="button" class="btn btn-primary">Cauta</button>
        </div>
        </div>
    </div>
    </div>