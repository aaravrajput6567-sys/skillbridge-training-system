<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f3f0ff; font-family: 'Segoe UI', Arial, sans-serif; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(109,40,217,0.10); }
        .header { background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%); padding: 36px 40px; text-align: center; }
        .header h1 { margin: 0; color: #ffffff; font-size: 22px; font-weight: 700; letter-spacing: 0.5px; }
        .header p { margin: 6px 0 0; color: rgba(255,255,255,0.8); font-size: 14px; }
        .body { padding: 36px 40px; }
        .field { margin-bottom: 20px; }
        .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #7c3aed; margin-bottom: 4px; }
        .value { font-size: 15px; color: #1e1b4b; line-height: 1.6; }
        .message-box { background: #f5f3ff; border-left: 4px solid #7c3aed; border-radius: 8px; padding: 16px 20px; margin-top: 6px; }
        .divider { border: none; border-top: 1px solid #ede9fe; margin: 24px 0; }
        .footer { background: #f5f3ff; padding: 20px 40px; text-align: center; }
        .footer p { margin: 0; font-size: 12px; color: #9ca3af; }
        .reply-note { background: #ede9fe; border-radius: 8px; padding: 12px 16px; margin-top: 24px; font-size: 13px; color: #6d28d9; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>📬 New Contact Message</h1>
            <p>Received via SkillBridge Contact Form</p>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">From</div>
                <div class="value">{{ $senderName }}</div>
            </div>
            <div class="field">
                <div class="label">Email</div>
                <div class="value"><a href="mailto:{{ $senderEmail }}" style="color:#7c3aed;text-decoration:none;">{{ $senderEmail }}</a></div>
            </div>
            <hr class="divider">
            <div class="field">
                <div class="label">Message</div>
                <div class="message-box value">{{ $userMessage }}</div>
            </div>
            <div class="reply-note">
                💡 You can reply directly to this email to respond to {{ $senderName }}.
            </div>
        </div>
        <div class="footer">
            <p>This message was sent from the SkillBridge contact form &bull; {{ now()->format('d M Y, h:i A') }}</p>
        </div>
    </div>
</body>
</html>
