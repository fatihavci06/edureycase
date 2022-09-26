<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use App\Models\Yazar;
class KitapsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('yazars')->delete();
         $faker=Faker::create(); 

         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
          $ids = array();
       
        for ($i = 1; $i <= 10; $i++) {
    		$id=DB::table('yazars')->insertGetId([
            'yazar_adi'=>$faker->name,
            
            ]);
         	 array_push($ids, $id);
            

   		 }
   		  for ($i = 1; $i <= 10; $i++) {
   		  		$anahtar = array_rand($ids,1);
   		  		DB::table('kitaps')->insertGetId([
	            'kitap_adi'=>'Kitap'.$i,
	            'yazar_id'=>$ids[$anahtar],
	            
	            ]);


   		  }
   		  DB::statement('SET FOREIGN_KEY_CHECKS=1;');
   		 
}
         
}
