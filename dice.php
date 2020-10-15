<!DOCTYPE html>
<html lang="en">
<style>
    body {
        background-color: #027a44;
        color: navajowhite;
        font-family: cursive;
        text-align: left;
        background-image: url("dice.png");
        background-size: cover;
        background-attachment: fixed;
    }
    pre {
        border-color: #027a44d0;
        border-style: solid;
        width: fit-content;
        background: #027a44d0;
        border-radius: 10px;
        }
    .footer {
        font-family: monospace;
        font-size: xx-small;
        position: fixed;
        bottom: 10px;
        right: 10px;

    }
</style>
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
            try {
                $random_rolls[] = random_int(1, 6);
            } catch (Exception $e) {
                echo $e;
            }}
        $random_rolls = array_chunk($random_rolls, 10);
        echo "<pre>\n";
        foreach ($random_rolls as $chunk) {
            for ($i = 0; $i <= 5; $i++) {
                foreach ($chunk as $roll) {
                    echo $dice[$roll - 1][$i];}
                if ($i != 5) {
                echo "\n";}}}
        echo "</pre>";
    }
    ?>
<div class="footer">IMAGE BY DAVIDGSTEADMAN, FLICKR CREATIVE COMMONS</div>
</body>
</html>

