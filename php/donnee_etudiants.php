<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'cilma_db';
$username = 'root'; // Changez ce nom d'utilisateur si nécessaire
$password = ''; // Changez ce mot de passe si nécessaire

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Compter le nombre total d'étudiants
    $stmt = $pdo->query("SELECT COUNT(*) FROM students");
    $totalStudents = $stmt->fetchColumn();

    // Compter le nombre d'étudiants en ligne (exemple avec une table fictive `online_students`)
    $stmt = $pdo->query("SELECT COUNT(*) FROM online_students"); // Assurez-vous que cette table existe
    $studentsOnline = $stmt->fetchColumn();

    // Préparer les données à renvoyer en JSON
    $data = [
        'totalStudents' => $totalStudents,
        'studentsOnline' => $studentsOnline
    ];

    echo json_encode($data);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
