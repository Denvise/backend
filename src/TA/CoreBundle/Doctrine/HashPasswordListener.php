<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 29/10/17
 * Time: 13:08
 */

namespace TA\CoreBundle\Doctrine;


use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use TA\CoreBundle\Entity\User;

class HashPasswordListener implements EventSubscriber
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return ['prePersist'];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        var_dump($this->passwordEncoder);
        exit();
        $entity = $args->getEntity();
        if (!$entity instanceof User) {
            return;
        }
        $encoded = $this->passwordEncoder->encodePassword(
            $entity,
            $entity->getPlainPassword()
        );
        $entity->setPassword($encoded);
    }
}