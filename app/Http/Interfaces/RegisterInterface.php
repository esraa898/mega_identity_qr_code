<?php

namespace App\Http\Interfaces;

interface RegisterInterface{

    public function validator( $data);
    public function create( $data);


}