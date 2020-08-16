
<?php 
//Including header
require APP_ROOT.'\views/inc/header.php';
require APP_ROOT.'\views/inc/navbar.php';

?>
<div class="container">
        <?php
        //Including view
        require APP_ROOT.'\views/'.$data['view'].'.php';
        ?>
</div>
<?php
//Including header
require APP_ROOT.'\views/inc/footer.php';
?>

