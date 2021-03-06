<?php 

class ArticleModel extends AbstractModel {

    /**
     * Récupère tous les articles triés par date de création décroissante
     */
    function getAllArticles(): array
    {
        $sql = 'SELECT *
                FROM article AS A
                ORDER BY A.createdAt DESC';

        return $this->db->getAllResults($sql);
    }

    /**
     * Récupère UN article à partir de son identifiant
     * @param int $idArticle - L'identifiant de l'article à récupérer
     * @return bool|array - false si l'id n'existe pas, sinon retourne l'article
     */
    function getOneArticle(int $idArticle): bool|array
    {
        $sql = 'SELECT *
                FROM article AS A
                WHERE idArticle = ?';

        return $this->db->getOneResult($sql, [$idArticle]);
    }

    /**
     * Ajoute un article
     * @param string $title Le titre de l'article
     * @param string $abstract Le résumé de l'article
     * @param string $content Le contenu de l'article
     * @param string $title Le nom du fichier image de l'article
     * @return void
     */
    function addArticle(string $title, string $abstract, string $content, string $image, int $idUser)
    {
        $sql = 'INSERT INTO article (title, content, abstract, image, createdAt, fkUserId)
                VALUES (?,?,?,?,NOW(),?)';

        $this->db->executeQuery($sql, [$title, $content, $abstract, $image, $idUser]);
    }

    /**
     * Modifie un article
     * @param string $title Le titre de l'article
     * @param string $abstract Le résumé de l'article
     * @param string $content Le contenu de l'article
     * @param string $title Le nom du fichier image de l'article
     * @return void
     */
    function editArticle(string $title, string $abstract, string $content, string $image, string $idArticle)
    {
        $sql  ='UPDATE article 
                SET title = ?, content = ?, abstract = ?, image = ?
                WHERE idArticle = ?';

        $this->db->executeQuery($sql, [$title, $content, $abstract, $image, $idArticle]);
    }

    /**
     * Supprime un article à partir de son identifiant
     * @param string $idArticle - L'identifiant de l'article à supprimer
     */
    function deleteArticle(string $idArticle)
    {
        $sql = 'DELETE FROM article
                WHERE idArticle = ?';

        $this->db->executeQuery($sql, [$idArticle]);
    }

}