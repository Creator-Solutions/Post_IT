<?php

class User {

    private string $user_id;
    private string $fullname;
    private string $email;
    private string $password;

    public function __construct($obj){
        $this->user_id = $obj['User_ID'];
        $this->fullname = $obj['FullName'];
        $this->email = $obj['Email'];
        $this->password = $obj['Password'];
    }

    public string function Get_ID(){
        return $this->user_id;
    }

    public string function Get_Name(){
        return $this->fullname;
    }

    public string function Get_Email(){
        return $this->email;
    }

    public string function Get_Password(){
        return $this->password;
    }
}