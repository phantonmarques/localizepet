<!DOCTYPE html>
<html>

    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <style type="text/css">
            @media screen {
                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 700;
                    src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                }
            }

            /* CLIENT-SPECIFIC STYLES */
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            img {
                -ms-interpolation-mode: bicubic;
            }

            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }

            table {
                border-collapse: collapse !important;
            }

            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* MOBILE STYLES */
            @media screen and (max-width:600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }

            /* ANDROID CENTER FIX */
            div[style*="margin: 16px 0;"] {
                margin: 0 !important;
            }
        </style>
    </head>

    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <!-- LOGO -->
            <tr>
                <td bgcolor="#56aaaa" align="center">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
                        <tr>
                            <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#56aaaa" align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
                        <tr>
                            <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Olá {{ $name ?? '' }},</h1>
                                <svg width="125px" height="120px" style="color: #56aaaa;" viewBox="0 -32 576 576" version="1.1" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M353.702 166.933C336.861 149.156 319.311 133.689 301.052 120.533C282.793 107.378 265.687 97.5111 249.732 90.9333C233.778 84.3555 219.153 81.2 205.858 81.4666C192.562 81.7333 182.192 85.8666 174.746 93.8666C172.974 95.6444 171.467 97.6444 170.226 99.8666C168.985 102.089 168.099 103.822 167.567 105.067C167.035 106.311 166.326 108.533 165.44 111.733C164.553 114.933 163.933 116.978 163.578 117.867L64.661 444.267L70.7768 450.667C63.8633 455.467 57.7031 461.067 52.2963 467.467C46.8895 473.867 42.1475 479.111 38.0703 483.2C33.993 487.289 29.1181 490.133 23.4454 491.733C22.2045 492.089 20.6534 493.289 18.792 495.333C16.9307 497.378 16 499.2 16 500.8C16 504 17.5954 506.667 20.7863 508.8C23.9772 510.933 27.5226 512 31.4226 512C36.3862 512 41.1725 510 45.7816 506C50.3906 502 55.044 496.889 59.7417 490.667C64.4394 484.444 67.8519 480.356 69.9791 478.4C74.5882 474.311 79.729 470.4 85.4017 466.667L92.3153 473.333L406.617 366.4C413.531 364.267 418.849 361.067 422.572 356.8C430.017 348.8 433.873 337.733 434.139 323.6C434.405 309.467 431.435 293.911 425.231 276.933C419.026 259.956 409.764 241.822 397.443 222.533C385.123 203.244 370.543 184.711 353.702 166.933ZM324.984 196C352.106 223.733 372.714 250.267 386.807 275.6C400.9 300.933 404.313 317.6 397.045 325.6C389.776 333.6 373.911 330.667 349.447 316.8C324.984 302.933 299.28 282.222 272.334 254.667C245.035 226.933 224.338 200.444 210.245 175.2C196.152 149.956 192.739 133.244 200.008 125.067C207.276 117.067 223.186 120 247.738 133.867C272.29 147.733 298.039 168.444 324.984 196ZM310.093 0L323.388 40.2666L289.086 65.3333H331.366L344.395 105.6L357.424 65.3333H399.438L365.402 40.2666L378.697 0.266632L344.395 25.0667L310.093 0ZM235.639 0L228.46 36.5333L264.889 43.7333L272.068 7.19998L235.639 0ZM475.221 109.867L504.471 79.2L542.496 97.8666L522.819 60.5333L552.334 30.4L510.587 37.6L490.91 0L485.06 42.1333L443.312 49.3333L481.337 67.7333L475.221 109.867ZM465.383 175.467L500.748 198.933L489.58 240L522.553 213.333L557.652 236.8L543.028 196.8L576 170.667L533.721 172.533L518.83 132.8L507.928 173.6L465.383 175.467ZM450.226 76.5333L370.986 141.6L380.824 153.6L460.065 88.5333L450.226 76.5333ZM477.88 202.4L415.924 196.8L414.329 212.267L476.551 217.867L477.88 202.4ZM483.996 277.067L472.562 312.8L507.928 324.267L519.628 288.8L483.996 277.067Z"></path></svg>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">Estamos animados para que você comece a utilizar sua conta. Mas antes é necessário ativá-la, basta pressionar o botão abaixo.</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center" style="border-radius: 15px;" bgcolor="#56aaaa">
                                                        <a href="{{ $url ?? '' }}" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; display: inline-block;">
                                                            Ativar Conta
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr> <!-- COPY -->
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">
                                    Se não funcionar, copie e cole o link a seguir no seu navegador:
                                </p>
                            </td>
                        </tr> <!-- COPY -->
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">
                                    <a href="{{ $url ?? '' }}" target="_blank" style="color: #56aaaa;">
                                        {{ $url ?? '' }}
                                    </a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin:0;color: red;">Os códigos são válidos por 2 horas, passado este prazo, é necessário efetuar o login
                                    novamente para reenviar um novo código ao e-mail cadastrado, caso não seja confirmado o
                                    cadastro em até 3 dias, será necessário fazer o cadastro novamente.</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">
                                    Se você tiver alguma dúvida, basta responder a este e-mail. Ficaremos felizes em ajudar.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">
                                    Atenciosamente,<br>
                                    {{ config('app.name', '') }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
                        <tr>
                            <td bgcolor="#FFECD1" align="center" style="padding: 20px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <h2 style="font-size: 18px; font-weight: 400; color: #111111; margin: 0;">
                                    Está com mais alguma dúvida?
                                </h2>
                                <p style="margin: 0;">
                                    <a href="{{ route('site.contact') }}" target="_blank" style="color: #56aaaa; text-decoration: none;">
                                        Estamos aqui para te ajudar
                                    </a>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
        </table>
    </body>

</html>