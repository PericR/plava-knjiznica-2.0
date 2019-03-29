<h1>
    PRODAJA SE OČEKUJE USKORO GOSPODINE 
    <?php 
        if(isset($_SESSION['ime'])) {
            print($_SESSION['ime']);
            print($_SESSION['prezime']);
        }
    ?>
</h1>