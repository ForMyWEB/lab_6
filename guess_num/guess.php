<?php

function playGame($attempts)
{
    echo "Я загадав число від 1 до 100. Спробуй вгадати.\n";

    $randomNumber = rand(1, 100);
    $currentAttempt = 0;

    $checkGuess = function ($guess, $number) {
        if ($guess > $number) {
            return "Спробуй менше.";
        } elseif ($guess < $number) {
            return "Спробуй більше.";
        } else {
            return "correct";
        }
    };

    while ($currentAttempt < $attempts) {
        $currentAttempt++;
        echo "Спроба {$currentAttempt}: ";
        $input = trim(fgets(STDIN));

        if (!validate($input)) {
            echo "Будь ласка, введіть ціле число від 1 до 100.\n";
            $currentAttempt--;
            continue;
        }

        $guess = (int) $input;

        $result = $checkGuess($guess, $randomNumber);

        if ($result === "correct") {
            echo "Вітаю! Ти вгадав число {$randomNumber} за {$currentAttempt} спроб(у/и)!\n";
            return;
        } else {
            echo "{$result}\n";
        }
    }

    echo "На жаль, ти не вгадав число. Загадане число було: {$randomNumber}\n";
}

function validate($inputParam)
{
    return is_numeric($inputParam) && (int) $inputParam == $inputParam && $inputParam >= 1 && $inputParam <= 100;
}

playGame(7);
