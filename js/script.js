document.addEventListener("DOMContentLoaded", function() {
    // Initialisation du mode sombre
    initializeDarkModeToggle();
    
    // Gestion de la soumission du formulaire
    handleFormSubmission();

    fetchStudentData();
});

/**
 * Initialise le bouton de basculement du mode sombre.
 */
function initializeDarkModeToggle() {
    // Sélectionnez le bouton de basculement
    const toggleButton = document.getElementById('onoff');
    
    // Ajoutez un écouteur d'événement pour le clic
    toggleButton.addEventListener('click', function() {
        // Bascule la classe 'dark-mode' sur l'élément body
        document.body.classList.toggle('dark-mode');
        
        // Change l'icône du bouton en fonction du mode
        if (document.body.classList.contains('dark-mode')) {
            toggleButton.classList.remove('fa-toggle-off');
            toggleButton.classList.add('fa-toggle-on');
        } else {
            toggleButton.classList.remove('fa-toggle-on');
            toggleButton.classList.add('fa-toggle-off');
        }
    });
}

/**
 * Gère la soumission du formulaire en utilisant AJAX.
 */
function handleFormSubmission() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire classique

        // Récupération des données du formulaire
        const formData = new FormData(form);

        // Envoi des données via AJAX
        fetch("../php/traitement.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Affichage des messages de succès ou d'erreur
            if (data.success) {
                alert("Votre message a été envoyé avec succès !");
                form.reset(); // Réinitialise le formulaire
            } else {
                alert("Erreur : " + data.message);
            }
        })
        .catch(error => {
            console.error("Erreur : ", error);
        });
    });
}


function fetchStudentData() {
    fetch("get_student_data.php")
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error("Erreur : ", data.error);
                return;
            }

            document.querySelector('.nbre span').textContent = data.totalStudents;
            document.querySelector('.enligne span').textContent = data.studentsOnline;
        })
        .catch(error => {
            console.error("Erreur : ", error);
        });
}
