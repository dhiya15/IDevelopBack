<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AttendanceQRiDMail;
use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    public function confirmeAttendance($id)
    {
        $registration = Registration::query()->find($id);
        if (!$registration) {
            return redirect('/');
        }

        $registration->update(['is_accepted' => true]);

        // DISABLE PDF CREATION
        // make & send email with pdf attachement
        // $attendance_pdf = Pdf::loadView('idj.pdf.attendance-id', compact('registration'))
        //     ->setOptions(['defaultFont' => 'sans-serif']);
        // $file_name = 'attendance' . DIRECTORY_SEPARATOR . $registration->email . '-' . sha1(random_int(1000, 9999)) . '.pdf';
        // $attendance_pdf->save($file_name);

        // send an email with QR_CODE
        if (!$registration->qr_code) {
            $registration->qr_code = random_int(100000, 999999);
            $registration->save();
        }
        Mail::to($registration->email)->send(new AttendanceQRiDMail($registration));

        return view('idj.attendance.confirmation', compact('registration'));
    }

    public function resendAttendanceId($id)
    {
        $registration = Registration::query()->find($id);
        if (!$registration) {
            return redirect('/');
        }

        // send an email with QR_CODE
        if (!$registration->qr_code) {
            $registration->qr_code = random_int(100000, 999999);
            $registration->save();
        }
        Mail::to($registration->email)->send(new AttendanceQRiDMail($registration));

        $resend = true;

        return view('idj.attendance.confirmation', compact('registration', 'resend'));
    }
}
