<?php

namespace App\Http\Controllers;

use App\Models\qr_img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Interfaces\QrCodeGeneratorInterface;

class QrCodeGeneratorController extends Controller
{


    protected $QrCodeGeneratorInteface ;


    public function __construct(QrCodeGeneratorInterface  $qrCodeGeneratorInterface)
    {
        $this->QrCodeGeneratorInteface =$qrCodeGeneratorInterface;
    }


    public function index()
    {
        return  $this->QrCodeGeneratorInteface->index();
    }

    public function create(){

        return  $this->QrCodeGeneratorInteface->create();
    }

     public function store(){
        

         
    return  $this->QrCodeGeneratorInteface->store();
     }


  
}
