<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> チーム作成 </title>
</head>

<body>
    <h2>チーム作成</h2>

    <form action="insert.php" method="post">

        <label for="team">参加したいチーム</label>
        <select name="team" id="team">
            <option value="onemonth">1ヶ月短期集中で−2kgチーム</option>
            <option value="twomonths">3ヶ月じっくり集中で−4kgチーム</option>
            <option value="sixmonths">6ヶ月長期集中で−6kgチーム</option>
        </select><br>

        <label for="name">ユーザー名</label>
        <input type="text" name="name" id="name"><br>

        <label for="now_weight">現在の体重</label>
        <input type="text" name="now_weight" id="now_weight" placeholder="kg"><br>

        <label for="now_height">現在の身長</label>
        <input type="text" name="now_height" id="now_height" placeholder="cm"><br>

        <label for="mokuhyou_weight">目標体重</label>
        <input type="text" name="mokuhyou_weight" id="mokuhyou_weight" placeholder="kg"><br>



        <label for="rule">期間中のMyrule</label>
        <textarea name="rule" cols="40" rows="4"></textarea>
        <p><input type="button" value="参加する"></p>

    </form>

</body>
</html>
