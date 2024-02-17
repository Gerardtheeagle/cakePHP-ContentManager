<?php declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Article;
use Authorization\IdentityInterface;

/**
 * Article policy
 */
class ArticlePolicy
{
    /**
     * Check if $user can add Article
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Article $article
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Article $article)
    {
        // Tous les utilisateurs authentifiés peuvent créer des articles.
        return true;
    }

    /**
     * Check if $user can edit Article
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Article $article
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Article $article)
    {
        // Les utilisateurs authentifiés ne peuvent modifier que leurs articles.
        return $this->isAuthor($user, $article);
    }

    /**
     * Check if $user can delete Article
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Article $article
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Article $article)
    {
        // Les utilisateurs authentfiés ne peuvent supprimer que leurs articles.
        return $this->isAuthor($user, $article);
    }

    protected function isAuthor(IdentityInterface $user, Article $article)
    {
        return $article->user_id === $user->getIdentifier();
    }

    /**
     * Check if $user can view Article
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Article $article
     * @return bool
     */
    public function canView(IdentityInterface $user, Article $article) {}
}
