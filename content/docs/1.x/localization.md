# Language & localization

The audited build has one source language pack, `lang/en/local_moderncommerce.php`, with **4,010 string keys**. Moodle language packs and overrides supply translations; PHP and React/TypeScript interfaces should not embed English UI fallbacks.

## Terminology authority

Use Moodle's language-string API in PHP/templates and the Moodle string-loading layer in JavaScript. The English file is the source for labels, descriptions, validation, capabilities, task names, page titles, email terminology and accessibility text.

Changing a key's English value changes every surface that references it. Renaming/removing the key can break compiled front-end requests or PHP rendering, so search the entire plugin before changing it.

## Administrator overrides

Use Moodle's language customization interface for site-specific wording rather than editing the shipped English file. Purge language caches after an override. Keep identifiers such as gateway brands, currency codes and technical route names intact where translation would make support harder.

## Adding a translation

Create the standard Moodle language-pack component file for `local_moderncommerce` in the target language. Translate values, not keys. Preserve placeholders exactly, including named values and braces in email tokens.

Test:

- storefront and course/bundle details;
- cart/checkout and validation;
- learner account;
- every admin group used by the role;
- emails and their placeholders;
- date, amount and currency formatting;
- screen-reader labels and long text at mobile width.

## Email placeholders are not language keys

Tokens such as `{firstname}`, `{order_number}`, `{plan_name}` and `{unsubscribe_url}` are runtime placeholders. Translate the prose around them but do not translate the token. Unknown tokens remain visible in output, which is useful for detecting a template/data mismatch.

## String audit

Run:

```bash
composer run mc:string-audit
```

The source audit checks duplicate keys, alphabetical order and front-end regressions such as literal English JSX labels, English `t(key, fallback)` usage, and browser-default locale formatting. It currently scans the English pack and the TypeScript/TSX source. A passing audit does not replace human review of meaning, overflow, pluralization or right-to-left layout.
