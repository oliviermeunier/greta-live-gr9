<?php 

// Vérification du rôle
if (!hasRole(ROLE_ADMIN)) {
    http_response_code(403);
    echo 'Accès interdit';
    exit;
}

// Initialisations
$errors = [];

// Si le formulaire est soumis...
if (!empty($_POST)) {

    // On récupère les données du formulaire
    $title = strip_tags(trim($_POST['title']));
    $abstract = strip_tags(trim($_POST['abstract']));
    $content = strip_tags(trim($_POST['content'])); // @TODO si éditeur WYSIWYG => autoriser certaines balises HTML
    $image = strip_tags(trim($_POST['image'])); // @TODO remplacer le champ type text par un champ d'upload de fichier

    // On valide les données (titre et contenu obligatoires)
    if (!$title) {
        $errors['title'] = 'Le champ "Titre" est obligatoire';
    }

    if (!$content) {
        $errors['content'] = 'Le champ "Contenu" est obligatoire';
    }

    // Si tout est OK (pas d'erreurs)...
    if (empty($errors)) {

        $idUser = getUserId();

        // On enregistre l'article
        $articleModel = new ArticleModel();
        $articleModel->addArticle($title, $abstract, $content, $image, $idUser);

        // On redirige l'internaute (pour l'instant vers une page de confirmation)
        header('Location: ' . buildUrl('admin'));
        exit;
    }
}

// Inclusion du template
$template = 'add_article';
include '../templates/base_admin.phtml';