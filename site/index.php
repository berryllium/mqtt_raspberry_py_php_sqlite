<?php
require_once('model.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MQTT Raspberry</title>
    <style>
    table {
        margin: 0 auto;
        min-width: 500px;
        border-collapse: collapse;
    }
    th,td {
        border: 1px solid black;
        text-align: center;
    }
    h1 {
        text-align: center;
    }
    form {
        text-align: center;
        margin-bottom: 20px;
    }
    select {
        min-width: 200px;
    }
    </style>
</head>

<body>
<h1>Информация из топиков (<?=$db_size?> Mb)</h1>
    <form>
    <div class="select">
        <p>Выберите топик из списка</p>
        <select name="topic" id="topic">
        <option value=""></option>
            <?php foreach($tables as $table):?>
                <option value="<?=$table?>" <?=$table == $current_topic ? 'selected' : ''?>><?=$table?></option>
            <?php endforeach;?>    
        </select>
        <p>Выберите промежуток времени</p>
        <input type="datetime-local" name="from" value="<?=@$_GET['from']?>">           
        <input type="datetime-local" name="to" value="<?=@$_GET['to']?>">
        <button onclick="document.querySelector('form').submit()">Показать</button>           
    </div>
    </form>
    <table>
    <tr>
        <th>ID</th>
        <th>Время</th>
        <th>Сообщение</th>
    </tr>
<?php if(!empty($data)):?>    
<?php foreach($data as $row):?>
    <tr>
        <td><?=$row['ID']?></td>
        <td><?=$row['DATE_INSERT']?></td>
        <td><?=$row['MESSAGE']?></td>
    </tr>
<?php endforeach;?>
<?php endif;?>
</table>

</body>
</html>
