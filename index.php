<?php
require 'src/DataBase.php';

$db = new DataBase();
function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

if(isset($_POST['name']) and isset($_POST['inputText']))
{
    $name = $_POST['name'];
    $comment = $_POST['inputText'];
    if(isset($_POST['send']) )
    {
        $db->addComment($name,$comment);
        header('Location: /index.php' , true);
        die();
    }
}
if (isset($_GET['update']))
{
    $id = $_GET['update'];
    $com = $db->getById($id);
    header('Location: /template/updateCom.php?id='.$id.'&name='.$com['author'].'&text='.$com['text'] , true);
    die();
}
if (isset($_POST['update']))
{
    if(isset($_POST['upName']) and isset($_POST['upText']))
    {
        $upName = $_POST['upName'];
        $upText = $_POST['upText'];
        $id = $_POST['id'];
        $db->updateComment($upName,$upText,$id);
        header('Location: /index.php' , true);
        die();
    }
}


if (isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $db->deleteComment($id);
    header('Location: /index.php' , true);
    die();
}

$arComments = $db->getList();
include 'template/commentList.php';









