<?php
include 'template/header.php';
global $arComments
?>
    <form method="get" action="/index.php">
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Comment</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($arComments as $arCom):?>
        <tr>
            <td><?=$arCom['id']?></td>
            <td><?=$arCom['author']?></td>
            <td><?=$arCom['text']?></td>
            <td><button type="submit" value="<?=$arCom['id']?>" name ="delete" class="btn btn-primary">Удалить</button></td>
            <td><button type="submit" value ="<?=$arCom['id']?>" name="update" class="btn btn-primary">Обновить</button></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </form>
<form method="post" action="/index.php">
    <div class="mb-3">
        <label  class="form-label">Форма добавления</label><br>
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name"
        value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name'])?>">
    </div>
    <div class="mb-3">
        <label for="inputText" class="form-label">Comment</label>
        <input type="text" name="inputText" class="form-control"
               value="<?php if (isset($_POST['inputText'])) echo htmlspecialchars($_POST['inputText'])?>" id="inputText">
    </div>
    <button type="submit" name ="send" class="btn btn-primary">Отправить</button>
    <!--<input type="submit" name="submit" class="btn btn-primary" value="Отправить">-->
</form>

<?php
include 'template/footer.php';