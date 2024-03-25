<?php
class User
{
    public $id, $name, $pass, $role, $email, $address, $phone;
    public function __construct($id, $name, $pass, $role, $email, $address, $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pass = $pass;
        $this->role = $role;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
    }
}
