<nav class="navbar navbar-expand-lg navbar-dark bg-success" style="background-color:#2ed151 ; color: #ffffff">

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
                <a class="nav-link" href="../templates/ordner_list.php">Ordner list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../templates/ordner_archivieren.php">Ordner zuordnen</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" method="post" action="../templates/ordner_list.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Suchen Ordner" aria-label="Search" name="qrCodeText">
            <button class="btn btn-success my-2 my-sm-0" type="submit" name="ordnerSuchen">Suchen</button>
        </form>
    </div>

</nav>
