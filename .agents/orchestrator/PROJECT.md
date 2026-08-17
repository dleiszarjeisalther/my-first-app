# Project: Gmail SMTP Configuration & Verification

## Architecture
- Framework: Laravel v13 / PHP 8.3
- Mail Configuration: `.env` -> `config/mail.php`
- Transport: SMTP (`smtp.gmail.com:587`, TLS encryption)

## Milestones
| # | Name | Scope | Dependencies | Status |
|---|------|-------|-------------|--------|
| 1 | SMTP Config & Cache Clear | Update `.env` with Gmail SMTP credentials, run `config:clear` | None | DONE |
| 2 | Delivery Verification | Send test email via Artisan/Tinker, verify no 535 errors | M1 | DONE |

## Interface Contracts
- `.env` variables:
  - `MAIL_MAILER=smtp`
  - `MAIL_HOST=smtp.gmail.com`
  - `MAIL_PORT=587`
  - `MAIL_USERNAME=dleiszarjeisaltherlagariza@gmail.com`
  - `MAIL_PASSWORD` (16-character Google App Password)
  - `MAIL_SCHEME=null`
  - `MAIL_ENCRYPTION=tls`

## Code Layout
- Root directory: `c:\Users\universal\Herd\my-first-app`
- Environment file: `.env`
- Config file: `config/mail.php`
