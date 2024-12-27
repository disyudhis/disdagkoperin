<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak dari Website</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f6f6f6; font-family: Arial, sans-serif;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
        style="background-color: #f6f6f6; padding: 20px;">
        <tr>
            <td>
                <table role="presentation" cellpadding="0" cellspacing="0" width="600"
                    style="margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td
                            style="padding: 20px; text-align: center; background-color: #007bff; border-radius: 8px 8px 0 0;">
                            <h1 style="color: #ffffff; margin: 0;">Pesan Kontak Baru</h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding-bottom: 15px;">
                                        <strong style="color: #333333;">Nama Pengirim:</strong>
                                        <p style="margin: 5px 0; color: #666666;">{{ $nama }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 15px;">
                                        <strong style="color: #333333;">Email:</strong>
                                        <p style="margin: 5px 0; color: #666666;">{{ $email }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 15px;">
                                        <strong style="color: #333333;">No. Kontak:</strong>
                                        <p style="margin: 5px 0; color: #666666;">{{ $phone }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 15px;">
                                        <strong style="color: #333333;">NIB:</strong>
                                        <p style="margin: 5px 0; color: #666666;">{{ $nib }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 15px;">
                                        <strong style="color: #333333;">Pesan:</strong>
                                        <p style="margin: 5px 0; color: #666666; line-height: 1.5;">{{ $pesan }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="padding: 20px; text-align: center; background-color: #f8f9fa; border-radius: 0 0 8px 8px;">
                            <p style="margin: 0; color: #666666; font-size: 14px;">Email ini dikirim secara otomatis
                                dari website DINKOP</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
