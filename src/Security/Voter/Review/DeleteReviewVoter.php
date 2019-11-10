<?php



declare(strict_types=1);

namespace App\Security\Voter\Review;

use App\Entity\Review;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class DeleteReviewVoter extends Voter
{
    public const CAN_DELETE_REVIEW = 'CAN_DELETE_REVIEW';

    /**
     * {@inheritdoc}
     */
    protected function supports($attribute, $subject)
    {
        // you only want to vote if the attribute and subject are what you expect
        return self::CAN_DELETE_REVIEW === $attribute && ($subject instanceof Review || null === $subject);
    }

    /**
     * {@inheritdoc}
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        // our previous business logic indicates that admins can do it regardless
        foreach ($token->getRoles() as $role) {
            if (\in_array($role->getRole(), ['ROLE_ADMIN'])) {
                return true;
            }
        }

        // allow controller handle not found subject
        if (null === $subject) {
            return true;
        }

        $user = $token->getUser();

        // allow user to delete account
        if ($user instanceof User) {
            return $subject->getAuthor()->getId() === $user->getId();
        }

        return false;
    }
}
