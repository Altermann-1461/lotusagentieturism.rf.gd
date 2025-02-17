<?php
require_once ("functions.php");
include ("header.php");
?>

    <div class="container">
        <!--    bootstrap porneste cu container class-->
        <div class="row">
            <div class="col pt-5 ">
                <!--            //12 coloane din bootstrap padding top spacing de 5-->
                <h2>Insereaza oferta:</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!--                //reincarcare pagina prin metoda post, datele vor fi incarcate in zona post-->
                    <div class="form-group">
                        <!--                    //in bootstrap toate elementele de form se pun in form group-->
                        <label for="nume">Nume</label>
                        <input type="text" name="nume" class="form-control" id="nume" placeholder="Nume">
                        <small class="form-text text-muted">Numele de familie</small>
                    </div>
                    <div class="form-group">
                        <!--                    //in bootstrap toate elementele de form se pun in form group-->
                        <label for="prenume">Prenume</label>
                        <input type="text" name="prenume" class="form-control" id="prenume" placeholder="Prenume">
                        <small class="form-text text-muted">Prenumele</small>
                    </div>
                    <div class="form-group">
                        <!--                    //in bootstrap toate elementele de form se pun in form group-->
                        <label for="parola">Parola</label>
                        <input type="text" name="parola" class="form-control" id="parola" placeholder="Parola">
                        <small class="form-text text-muted">Trebuie sa ai minim o cifra!</small>
                    </div>
                    <div class="form-group">
                        <!--                    //in bootstrap toate elementele de form se pun in form group-->
                        <label for="parola_re">Repetarea parolei</label>
                        <input type="text" name="parola_re" class="form-control" id="parola_re" placeholder="Repetarea parolei">
                        <small class="form-text text-muted">Asigura-te ca aceasta este la fel in ambele campuri.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <hr>
            </div>
        </div>
    </div>

<?php
include ("footer.php");
?>