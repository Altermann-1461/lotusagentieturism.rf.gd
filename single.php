<?php
require_once 'functions.php';
include ('header.php');
$row = update_get();
?>

    <div class="container">
        <div class="row">
            <div class="col-12 pt-5">
                <img class="card-img-top" src="https://plus.unsplash.com/premium_photo-1673415819362-c2ca640bfafe?q=80&w=2671&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                <h2 class="pt-5"><?php echo $row['tara'] ?></h2>
                <p>Pentru <?php echo $row['zile'] ?> zile spectaculoase</p></div>
                <p>La numai <?php echo $row['pret_euro'] ?> de euro</p></div>
        </div>
    </div>

<?php
include ('footer.php');
?>