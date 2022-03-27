<?php 

namespace App\Http\Interfaces;

interface UserInterface {


    public function index();
    public function update( $request, $id);
    public function delete($id);
}