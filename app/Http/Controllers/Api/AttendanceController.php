<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{

    private function jsonRespons($message = '', $body = [], $status = 200)
    {
        return response()->json(['message' => $message, 'data' => $body], $status);
    }

    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'qr_code' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->jsonRespons('Wrong Qrcode', [], 400);
        }

        $registration = Registration::query()->firstWhere('qr_code', $request->input('qr_code'));

        // todo: verify is attendance

        if (!$registration) return $this->jsonRespons('Wrong Qrcode', [], 400);

        // todo: update attendance status

        return $this->jsonRespons('Success', $registration, 200);
    }
}
