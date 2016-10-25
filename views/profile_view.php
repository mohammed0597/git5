

<?php foreach ($result as $row): ?>
    <tbody>
        <?php echo "username:" . $result['username']; ?> 
    <br/>

    <?php echo "user id:" . $result['id']; ?>

    </tbody>

<?php endforeach; ?>