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
            color: #fff !important;
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
                                        <p>Dear Participant</p>
                                        <p>Congratulations <strong> {{ $registration->full_name ?? '' }} </strong> 🎉</p>
                                        <p>
                                            You have been accepted to participate in IDJ (I Develop Journey), A learning
                                            event
                                            dedicated to sharing & learning computer science and engineering know-how
                                            with detailed lectures and hands-on practical work where you shape &
                                            grow your technical skills in a variety of CS topics.

                                            <!-- todo: Journey Content - Workshops & Important date -->
                                        </p>
                                        <p>Please confirme your attendance by clicking the following link </p>
                                        <p style="text-align: center">
                                            <a href="{{ $confirmation_link }}" class="button button-confirmation">
                                                <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABSklEQVR4nN2VTU4CQRSE0TOgCz0F3MQFHEDY4B4T5EKy9AcuMhcgwk5JjKxcfaaS6jBi99iNbvQlncx0v1fV72dqWq1/a8AxMAHWwDOwAAZec+AFWALXwNEhBALPtXEpeBt4c/AFcOKbP3jp+Rzo2Ue+7RLwWwfOM/xVLhyTJlEdlWrt5u9AN4Oga9+QyTjaE2Baq+kj0MlKeUcSMpFNY04rH/YKgE+BUe29b4xVzHnjw7MC8MoxV95T42WbWIDmXHZZCF7p3fuaLtkiFjT04d3e/igANIH77N77wywCpV4HagLPIQhTMGi4bZUCzylRtMl8JkmC5zR5nRpTdiRJ8L0xfSr+0HAPEsAdxwSbpKRC0rv9gVRsv5Vvi93sALGblSpqEL2+m/c7cl0jkSrm2teaZxCEniz9e5SU6GPU0vOrJ+9Gv9digj9jH9wTRHD8JtoLAAAAAElFTkSuQmCC">
                                                <span>I Confirme</span>
                                            </a>
                                        </p>

                                        <p>We are existed to meet you soon,</p>
                                        <p>Kind regards,</p>
                                        <p><strong>ID TEAM</strong></p>
                                        <div class="line"></div>
                                        <p>
                                            <small>Have difficulties with confirmation button ? please click this
                                                <a href="{{ $confirmation_link }}">link</a> or contact as at <span
                                                    class="orange-text">contact@idevelop.club</span>
                                            </small>
                                        </p>
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

