<?php

interface Builder {
    public function addNames(string $firstname, string $lastname): Builder;
    public function addEmail(string $email): Builder;
    public function addPhone(string $phone): Builder;
    public function addAddress(string $address): Builder;
    public function build(): User;
}

// poser la question pourquoi return type builder dans interface

class UserBuilder implements Builder {
    private $user;

    public function __construct() {
        $this->reset();
    }

    public function reset(): void {
        $this->user = new User();
    }

    public function addNames(string $firstname, string $lastname): Builder {
        $this->user->firstname = $firstname;
        $this->user->lastname = $lastname;
        return $this;
    }
    public function addEmail(string $email): Builder {
        $this->user->email = $email;
        return $this;
    }
    public function addPhone(string $phone): Builder {
        $this->user->phone = $phone;
        return $this;
    }
    public function addAddress(string $address): Builder {
        $this->user->address = $address;
        return $this;
    }
    public function build(): User {
        if(is_null($this->user->firstname) || is_null($this->user->lastname)) {
            throw new Exception("L'utilisateur n'a pas pu être créé. -> Pas de nom ou prénom");
        }
        if(is_null($this->user->address) && is_null($this->user->phone)) {
            throw new Exception("L'utilisateur n'a pas pu être créé. -> Il faut une adresse mail ou un numéro de téléphone");
        }

        $result = $this->user;
        $this->reset();
        return $result;
    }
}

?>