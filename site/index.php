<?php
require_once('model.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MQTT Raspberry</title>
    <link rel="stylesheet" href="style.css">
    <link href="../examples.css" rel="stylesheet" type="text/css">
	<script language="javascript" type="text/javascript" src="../../source/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.canvaswrapper.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.colorhelpers.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.flot.saturated.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.flot.browser.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.flot.drawSeries.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.flot.uiConstants.js"></script>
	<script language="javascript" type="text/javascript" src="../../source/jquery.flot.time.js"></script>
	<script language="javascript" type="text/javascript" src="js/script.js"></script>
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
    <div id="content">
		<div class="demo-container"><div id="placeholder" class="demo-placeholder"></div></div>
	</div>
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
<script src="js/script.js"></script>
</body>
</html>
