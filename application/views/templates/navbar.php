<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"><strong>Plava Knjižnica</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
            class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?php
                    echo anchor('home/view/ponuda', 'Ponuda <i class="fas fa-book"></i>', array('class'=>'nav-link navbar-menu-links'));
                ?>
            </li>
            <li class="nav-item">
                <?php                
                    if($uloga_korisnika == 'gost')
                    {
                        echo anchor('home/view/login_view', 'Prijavite Se <i class="fas fa-user-tie"></i>', array('class'=>'nav-link navbar-menu-links'));
                    }
                    else
                    {
                        print('<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">'.$ime.'</a>
                            <a class="dropdown-item" href="#">'.$prezime.'</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?view=dodaj_karticu">Dodaj karticu</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?odjava=odjava">Odjava</a>
                        </div>
                    </li>');
                    }
                ?>
            </li>
        </ul>
    </div>
</nav>

<div class="container">