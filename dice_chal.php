<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Random Dice Roller</title>
</head>
<body>
    <h1>Random Dice Roller</h1>
    <!-- My first PHP program. -->
    <form method="get">
        How many dice would you like to roll [1 - 200]?<br>
        <label>
            <input type="number" name="rolls" width="15">
        </label>
        <input type="submit" value="Go">
    </form>
    <?php
    $rolls = intval($_GET['rolls']);
    $random_rolls = [];
    $dice = [
        ['┌───────┐', '│       │', '│   ●   │', '│       │', '└───────┘'],
        ['┌───────┐', '│ ●     │', '│       │', '│     ● │', '└───────┘'],
        ['┌───────┐', '│ ●     │', '│   ●   │', '│     ● │', '└───────┘'],
        ['┌───────┐', '│ ●   ● │', '│       │', '│ ●   ● │', '└───────┘'],
        ['┌───────┐', '│ ●   ● │', '│   ●   │', '│ ●   ● │', '└───────┘'],
        ['┌───────┐', '│ ●   ● │', '│ ●   ● │', '│ ●   ● │', '└───────┘']];

    if (is_int($rolls) && $rolls > 0 && $rolls <= 200) {
        echo "<p>You entered ${rolls}, here are your rolls.</p>";
        for ($i = 0; $i < $rolls; $i++) {
             $random_rolls[] = random_int(1, 6);}
        $random_rolls = array_chunk($random_rolls, 10);
        echo "<pre>";
        foreach ($random_rolls as $chunk) {
            for ($i = 0; $i <= 5; $i++) {
                foreach ($chunk as $roll) {
                    echo $dice[$roll - 1][$i];}
                if ($i != 5) {
                echo "<br>";}}}
        echo "</pre>";
    }
    ?>
</body>
</html>
