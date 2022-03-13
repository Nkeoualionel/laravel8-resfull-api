<?php


namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


trait ApiResponser {

    private function succes($data, $code) 
    {
        return response()->json($data, $code);
    }


    protected function error($message, $code) 
    {
        return response()->json([
            'error' => $message, 
            'code' => $code], $code);
    }


    public function showAll(Collection $collection, $code = 200)
    {
        return $this->succes(['data' => $collection], $code);
    }


    public function showOne(Model $model, $code = 200) 
    {
        return response()->json(['data' => $model], $code);
    }
}