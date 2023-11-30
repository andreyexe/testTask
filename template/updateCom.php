<?php
include 'header.php';

?>
<form method="post" action="/index.php">
    <div class="mb-3">
        <label  class="form-label">Форма обновления</label><br>
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="upName" id="name"
        value="<?=htmlspecialchars($_GET['name'])?>">
        <input name="id" type="hidden" value="<?=htmlspecialchars($_GET['id'])?>">
    </div>
    <div class="mb-3">
        <label for="inputText" class="form-label">Comment</label>
        <input type="text" name="upText" class="form-control"
               value="<?=htmlspecialchars($_GET['text'])?>" id="inputText">
    </div>
    <button type="submit" name ="update" class="btn btn-primary">Обновить</button>
</form>
<?php
include 'footer.php';