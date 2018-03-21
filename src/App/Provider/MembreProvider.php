<?php

namespace App\Provider;


use App\Model\Membre;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class MembreProvider implements UserProviderInterface
{

    private $_db;


    public function __construct($_db)
    {
        $this->_db = $_db;
    }

    public function loadUserByUsername($EMAILMEMBRE)
    {
        $membre = $this->_db->for_table('membre')
            ->where('EMAILMEMBRE', $EMAILMEMBRE)
            ->find_one();

        if(empty($membre)) :
            throw new UsernameNotFoundException(
                sprintf('Cet utilisateur "%s" n\'existe pas.',
                    $EMAILMEMBRE)
            );
        endif;

        return new Membre($membre->IDMEMBRE, $membre->NOMMEMBRE,
            $membre->PRENOMMEMBRE, $membre->EMAILMEMBRE,
            $membre->MDPMEMBRE, $membre->ROLEMEMBRE, $membre->DATEINSCRIPTION);
    }

    public function refreshUser(UserInterface $membre)
    {
        if(!$membre instanceof Membre) :
            throw new UnsupportedUserException(
                sprintf('Les instances de "%s" ne sont pas autorisées.',
                    getClass($membre))
            );
        endif;

        return $this->loadUserByUsername($membre->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === Membre::class;
    }

}