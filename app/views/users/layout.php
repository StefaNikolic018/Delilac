
<?php 
//Including header
require APP_ROOT.'\views/inc/header.php';

?>
<div class="container mt-5">
        <div class="row">
                <div class="col col-lg-6 col-sm-12">
                        <img src="../public/img/telefon.png" alt="telefon" width="750px">
                </div>
                <div class="col col-lg-6 col-sm-12 mt-5">
                        <?php
                        //Including view
                        require APP_ROOT.'\views/'.$data['view'].'.php';
                        ?>
                </div>
        </div>

</div>
<?php
//Including header
require APP_ROOT.'\views/inc/footer.php';
?>

