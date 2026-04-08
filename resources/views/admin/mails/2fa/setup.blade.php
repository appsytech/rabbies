<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>2FA QR Setup</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .section {
            padding: 20px;
        }

        h2 {
            font-size: 16px;
            color: #111827;
            margin-bottom: 10px;
        }

        .step {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }

        .step-number {
            display: table-cell;
            width: 30px;
            font-size: 12px;
            font-weight: bold;
            color: #ffffff;
            background-color: #2563eb;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
        }

        .step-text {
            display: table-cell;
            padding-left: 10px;
            vertical-align: top;
        }

        .step-text p {
            margin: 2px 0;
        }

        .step-text p.title {
            font-weight: bold;
            font-size: 14px;
            color: #1f2937;
        }

        .step-text p.description {
            font-size: 12px;
            color: #6b7280;
        }

        .qr-section {
            text-align: center;
            border-top: 1px solid #e5e7eb;
            padding: 20px;
        }

        .qr-image {
            width: 200px;
            height: 200px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .secret-title {
            font-size: 12px;
            color: #9ca3af;
            margin: 10px 0;
        }

        .secret-key {
            display: inline-block;
            background-color: #f9fafb;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 10px 15px;
            font-family: monospace;
            font-size: 14px;
            color: #111827;
            letter-spacing: 2px;
            user-select: all;
            /* makes it easy to select on any device */
        }

        /* Gmail-friendly fallback for selecting */
        .select-instruction {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="section">
            <h2>How to set up</h2>

            <div class="step">
                <div class="step-number">1</div>
                <div class="step-text">
                    <p class="title">Install the app</p>
                    <p class="description">Download <strong>Google Authenticator</strong> on your phone.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <div class="step-text">
                    <p class="title">Scan QR code</p>
                    <p class="description">Open the app, tap <strong>"Add account"</strong>, then scan the QR code below.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <div class="step-text">
                    <p class="title">Enter the code</p>
                    <p class="description">Enter the 6-digit code shown in your authenticator app to confirm setup.</p>
                </div>
            </div>
        </div>

        <div class="qr-section">
            <img class="qr-image" src="{{ $data['qrUrl'] }}" alt="QR Code">
            <p class="secret-title">OR USE SECRET KEY</p>
            <div class="secret-key">{{ $data['secret'] ?? '' }}</div>
            <div class="select-instruction">Tap or click the code to select it and copy manually.</div>
        </div>
    </div>
</body>

</html>