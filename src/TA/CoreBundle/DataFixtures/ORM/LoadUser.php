<?php

namespace TA\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TA\CoreBundle\Entity\User;

class LoadUser implements FixtureInterface{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('connor@gmail.com');
        $user->setPlainPassword('root');

        $manager->persist($user);
        $manager->flush();
    }
}