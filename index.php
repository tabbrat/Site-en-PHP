<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        // Inclure la page appropriée selon le paramètre
        switch ($page) {
            case 'home':
                include 'home.php';
                break;
            case 'about':
                include 'about.php';
                break;
            case 'contact':
                include 'contact.php';
                break;
            case 'privacy':
                include 'pages/privacy.php';
                break;
            default:
                echo "<p>Page non trouvée.</p>";
                break;
        }
        ?>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
