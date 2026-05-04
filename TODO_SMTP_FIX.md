# SMTP Fix Plan

## Problem

Connection timeout to smtp.gmail.com:587 when sending contact form emails.

## Steps

1. [x] Add try/catch in ContactController to prevent crash on email failure
2. [ ] Provide .env configuration instructions for Gmail SMTP
3. [ ] Clear config cache after .env changes
4. [ ] Test contact form submission

## Gmail SMTP .env Configuration

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Your Name"
```

**Important:** Use an App Password from Google Account settings, not your regular password.
