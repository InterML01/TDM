
<!-- crt error keep as var and count it -->
<?php $errors = array(); ?>

<?php if (count($errors) > 0) : ?>
<div class="error">
    <!--foreach error for เอา error มาแสดง  -->
    <?php foreach($errors as $error) : ?>
    <!-- this file : use in each page for check if มี error ให้ Loop AND show error -->
    <p><?php echo $error ?></p>
    <?php endforeach ?>
</div>
<?php endif ?>