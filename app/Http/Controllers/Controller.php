<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function checkRoleAdmin ($role)
    {
        if($role != 'admin') {
            return true ;
        }
    }
    public function checkRoleAdminOrganisater ($role)
    {
        if($role === 'client') {
            return true ;
        }else{
            return false;
        }
    }
}
