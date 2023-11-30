<?php include 'footer.php';
global $lessons,$result;
?>

<?php foreach($lessons as $lesson):?>
    <th><?=$lesson?></th>
<?php endforeach;?>
    </tr>
<?php foreach($result as $key=>$res):?>
    <tr>
        <td><?= $key?></td>
        <?php foreach($lessons as $lesKey=>$lesVal):?>
            <td><?=isset($res[$lessons[$lesKey]])? htmlspecialchars($res[$lessons[$lesKey]]):'' ?></td>

        <?php endforeach;?>

    </tr>
<?php endforeach;?>

<?php include 'footer.php'?>
