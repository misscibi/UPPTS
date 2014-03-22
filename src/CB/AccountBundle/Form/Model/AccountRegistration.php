<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registration
 *
 * @author Christabel
 */
namespace CB\AccountBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use CB\AccountBundle\Entity\Account;


class AccountRegistration {
    /**
     * @Assert\Type(type="CB\AccountBundle\Entity\Account")
     * @Assert\Valid()
     */
    protected $account;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setAccount(Account $account)
    {
        $this->account = $account;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}
