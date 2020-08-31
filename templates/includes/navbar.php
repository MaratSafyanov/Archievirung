<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed" style="background-color:#2ed151 ; color: #ffffff">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../templates/ordner_anlegen.php">Ordner anlegen <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../templates/container_anlegen.php">Container anlegen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../templates/gitter_box_list.php">Container list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../templates/all_ordner_list.php">Ordner list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../templates/ordner_archivieren.php">Ordner zuordnen</a>
            </li>
        </ul>

        <form class="form-inline" method="post" action="../templates/ordner_list.php">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Ordner QR Code" aria-label="Search"
                       name="qrCodeText">
                <span class="input-group-append">
                    <input class="btn btn-success " type="submit" name="ordnerSuchen" value="Suchen">

                </span>
            </div>
        </form>
    </div>

</nav>
