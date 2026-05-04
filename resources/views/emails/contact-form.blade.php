<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #4f46e5; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background: #f9fafb; padding: 20px; border: 1px solid #e5e7eb; border-top: none; border-radius: 0 0 8px 8px; }
        .field { margin-bottom: 16px; }
        .field-label { font-weight: bold; color: #4f46e5; margin-bottom: 4px; }
        .field-value { background: white; padding: 10px; border-radius: 6px; border: 1px solid #e5e7eb; }
        .message-box { background: white; padding: 15px; border-radius: 6px; border: 1px solid #e5e7eb; white-space: pre-wrap; }
        .footer { margin-top: 20px; font-size: 12px; color: #6b7280; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin: 0;">New Contact Message</h2>
        <p style="margin: 5px 0 0 0; opacity: 0.9;">From your portfolio contact form</p>
    </div>
    <div class="content">
        <div class="field">
            <div class="field-label">Name</div>
            <div class="field-value">{{ $data['name'] }}</div>
        </div>
        <div class="field">
            <div class="field-label">Email</div>
            <div class="field-value">{{ $data['email'] }}</div>
        </div>
        <div class="field">
            <div class="field-label">Subject</div>
            <div class="field-value">{{ $data['subject'] }}</div>
        </div>
        <div class="field">
            <div class="field-label">Message</div>
            <div class="message-box">{{ $data['message'] }}</div>
        </div>
    </div>
    <div class="footer">
        <p>Sent from your portfolio contact form on {{ now()->format('F j, Y \a\t g:i A') }}</p>
    </div>
</body>
</html>

