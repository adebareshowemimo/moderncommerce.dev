# Contacts & newsletter

ModernCommerce includes a public contact flow, an administrative inbox and a newsletter subscriber registry. These are distinct from Moodle messaging and from a full marketing-automation platform.

## Contact submissions

Public submissions use `local_moderncommerce_submit_contact`. Messages are stored in `local_moderncommerce_contacts`; staff replies are stored in `local_moderncommerce_contact_replies`.

Use `/admin/contacts.php` with `viewcontacts`. Replying and changing status require `managecontacts`. Configure recipients and auto-reply content from the Contact Autoreply tab in `/admin/settings.php`.

Available contact placeholders include `{fullname}`, `{email}`, `{subject}`, `{phone}`, `{message}`, `{submitted_at}` and `{sitename}`. Template content and custom subject/body are separate choices; preview and send a real test before launch.

## Newsletter

The public subscribe function writes newsletter subscriber records. `/admin/newsletter_subscribers.php` requires `viewnewsletter`; deleting/exporting requires the relevant newsletter management permission.

The subscriber table is a registry, not evidence that every historic contact accepted every marketing purpose. Define consent text, source and retention before importing or using records in another system.

## Spam protection

Public contact and newsletter forms use Moodle core reCAPTCHA when both global public and private keys are configured. Without both keys, the challenge is intentionally omitted for development/private staging. In production, configure the keys and confirm the browser submits `g-recaptcha-response` and server verification succeeds.

## Privacy and operations

- Limit inbox access to support staff.
- Do not include payment secrets or card data in contact replies.
- Treat exports as personal-data transfers.
- Use the notification/email system for templated delivery, but respect marketing suppression and unsubscribe behavior.
- Establish statuses and response ownership so a stored message is not mistaken for a resolved case.
