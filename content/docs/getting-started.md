# Getting started

Modern Commerce is the open-source commerce platform for Moodle. It connects your catalog, checkout, payment gateways, enrolment, subscriptions, and learner account experience inside Moodle.

## Requirements

- Moodle 5.2
- PHP 8.3 or later
- Composer dependencies installed
- Moodle cron configured
- HTTPS for production payments and webhooks

## Install the plugin

Copy `local_moderncommerce` into your Moodle site's `local/moderncommerce` directory, then run the following commands from the Moodle root:

```bash
composer install --working-dir=local/moderncommerce --no-dev --optimize-autoloader
php admin/cli/upgrade.php --non-interactive
php admin/cli/purge_caches.php
```

Open **Site administration → Plugins → Local plugins → Modern Commerce** to configure your store.

## Your first working store

1. Connect a sandbox payment gateway.
2. Add a price to a Moodle course.
3. Publish the course in the storefront.
4. Complete a test checkout.
5. Confirm the order, enrolment, invoice, and learner access.

Use sandbox or test credentials until the complete buyer-to-learner journey is verified.
