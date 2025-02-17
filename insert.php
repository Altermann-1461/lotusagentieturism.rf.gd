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
                    <label for="tara">Title</label>
                    <input type="text" name="tara" class="form-control" id="tara" placeholder="Tara">
                    <small class="form-text text-muted">Asigura-te ca aceasta destinatie nu o avem deja in lista de oferte</small>
                </div>
                <div class="form-group">
                    <label for="zile">Cate zile?</label>
                    <input type="number" name="zile" class="form-control" id="zile" placeholder="Zile">
                    <small class="form-text text-muted">Mai multe, mai bine</small>
                </div>
                <div class="form-group">
                    <label for="pret_euro">Ce pret?</label>
                    <input type="number" name="pret_euro" class="form-control" id="pret_euro" placeholder="Pret">
                    <small class="form-text text-muted">Sa retin, mai putin</small>
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
