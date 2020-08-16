
<?php 
//Including header
require APP_ROOT.'\views/inc/header.php';
require APP_ROOT.'\views/inc/navbar.php';

?>
<div class="container">
    <div class="card bg-dark text-white text-center">
        <div class="card card-header"></div>
        <div class="class card-body">
            <h1>

        <?php
        //Including view
        require APP_ROOT.'\views/'.$data['view'].'.php';
        ?>

            </h1>
        </div>
        <div class="class card-footer"></div>
    </div>
    <!-- Your content -->

</div>



<?php
//Including header
require APP_ROOT.'\views/inc/footer.php';
?>

