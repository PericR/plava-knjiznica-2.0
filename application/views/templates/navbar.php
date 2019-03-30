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
                    echo anchor('ponuda/index', 'Ponuda <i class="fas fa-book"></i>', array('class'=>'nav-link navbar-menu-links'));
                ?>
            </li>
            <li class="nav-item">
                <?php                
                    if($this->session->uloga_korisnika == 'gost')
                    {
                        echo anchor('korisnik/login', 'Prijavite Se <i class="fas fa-user-tie"></i>', array('class'=>'nav-link navbar-menu-links'));
                    }
                    else
                    {
                        print('<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Profil
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">'.$this->session->ime.'</a>
                            <a class="dropdown-item" href="#">'.$this->session->prezime.'</a>
                            <div class="dropdown-divider"></div>');
                        echo anchor('korisnik/dodaj_karticu', 'Dodaj Karticu', array('class' => 'dropdown-item'));

                        if($this->session->uloga_korisnika == 'admin' or $this->session->uloga_korisnika == 'super_admin')
                        {
                            echo anchor('admin/dodaj_knjigu', 'Nova Knjiga', array('class' => 'dropdown-item'));
                        }
                        print('<div class="dropdown-divider"></div>');
                        echo anchor('korisnik/odjava', 'Odjavite se', array('class' => 'dropdown-item'));                        
                        print('</div></li>');
                    }
                ?>
            </li>
        </ul>
    </div>
</nav>

<div class="container">