<?php
/**
(1) 勝敗（勝ち・負け・あいこ）は$resultに代入してください
(2) プレイヤーの手は$playerHandに代入してください
(3) コンピューターの手は$pcHandに代入してください
**/

// ここから処理を記述

//(2)プレイヤーの手を入力
$playerHand = $_POST['playerHand'];

//(3)コンピュータの手を入力
$randomNumber = (int) mt_rand() % 3;
$RN = $randomNumber;
function pcHandFunction(&$x)
{
  if ($x === 0) {
    return 'グー';
  }elseif ($x === 1) {
    return 'チョキ';
  }else {
    return 'パー';
  }
};
$pcHand = call_user_func_array('pcHandFunction', array(&$RN));

//(1)勝敗の決定
function results($x, $y)
{
  if($x === 'グー') {
    if($y === 'グー') {
      return 'あいこ';
    }elseif($y === 'チョキ') {
      return '勝ち';
    }else{
      return '負け';
    }
  }elseif($x === 'チョキ') {
    if($y === 'グー') {
      return '負け';
    }elseif($y === 'チョキ') {
      return 'あいこ';
    }else{
      return '勝ち';
    }
  }else {
    if($y === 'グー') {
      return '勝ち';
    }elseif($y === 'チョキ') {
      return '負け';
    }else{
      return 'あいこ';
    }
  }
};
$result = results($playerHand, $pcHand);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>じゃんけん</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">
    <header>
        <div class="header-logo">ゆるグラミング講座</div>
    </header>
    <main>
        <h1>結果は・・・</h1>
        <div class="result-box">
            <p class="result-word"><?= $result ?>！</p>

            あなた：<?= $playerHand ?><br>
            コンピューター：<?= $pcHand ?><br>

            <p><a class="red" href="index.php">>>もう一回勝負する</a></p>
        </div>
    </main>
    <footer>
        <small>&copy;yurugramming!!</small>
    </footer>
</div>
</body>
</html>
