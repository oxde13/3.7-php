<?php
session_start();

if (!isset($_SESSION['reviews'])) {
    $_SESSION['reviews'] = [
        ['name' => 'Иван', 'review' => 'Отличный товар!', 'rating' => 5],
        ['name' => 'Мария', 'review' => 'Хорошее качество!', 'rating' => 4]
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $review = htmlspecialchars($_POST['review']);
    $rating = (int)$_POST['rating'];

    $_SESSION['reviews'][] = ['name' => $name, 'review' => $review, 'rating' => $rating];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отзывы</title>
</head>
<body>

<h1>Оставьте свой отзыв</h1>
<form method="post" action="">
    <label for="name">Ваше имя:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="review">Ваш отзыв:</label><br>
    <textarea id="review" name="review" required></textarea><br><br>

    <label for="rating">Оценка (1-5):</label><br>
    <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

    <input type="submit" value="Отправить">
</form>

<h2>Отзывы:</h2>
<?php foreach ($_SESSION['reviews'] as $review): ?>
    <div>
        <h3><?php echo htmlspecialchars($review['name']); ?> (Оценка: <?php echo htmlspecialchars($review['rating']); ?>)</h3>
        <p><?php echo htmlspecialchars($review['review']); ?></p>
        <hr>
    </div>
<?php endforeach; ?>

</body>
</html>
