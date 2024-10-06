<!-- Stampiamo il nostro array mettendo gli insegnanti in un rettangolo grigio e i PM in un rettangolo verde. -->

<?php
$db = [
    'teachers' => [
        [
            'name' => 'Michele',
            'lastname' => 'Papagni'
        ],
        [
            'name' => 'Fabio',
            'lastname' => 'Forghieri'
        ]
    ],
    'pm' => [
        [
            'name' => 'Roberto',
            'lastname' => 'Marazzini'
        ],
        [
            'name' => 'Federico',
            'lastname' => 'Pellegrini'
        ]
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snacks 3</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php foreach ($db as $key => $element) : ?>
        <div class="bg-<?= $key === 'teachers' ? 'primary' : 'secondary' ?>">

            <h2><?= $key ?></h2>

            <ul>
                <?php foreach ($element as $personKey => $personValue) : ?>
                    <li>

                        <?= "{$personValue['name']} {$personValue['lastname']}" ?>

                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    <?php endforeach; ?>
</body>

</html>