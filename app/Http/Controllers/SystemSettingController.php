<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function index()
    {
        try{
        $sys =SystemSetting::all();
       return response()->json(['data'=> $sys], 200) ; 
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }

    public function store(Request $request)
    {
        try{
//

} catch (\Exception $e) {
 
    return response()->json(['message' => $e->getMessage()], 422);
}
    }

    public function show(SystemSetting $systemSetting)
    {
        try{
            //
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function update(Request $request, SystemSetting $systemSetting)
    {
        try{
//
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }


    public function destroy(SystemSetting $systemSetting)
    {
        try{
            //
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
