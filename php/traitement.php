<?php
// Traitement du formulaire de contact

// Vérifie si la requête est bien une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $sujet = filter_input(INPUT_POST, 'sujet', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    
    // Validation des données (ajustez selon vos besoins)
    if (empty($nom) || empty($prenom) || empty($email) || empty($tel) || empty($sujet) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Tous les champs sont requis.']);
        exit;
    }

    // Envoyer l'email ou enregistrer les données dans une base de données
    // Exemple d'envoi d'email
    $to = "contact@votreentreprise.com"; // Remplacez par votre adresse e-mail
    $subject = "Nouveau message de $nom $prenom - Sujet : $sujet";
    $body = "Nom : $nom\nPrénom : $prenom\nEmail : $email\nTél : $tel\n\nMessage :\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Votre message a été envoyé avec succès !']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'envoi du message.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requête invalide.']);
}
?>
