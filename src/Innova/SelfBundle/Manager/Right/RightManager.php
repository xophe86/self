<?php

namespace Innova\SelfBundle\Manager\Right;

use Innova\SelfBundle\Entity\Right\Right;
use Innova\SelfBundle\Entity\User;

class RightManager
{
    protected $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createRights($rights)
    {
        $em = $this->entityManager;

        foreach ($rights as $r) {
            if (!$em->getRepository("InnovaSelfBundle:Right\Right")->findOneByName($r[0])) {
                $right = new Right();
                $right->setName($r[0]);
                $right->setAttribute($r[2]);
                $right->setClass($r[3]);
                $right->setRightGroup($em->getRepository("InnovaSelfBundle:Right\RightGroup")->findOneByName($r[1]));
                $em->persist($right);
            }
        }

        $em->flush();

        return $this;
    }

    public function checkRight($rightName, User $user, $entity = null)
    {
        $em = $this->entityManager;

        $right = $em->getRepository("InnovaSelfBundle:Right\Right")->findOneByName($rightName);

        if ($right->getUsers()->contains($user)) {
            return true;
        }

        if ($entity &&  $right->getAttribute()) {
            $attribute = $right->getAttribute();
            $repoName = "InnovaSelfBundle:Right\\".$right->getClass();

            if ($em->getRepository($repoName)->findOneBy(array(
                "target" => $entity,
                $attribute => true,
            ))) {
                return true;
            }
        }

        return false;
    }

    public function toggleRight(Right $right, User $user)
    {
        $em = $this->entityManager;

        if ($right->getUsers()->contains($user)) {
            $right->removeUser($user);
        } else {
            $right->addUser($user);
        }
        $em->persist($right);
        $em->flush();

        return $this;
    }
}