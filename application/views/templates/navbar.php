<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"><strong>Plava Knjižnica</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
            class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link navbar-menu-links" href="?view=prodaja">Ponuda <i class="fas fa-book"></i></a>
            </li>
            
            <?php
                if($_SESSION['uloga_korisnika'] == 'gost'){
                    print('<li class="nav-item profile-button"><a class="nav-link" href="?view=login">Prijavite Se <i class="fas fa-user-tie"></i></a></li>');
                } else{
                    include('models/user.php');
                    print(print_profile_dropdown($_SESSION['ime'], $_SESSION['prezime']));
                }
            ?>

        </ul>
    </div>
</nav>

<div class="container">