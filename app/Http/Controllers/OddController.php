<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class OddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        dd($request->all());
        $r = $request->r;
        $n = $request->n;
        $data = [];
        
        for ($i=0; $i < $r; $i++) { 
            $m = $r - $i;
            $this->c($n, $r); 
            Log::info($this->c($n, $r) / ($this->c($r, $m) * $this->c($n - $r, $r - $m)));

            $oddsResult = [
                'number_of_match' => $m,
                'odds' => $this->c($n, $r) / ($this->c($r, $m) * $this->c($n - $r, $r - $m))
            ];
            
            $data[] =  $oddsResult;
        }

        return response()->json($data);
    }

    /*Recursive function*/
    private function factorial($n)  
    {  
        if($n <= 1) {  
            return 1;  
        }else{  
            return $n * $this->factorial($n - 1);  
        }  
    } 
    
    private function c($n, $r)
    {
        return $this->factorial($n) / ($this->factorial($r) * $this->factorial($n - $r));
    }
}
