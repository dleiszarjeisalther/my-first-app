# Execution Plan - Gmail SMTP Configuration & Verification

## Objective
Configure Gmail SMTP settings in `.env` with a valid Google App Password, refresh Laravel configuration cache, and send a test email to `dleiszarjeisaltherlagariza@gmail.com` to verify real transmission without authentication errors.

## Milestones

### Milestone 1: Exploration & SMTP Configuration Setup
- **Goal**: Inspect current `.env` configuration, Laravel mail configuration, and verify existing setup.
- **Tasks**:
  1. Spawn Explorer agent(s) to inspect `.env`, `config/mail.php`, and check existing mail configuration / test capabilities.
  2. Spawn Worker agent to update `.env` with:
     - `MAIL_MAILER=smtp`
     - `MAIL_HOST=smtp.gmail.com`
     - `MAIL_PORT=587`
     - `MAIL_SCHEME=null`
     - `MAIL_USERNAME=dleiszarjeisaltherlagariza@gmail.com`
     - `MAIL_PASSWORD=<Google App Password>` (check if App Password is supplied or needs to be retrieved/verified in .env)
     - `MAIL_ENCRYPTION=tls` / `MAIL_FROM_ADDRESS=dleiszarjeisaltherlagariza@gmail.com`
  3. Run `php artisan config:clear` via Worker.
  4. Verify setup with Reviewer and Auditor.

### Milestone 2: Delivery Verification & Testing
- **Goal**: Transmit test email over SMTP and confirm success without 535 errors.
- **Tasks**:
  1. Spawn Worker/Challenger to trigger password reset or test mail sending via Artisan / Tinker / Pest test.
  2. Verify email delivery log / response from Google SMTP server.
  3. Spawn Forensic Auditor to verify authentic configuration & transmission.
  4. Final Review & Handoff.
