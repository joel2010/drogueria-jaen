<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Contacto recibido</title>
    <style>
        /* Estilos basicos y media query para clientes compatibles */
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f5;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table {
            border-collapse: collapse;
        }

        img {
            display: block;
            border: 0;
            line-height: 0;
        }

        .container {
            width: 600px;
            max-width: 100%;
            background: #ffffff;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            padding: 20px;
            text-align: center;
            background: #ffffff;
        }

        .content {
            padding: 24px;
            color: #333333;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            font-size: 16px;
            line-height: 1.4;
        }

        .title {
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 12px 0;
            color: #111827;
        }

        .kv-table {
            width: 100%;
            border-spacing: 0;
            margin-top: 8px;
        }

        .kv-row {
            border-top: 1px solid #e9e9ee;
        }

        .kv-key {
            width: 35%;
            padding: 12px 8px;
            font-weight: 600;
            vertical-align: top;
            color: #374151;
            font-size: 14px;
        }

        .kv-value {
            width: 65%;
            padding: 12px 8px;
            vertical-align: top;
            color: #111827;
            font-size: 14px;
            word-break: break-word;
        }

        .message-box {
            margin-top: 12px;
            padding: 14px;
            background: #f8fafc;
            border-radius: 6px;
            color: #111827;
            font-size: 14px;
        }

        .footer {
            padding: 16px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            background: #ffffff;
        }

        @media only screen and (max-width:480px) {

            .kv-key,
            .kv-value {
                display: block;
                width: 100% !important;
                padding: 10px 6px !important;
            }

            .kv-key {
                background: transparent;
                font-weight: 700;
            }

            .content {
                padding: 16px;
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Wrapper table for email clients -->
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="background-color:#f4f4f5; width:100%;">
        <tr>
            <td align="center" style="padding:20px;">
                <table class="container" cellpadding="0" cellspacing="0" role="presentation">
                    <!-- Header -->
                    <tr>
                        <td class="header" style="background:#ffffff; padding:20px; text-align:center;">
                            <center>
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="180" style="max-width:180px; height:auto;">
                            </center>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td class="content" style="padding:24px; background:#ffffff;">
                            <p class="title" style="margin:0 0 8px 0; font-size:18px; font-weight:600; color:#111827;">
                                Nuevo mensaje desde el formulario de contacto
                            </p>

                            <table class="kv-table" cellpadding="0" cellspacing="0" role="presentation"
                                style="width:100%; margin-top:8px;">
                                <!-- Fila: Nombres -->
                                <tr class="kv-row">
                                    <td class="kv-key"
                                        style="width:35%; padding:12px 8px; font-weight:600; color:#374151; font-size:14px;">
                                        Nombre:
                                    </td>
                                    <td class="kv-value"
                                        style="width:65%; padding:12px 8px; color:#111827; font-size:14px;">
                                        {{$data['name']}}
                                    </td>
                                </tr>

                                <!-- Fila: Número de documento -->
                                <tr class="kv-row">
                                    <td class="kv-key"
                                        style="width:35%; padding:12px 8px; font-weight:600; color:#374151; font-size:14px;">
                                        Número de documento:
                                    </td>
                                    <td class="kv-value"
                                        style="width:65%; padding:12px 8px; color:#111827; font-size:14px;">
                                        {{$data['document']}}
                                    </td>
                                </tr>
                                <!-- Fila: Apellidos -->
                                <tr class="kv-row">
                                    <td class="kv-key"
                                        style="width:35%; padding:12px 8px; font-weight:600; color:#374151; font-size:14px;">
                                        Teléfono:
                                    </td>
                                    <td class="kv-value"
                                        style="width:65%; padding:12px 8px; color:#111827; font-size:14px;">
                                        {{$data['phone']}}
                                    </td>
                                </tr>

                                <!-- Fila: Correo electrónico -->
                                <tr class="kv-row">
                                    <td class="kv-key"
                                        style="width:35%; padding:12px 8px; font-weight:600; color:#374151; font-size:14px;">
                                        Correo electrónico:
                                    </td>
                                    <td class="kv-value"
                                        style="width:65%; padding:12px 8px; color:#111827; font-size:14px;">
                                        <a href="mailto:{{$data['email']}}"
                                            style="color:#1d4ed8; text-decoration:none;">{{$data['email']}}</a>
                                    </td>
                                </tr>

                                <!-- Fila: Mensaje (mostramos en caja) -->
                                <tr class="kv-row">
                                    <td class="kv-key"
                                        style="width:35%; padding:12px 8px; font-weight:600; color:#374151; font-size:14px;">
                                        Mensaje:
                                    </td>
                                    <td class="kv-value"
                                        style="width:65%; padding:12px 8px; color:#111827; font-size:14px;">
                                        <div class="message-box"
                                            style="margin-top:6px; padding:12px; background:#f8fafc; border-radius:6px;">
                                            {{$data['message']}}
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- (Opcional) Nota o link -->
                            <p style="margin:16px 0 0 0; color:#6b7280; font-size:13px;">
                                Este correo fue generado automáticamente a partir del formulario de contacto.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="footer" style="padding:16px; text-align:center; font-size:12px; color:#6b7280;">
                            © {{now()->format('Y')}} Droguería Jaen. Todos los derechos reservados.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>