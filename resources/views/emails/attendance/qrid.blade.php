
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif, Arial, Verdana, "Trebuchet MS", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        p {
            margin-bottom: 12px;
        }

        small {
            color: rgba(0, 0, 0, 0.8) !important;
        }

        .header {
            color: #0569B4;
            font-weight: bold;
            font-size: 24px;
            line-height: 1.5;
            letter-spacing: 8px;
        }

        .orange-text {
            color: #EC8002;
        }

        .line {
            width: 100%;
            height: 1px;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .mail-inner {
            padding: 16px;
            max-width: 600px !important;
        }

        .button-confirmation {
            display: inline-flex;
            gap: 12px;
            text-align: center;
            margin: 24px 0;
            border-radius: 8px;
            padding: 10px 14px;
            background-color: #0569B4;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }


        @media only screen and (max-width: 600px) {

            .mail-inner {
                padding: 0px !important;
                width: 100% !important;
            }

            .inner-body {
                padding: 12px;
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                               role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    <div class="mail-inner">
                                        <div class="header">
                                            1<span class="orange-text">IDJ</span>'23
                                        </div>
                                        <p>Dear <strong> {{ $registration->full_name ?? '' }} </strong></p>
                                        <p>
                                            The following id will be used to identify you during the journey, use it
                                            when necessary
                                        </p>

                                        {{-- OLD --}}
                                        {{--  <p style="margin: 20px 0;">--}}
                                        {{--  {!! QrCode::generate($registration->qr_code); !!}--}}
                                        {{-- </p>--}}

                                        <p>
                                            <img
                                                src="{!!$message->embedData(QrCode::format('png')->generate($registration->qr_code), 'QrCode.png', 'image/png')!!}">
                                        </p>

                                        <p style="text-align: right">
                                            المكان: مدرج المكتبة المركزية
                                            الساعة: الثامنة صباحا (08:00)
                                        </p>

                                        <p style="text-align: right">
                                            ملاحضة: يرحى إحضار الحاسوب مع الأنترنت بالاضافة Multiprise
                                        </p>

                                        <p style="text-align: right">
                                            رقم النادي: 0673936944
                                        </p>
                                        <p>Have fun with your JOURNEY ✨</p>
                                        <p>Kind regards,</p>
                                        <p><strong>ID TEAM</strong></p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

