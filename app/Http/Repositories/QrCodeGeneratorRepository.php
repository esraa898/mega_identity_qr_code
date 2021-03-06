<?php 
namespace App\Http\Repositories;

use App\Models\qr_img;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Interfaces\QrCodeGeneratorInterface;

class QrCodeGeneratorRepository implements QrCodeGeneratorInterface {

    public function index()
    {
        $user=Auth::user()->id;
       
        $qrname= 'Qr/'.$user.'.png';
        return view('Qr.viewQr',compact('qrname'));
    }

    public function create(){

        return view('Qr.qrCode');
    }

     public function store(){
        

        
        $user =Auth::user()->id;
        $url = "http://127.0.0.1:8000/enduser/".$user;
         QrCode::format('png')->size(150)->generate($url,public_path('Qr/'.$user.'.png'));
        
         $qrname= 'Qr/'.$user.'.png';
        if(!(qr_img::where('Qr-img', '=', $qrname)->exists())){
            $qr= qr_img::create([
            'Qr-img'=>$qrname,
            'user_id'=>Auth::user()->id
        ]);
        }   
    return view('Qr.viewQr',compact('qrname'));
     }



}