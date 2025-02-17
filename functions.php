<?php
require_once 'connection.php';
global  $conn;

function get_oferte(){
    global  $conn;
    $rezultat_oferte = mysqli_query($conn,"SELECT * FROM sejururi");

    if(mysqli_num_rows($rezultat_oferte) > 0){
        echo '<div class="col-12 pt-5"><h1>Toate ofertele</h1></div>';

        while($row = mysqli_fetch_assoc($rezultat_oferte)){
            $randomNumber = rand(3, 20);
            echo'
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="https://plus.unsplash.com/premium_photo-1673415819362-c2ca640bfafe?q=80&w=2671&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                        <div class="card-body">
                            <h4><a class="text-secondary" href="single.php?id='.$row
                ['id_sejur'].'">'.$row['tara'].'</a></h4>
                            <p class="card-text">'.$row['zile'].' zile la numai '.$row['pret_euro'].' euro</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <a href="single.php?id='.$row['id_sejur'].'" class="btn btn-sm btn-outline-primary" role="button" aria-pressed="true">Detalii</a>
                                    <a href="update.php?id='.$row['id_sejur'].'" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Modifica oferta</a>
                                    <a href="delete.php?id='.$row['id_sejur'].'" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Sterge oferta</a>
                                    </div>
                                </div>
                            <small class="text-muted">'.$randomNumber.' mins ago</small>
                        </div>
                    </div>
                </div>
            ';
        }
    } else "<h3>Our database is empty</h3>";
}


if(isset($_POST['tara'])&&isset($_POST['zile'])&&isset($_POST['pret_euro'])){
    // check title and content empty or not
    if(!empty($_POST['tara'])&&!empty($_POST['zile'])&&!empty($_POST['pret_euro'])){
    // escape special characters, protection from sql injection, previne atacuri Cross-Site Scripting (XSS)
        $tara = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tara']));
        $zile = mysqli_real_escape_string($conn, htmlspecialchars($_POST['zile']));
        $pret_euro = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pret_euro']));

        // Check if title already exists
        $check_content = mysqli_query($conn,"SELECT 'tara' FROM sejururi WHERE tara = '$tara'");
        if(mysqli_num_rows($check_content) > 0){
            echo  "<h3>Din pacate avem deja aceasta destinatie in lista de oferte - te rog incearca alta destinatie!</h3>";
        }else{
            // Insert data into database
            $insert_query = mysqli_query($conn,"INSERT INTO sejururi (tara, zile, pret_euro) VALUES ('$tara', '$zile', '$pret_euro')");
            // Now check if data has been inserted
            if($insert_query){
                echo"<script> alert('Oferta inserata');window.location.href='index.php';</script>";
                exit;
            }else{
                echo "<h3>Oferta nu a fost inserata</h3>";
            }
        }
    }else{
        echo "<h4>Va rugam sa completati toate campurile!</h4>";
    }
}
// sign-up
if(isset($_POST['nume'])&&isset($_POST['prenume'])&&isset($_POST['parola'])&&isset($_POST['parola_re'])){
    // check title and content empty or not
    if(!empty($_POST['nume'])&&!empty($_POST['prenume'])&&!empty($_POST['parola'])&&!empty($_POST['parola_re'])){
        if (($_POST['parola'])===($_POST['parola_re'])){

            if (preg_match('/\d/', ($_POST['parola']))) {
                echo "Parola conține cel puțin o cifră!";

        // escape special characters, protection from sql injection, previne atacuri Cross-Site Scripting (XSS)
                $nume = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nume']));
                $prenume = mysqli_real_escape_string($conn, htmlspecialchars($_POST['prenume']));
                $parola = mysqli_real_escape_string($conn, htmlspecialchars($_POST['parola']));

        // Check if title already exists
        $check_content = mysqli_query($conn,"SELECT 'nume' FROM utilizatori WHERE nume = '$nume' AND prenume = '$prenume'");
        if(mysqli_num_rows($check_content) > 0){
            echo  "<h3>Din pacate avem deja aceasta intrare - te rog incearca un nickname in loc de prenume!</h3>";
        }else{
            // Insert data into database
            $insert_query = mysqli_query($conn,"INSERT INTO utilizatori (nume, prenume, rol, parola) VALUES ('$nume', '$prenume', 'simplu', '$parola')");
            // Now check if data has been inserted
            if (!$insert_query) {
                die("Eroare SQL: " . mysqli_error($conn));
            }

            echo "<h3>Ajunge aici '$nume', '$prenume', 'simplu', '$parola'</h3>";
            if($insert_query){
                echo"<script> alert('Utilizator inregistrat');window.location.href='index.php';</script>";
                exit;
            }else{
                echo "<h3>Utilizatorul nu a fost inserat</h3>";
            }
        }
            } else {
            echo "Parola NU conține nicio cifră!";
        }
        }else{echo "<h4>Va rugam sa aveti aceasi parola repetata!</h4>";}
    }else{
        echo "<h4>Va rugam sa completati toate campurile!</h4>";
    }
}

//Update.php - Collect Data

function update_get(){
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        global $conn;
        $id = $_GET['id'];
        $get_id = mysqli_query($conn,"SELECT * FROM sejururi WHERE id_sejur = '$id'");
//        nu intelegeam ce greseam in sintaxa de sql si aveam nevoie de eroarea reala ca sa ma prind
        if (!$get_id) {
            die("Eroare SQL: " . mysqli_error($conn));
        }
            if(mysqli_num_rows($get_id) === 1){
                $row = mysqli_fetch_assoc($get_id);
                return($row);
            }
    }
}

//Update.php - Update data

if(isset($_POST['update_tara']) && isset($_POST['update_zile'])&& isset($_POST['update_pret_euro'])){

//check if items are empty

    if(!empty($_POST['update_tara']) && !empty($_POST['update_zile'])&& !empty($_POST['update_pret_euro'])){

        // Escape special characters.

        $tara = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_tara']));
        $zile = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_zile']));
        $pret_euro = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_pret_euro']));

        $id = $_GET['id'];

        $update_query = mysqli_query($conn,"UPDATE sejururi SET tara='$tara',zile='$zile',pret_euro='$pret_euro' WHERE id_sejur=$id");

        if($update_query){
            echo "<script>alert('Oferta actualizata!');window.location.href = 'index.php';</script>";
            exit;
        }else{
            echo "<h3>Ne pare rau, nu a functionat.</h3>";
        }
    }else{
        echo "<h4>Completati toate campurile!</h4>";
    }
}

//Delete.php

function delete(){
    global $conn;
    if(isset($_GET['id']) && is_numeric($_GET['id'])){

        $id_sejur = $_GET['id'];
        $delete_user = mysqli_query($conn,"DELETE FROM sejururi WHERE id_sejur='$id_sejur'");

        if($delete_user){
            echo "<script>alert('Oferta a fost stearsa');window.location.href = 'index.php';</script>";
            exit;

        }else{
            echo "Ceva nu a functionat!";
        }
    }
}