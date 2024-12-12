<?php
function validate($inputParam)
{
    $validChoices = ['0', '1', '2'];
    return in_array($inputParam, $validChoices);
}

function getComputerChoice()
{
    $choices = ['камінь', 'ножиці', 'папір'];
    return $choices[rand(0, 2)];
}

function playRound($userChoice)
{
    $computerChoice = getComputerChoice();
    $outcomes = [
        '0' => ['0' => 'Нічия', '1' => 'Ти виграв!', '2' => 'Комп\'ютер виграв!'],
        '1' => ['0' => 'Комп\'ютер виграв!', '1' => 'Нічия', '2' => 'Ти виграв!'],
        '2' => ['0' => 'Ти виграв!', '1' => 'Комп\'ютер виграв!', '2' => 'Нічия'],
    ];

    echo "Я вибрав: $computerChoice\n";

    return $outcomes[$userChoice][$computerChoice];
}

$userScore = 0;
$computerScore = 0;

echo "Гра 'Камінь, Ножиці, Папір'!\n";
for ($round = 1; $round <= 3; $round++) {
    echo "Раунд $round. Обери:\n";
    echo "[0] камінь\n[1] ножиці\n[2] папір\n";

    $userChoice = readline("-> ");

    if (!validate($userChoice)) {
        echo "Невірний вибір! Спробуйте ще раз.\n";
        $round--;
        continue;
    }

    $result = playRound($userChoice);
    echo "$result\n";

    if ($result === 'Ти виграв!') {
        $userScore++;
    } elseif ($result === 'Комп\'ютер виграв!') {
        $computerScore++;
    }
}

echo "Загальний рахунок:\nТи: $userScore\nКомп\'ютер: $computerScore\n";

if ($userScore > $computerScore) {
    echo "Ти переміг!\n";
} elseif ($userScore < $computerScore) {
    echo "Комп\'ютер переміг!\n";
} else {
    echo "Нічия!\n";
}
?>