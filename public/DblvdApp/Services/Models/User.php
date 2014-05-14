<?php

namespace DblvdApp\Services\Models;

use Symfony\Component\Security\Core\User as SfUser;

class User extends \ActiveRecord\Model implements SfUser\AdvancedUserInterface  {
    
    
    private $username;
    private $password;
    private $roles;
    private $enabled = true;
    private $accountNonExpired = true;
    private $credentialsNonExpired = true;
    private $accountNonLocked = true;
    

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return explode(',',$this->read_attribute('roles'));
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->read_attribute('password');
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->read_attribute('username');
        //return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonExpired()
    {
        return $this->accountNonExpired;
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonLocked()
    {
        return $this->accountNonLocked;
    }

    /**
     * {@inheritdoc}
     */
    public function isCredentialsNonExpired()
    {
        return $this->credentialsNonExpired;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
    }
    
    public function printTest(){
        error_log("USER PRINT TEST");
    }
    
}