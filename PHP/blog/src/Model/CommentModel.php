<?php 

class CommentModel extends AbstractModel {

    /**
     * Insère un nouveau commentaire dans la base de données
     */
    function insertComment(string $content, int $idUser, int $idArticle)
    {
        // Préparation de la requête
        $sql = 'INSERT INTO comment (content, fkUserId, fkArticleId, createdAt)
                VALUES (?,?,?,NOW())';

        $this->db->executeQuery($sql, [$content, $idUser, $idArticle]);
    }

    /**
     * Récupère tous les commentaires associés à un article à partir de son identifiant
     */
    function getCommentsByArticleId(int $idArticle)
    {
        // Préparation de la requête
        $sql = 'SELECT content, C.createdAt, firstname, lastname
                FROM comment AS C
                INNER JOIN user AS U ON C.fkUserId = U.idUser
                WHERE fkArticleId = ?
                ORDER BY C.createdAt DESC';

        return $this->db->getAllResults($sql, [$idArticle]);
    }


}