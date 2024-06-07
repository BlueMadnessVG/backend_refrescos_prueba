<?php

namespace App\Http\Controllers;

use App\Models\Refresco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class Controller
{
    //
    public function index() {
        $refrescos = Refresco::all();

        if ($refrescos->isEmpty()) {
            return response()->json(["message" => "No data fount"], 422);
        }

        $data = [
            "message" => "data fount",
            "data" => $refrescos,
        ];

        return response()->json($data, 200);
    }

    public function show($id) {
        $refrescos = Refresco::find($id);

        if (!$refrescos) {
            return response()->json(["message" => "No data fount"], 422);
        }

        $data = [
            "message" => "data fount",
            "data" => $refrescos
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [ 
            "name" => "required|string|max:50",
            "brand" => "required|string|max:50",
            "flavor" => "required|string|max:50",
            "time_spam" => "required|date"
        ]);

        if ($validator->fails()) {
            return response()->json(["message"=> $validator->errors()],422);
        }

        $data = $request->all();
        $refresco = Refresco::create($data);

        if (!$refresco) {
            return response()->json(["message"=> "error in creating the item"], 500);
        }

        $data = [
            'message' => "item created",
            'data' => $refresco
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id) {
        $refresco = Refresco::find($id);

        if (!$refresco) {
            return response()->json(["message" => "No data fount"], 422);
        }
        
        $validator = Validator::make($request->all(), [ 
            "name" => "string|max:50",
            "brand" => "string|max:50",
            "flavor" => "string|max:50",
            "time_spam" => "date"
        ]);

        if ($validator->fails()) {
            return response()->json(["message"=> $validator->errors()],422);
        }

        $refresco->update($request->only(['name', 'brand', 'flavor', 'time_spam']));

        $data = [
            'message'=> 'item updated',
            'data' => $refresco
        ];

        return response()->json($data, 200);       
    }

    public function destroy($id) { 
        $refresco = Refresco::find($id);

        if (!$refresco) {
            return response()->json(["message" => "No data fount"], 422);
        }

        $refresco->delete();

        $data = [
            "message" => "item deleted",
        ];

        return response()->json($data, 200);       
    }
}
