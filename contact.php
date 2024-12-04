<?php
// Vérifier si le formulaire a été soumis
$messageEnvoye = false;
$erreurConsentement = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $consentement = isset($_POST['consent']);

    // Validation basique
    if (!empty($nom) && !empty($email) && !empty($message) && $consentement) {
        // Envoi ou stockage des données
        $messageEnvoye = true;
    } else {
        if (!$consentement) {
            $erreurConsentement = true;
        }
    }
}
?>

<section class="contact">
    <h2>Contact</h2>

    <?php if ($messageEnvoye): ?>
        <p>Merci, <?php echo $nom; ?> ! Votre message a été envoyé.</p>
    <?php else: ?>
        <p>Envoyez-nous un message en utilisant le formulaire ci-dessous :</p>
        <form action="index.php?page=contact" method="post">
        <label for="name">Nom :</label>
    <input type="text" id="name" name="name" autocomplete="name" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" autocomplete="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>

            <!-- Case de consentement avec lien vers la politique de confidentialité -->
            <div>
                <input type="checkbox" id="consent" name="consent" required>
                <label for="consent">
                    J'accepte la <a href="index.php?page=privacy" target="_blank">Politique de Confidentialité</a>
                </label>
            </div>

            <?php if ($erreurConsentement): ?>
                <p style="color: red;">Veuillez accepter la Politique de Confidentialité pour envoyer votre message.</p>
            <?php endif; ?>

            <button type="submit">Envoyer</button>
        </form>
    <?php endif; ?>
</section>
