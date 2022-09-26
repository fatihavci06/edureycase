<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kitap;
use App\Models\Yazar;
use Illuminate\Support\Facades\Cache;  
use App\Events\logEvent;
class KitapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
         $kitap=Kitap::with('yazarbilgi')->get();
         if(!Cache::has('kitaplar')){ 
             $kitap=Kitap::with('yazarbilgi')->get();

         $bitiszamani=now()->addMinutes(1); 
         Cache::put('kitaplar',$kitap,$bitiszamani);
    }
    else{ //Eğer istatistikler adında cache varsa  cacheden verir döndürür. çok basit
           $kitap=Cache::get('kitaplar');
    }
           
      
         return response()->json(['kitaplar'=>$kitap]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=Kitap::where('id',$id)->first();
       if(empty($data)){
            return response()->json(['mesaj'=>'kitap bulunamadı'],404);
       }
       else{
          
            
            $yazarcount=Yazar::where('id',$request->yazar_id)->count();
            if($yazarcount>0){
                $data->kitap_adi=$request->kitap_adi;
                $data->yazar_id=$request->yazar_id;
                $data->save();
                event(new logEvent($data));
                return response()->json(['mesaj'=>'kitap başarıyla güncellendi'],200);
            }
            else{
                   return response()->json(['mesaj'=>'Yazar tablosunda formdan gelen yazar_id yi bulamadık.'],404);
            }
           
            
       }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $kitap=Kitap::find($id);
          $miktar=Kitap::where('id',$id)->count();
          if($miktar>0){
                \App\Jobs\kitapDeleteJob::dispatch($kitap);
                 return response()->json(['mesaj'=>'Sıraya alınmıştır']);
          }
          else{
                 return response()->json(['mesaj'=>'Kitap bulunamadı']);
          }
     
    
    }
}
