<?php
function rollDice()
{
    return rand(1, 6);
}

function validate($inputParam)
{
    return $inputParam === '';
}

function playGame()
{
    $score = 0;
    echo "Початковий рахунок: $score\n";

    while ($score < 20) {
        echo "Натисніть Enter, щоб зробити кидок...\n";
        $input = readline();

        if (!validate($input)) {
            echo "Невірне введення! Спробуйте ще раз.\n";
            continue;
        }

        $roll = rollDice();
        echo "Кидок: $roll. ";

        if ($roll == 6) {
            echo "Суперкидок! Натисніть Enter для наступного кидка...\n";
            readline();
            $superRoll = rollDice();
            echo "Кидок: $superRoll. ";
            $score += $superRoll;
            echo "Загальний рахунок: $score\n";
        } else {
            $score += $roll;
            echo "Загальний рахунок: $score\n";
        }

        if ($score == 20) {
            echo "Вітаємо! Ви виграли з рахунком 20 очок!\n";
            break;
        } elseif ($score > 20) {
            echo "Вибачте, ви програли! Ви перевищили 20 очок.\n";
            break;
        }
    }
}
playGame();
?>