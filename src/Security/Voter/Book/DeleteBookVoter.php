<?php



declare(strict_types=1);

namespace App\Security\Voter\Book;

use App\Entity\Book;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class DeleteBookVoter extends Voter
{
    public const CAN_DELETE_BOOK = 'CAN_DELETE_BOOK';

    /**
     * {@inheritdoc}
     */
    protected function supports($attribute, $subject)
    {
        // you only want to vote if the attribute and subject are what you expect
        return self::CAN_DELETE_BOOK === $attribute && ($subject instanceof Book || null === $subject);
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

        return false;
    }
}
