<?php

namespace App\Traits;

trait Status
{
    public function changeField($data)
    {
        try {
            $this->update($data);
        }
        //catch exception
        catch(Exception $e) {
            //echo 'Message: ' .$e->getMessage();
            return False;
        }
        return true;
    }
}
