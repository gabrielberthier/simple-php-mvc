<?php include 'header.php'?>
    <h1>Parece que você teve um erro</h1>

    <?php if(is_array($error)):  ?>
    <div class="alert alert-danger mt-5" role="alert">
        Tivemos alguns erros encontrados. Alguns deles foram
        <ul>
        <?php foreach($error as $erro): ?>
            <li> <?php echo($erro); ?></li>
        <?php endforeach; ?>
    </ul>
    </div>
<?php else:  ?>

    <p><?php echo($error) ?></p>

<?php endif;  ?>

<?php include 'footer.php'?>