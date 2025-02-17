<?php
require_once 'functions.php';
include ('header.php');
$row = update_get();
?>

    <div class="container">
        <div class="col pt-5">
            <h2>Update Data</h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $row['id_sejur'];?>" method="post">
                <div class="form-group">
                    <label for="update_tara">Tara</label>
                    <input type="text" name="update_tara" class="form-control" id="update_tara" placeholder="Tara" value="<?php echo $row['tara'];?>" required>
                    <small class="form-text text-muted">Asigura-te ca aceasta destinatie nu o avem deja in lista de oferte</small>
                </div>
                <div class="form-group">
                    <label for="update_zile">Zile</label>
                    <input type="number" name="update_zile" class="form-control" id="update_zile" placeholder="Zile" value="<?php echo $row['zile'];?>" required>
                    <small class="form-text text-muted">Mai multe, mai bine</small>
                </div>
                <div class="form-group">
                    <label for="update_pret_euro">Pret Euro</label>
                    <input type="number" name="update_pret_euro" class="form-control" id="update_pret_euro" placeholder="Euro" value="<?php echo $row['pret_euro'];?>" required>
                    <small class="form-text text-muted">Sa retin, mai putin</small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

<?php
include ('footer.php');
?>