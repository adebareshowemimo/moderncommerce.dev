# Email templates & placeholders

Use this reference when creating reusable email content, mapping templates to commerce events, checking available tokens, or diagnosing a message that rendered with missing data.

## Administration surfaces

| Area | Route | Required access |
| --- | --- | --- |
| Shared templates and outgoing events | `/local/moderncommerce/admin/email_templates.php` | `viewemailtemplates`; writes require `manageemailtemplates` |
| Notification delivery and queue | `/local/moderncommerce/admin/notifications.php` | Notification-management capabilities |
| Contact autoreply and staff notice | `/local/moderncommerce/admin/contact_emails.php` | `moodle/site:config` |
| Subscription lifecycle emails | `/local/moderncommerce/admin/subscription_emails.php` | `managesubscriptionplans` |

Template editors accept trusted HTML and links that are sent to buyers. Limit write access to trusted administrators.

## Template fields and event mappings

Each reusable template has a display name, stable key, owning component, category, status, subject, body, and placeholder metadata. Leave the key empty when creating a custom template if it should be generated automatically. Existing keys are stable identifiers and are not editable.

Bundled templates are protected. Clone a bundled template before customizing it. An **active** template can be selected for delivery; an inactive template remains stored but should not be selected.

Outgoing email controls map commerce events—such as order confirmation, payment receipt, enrolment, key delivery, invoice, and refund—to reusable templates. Each event can be enabled or disabled, assigned a template, and given an optional subject/body override. Event editors show the safest placeholder list for that specific event.

## Categories and suppression

| Category | Typical use | Marketing suppression |
| --- | --- | --- |
| `transactional` | Orders, receipts, invoices, enrolment, and required buyer notices | No |
| `reminder` | Renewal, expiry, access, and payment reminders | No |
| `dunning` | Failed-payment and recovery flows | No |
| `celebratory` | Completion, certificate, and achievement messages | No |
| `marketing` | Promotions, abandoned carts, price drops, and win-back campaigns | Yes |
| `operational` | Store-operator alerts | Not buyer marketing |

Only marketing messages are marketing-suppressible. Marketing templates should include `{unsubscribe_url}` where applicable. Do not disable required transactional messages merely because a recipient opted out of marketing.

## Placeholder behavior

Use single-brace tokens:

```text
Hi {firstname}, your order {order_number} is confirmed.
```

Legacy double-brace tokens are normalized. Tokens can appear in the subject or body, values are HTML-escaped, global values are merged with event-specific data, and unknown tokens remain visible so missing data can be detected in previews and tests.

Do not assume every token exists for every event. The event editor's chips are the event-specific authority.

## Shared placeholder palette

| Category | Tokens |
| --- | --- |
| User | `{firstname}`, `{lastname}`, `{fullname}`, `{email}`, `{phone}`, `{city}`, `{country}` |
| Course | `{course_name}`, `{course_code}`, `{course_summary}`, `{course_link}`, `{course_startdate}`, `{course_enddate}`, `{instructor_name}`, `{instructor_email}` |
| Order | `{order_number}`, `{order_date}`, `{order_status}`, `{order_total}`, `{subtotal}`, `{discount}`, `{tax}`, `{currency}`, `{payment_method}` |
| Order links/items | `{courses_list}`, `{my_courses_url}`, `{order_view_link}`, `{retry_payment_url}`, `{cart_items}`, `{cart_items_count}`, `{cart_total}`, `{cart_url}`, `{checkout_url}` |
| Coupon | `{coupon_code}`, `{coupon_expiry}`, `{coupon_reject_reason}`, `{coupon_min_spend}`, `{discount_percent}` |
| Refund | `{refund_amount}`, `{refund_reference}`, `{refund_reason}` |
| Access | `{access_enddate}`, `{renew_url}`, `{catalog_url}`, `{certificate_name}`, `{certificate_url}`, `{certificate_expiry}` |
| Subscription | `{plan_name}`, `{old_plan_name}`, `{new_plan_name}`, `{plan_price}`, `{billing_cycle}`, `{trial_days}`, `{trial_end_date}`, `{subscription_startdate}`, `{subscription_enddate}`, `{next_billing_date}`, `{effective_date}`, `{days_remaining}`, `{days_extended}`, `{my_subscription_url}`, `{renewal_url}`, `{reactivate_url}`, `{update_payment_url}` |
| Invoice | `{invoice_number}`, `{invoice_total}`, `{invoice_duedate}`, `{invoice_url}`, `{invoice_pdf_url}`, `{pay_invoice_url}`, `{organisation_name}` |
| Keys | `{key_code}`, `{key_count}`, `{key_target_name}`, `{key_expiry}`, `{keys_csv_url}`, `{redeem_url}`, `{seats_total}`, `{seats_used}`, `{seats_remaining}`, `{manager_dashboard_url}` |
| Marketing | `{product_name}`, `{product_url}`, `{old_price}`, `{new_price}`, `{promo_end_date}`, `{unsubscribe_url}` |
| Operations | `{customer_name}`, `{admin_order_url}`, `{admin_dashboard_url}`, `{ops_report_url}`, `{gateway_name}`, `{error_detail}`, `{failed_count}`, `{period_label}`, `{revenue_total}`, `{orders_count}`, `{refunds_count}`, `{new_subs_count}`, `{churn_count}`, `{churned_plan}`, `{mrr_total}`, `{upcoming_renewals_count}`, `{upcoming_renewals_value}` |
| Global | `{sitename}`, `{siteurl}`, `{supportemail}`, `{logo}`, `{logo_compact}` |

The logo tokens use Moodle's configured site logos. Theme-specific dark or white variants are not public template tokens; handle visual treatment in the email shell.

## Event-specific additions

| Event | Common additional tokens |
| --- | --- |
| Order confirmation | `{course_count}`, `{my_courses_link}`, `{business_name}`, `{support_email}`, `{support_url}` |
| Payment receipt | `{transaction_id}`, `{payment_date}`, `{amount_paid}`, `{payment_fee}`, `{net_amount}`, `{transaction_reference}`, `{invoice_link}` |
| Enrolment confirmation | `{enrollment_date}`, `{enrollment_role}`, `{go_to_course_button}`, `{course_url}` |
| Key redemption | `{enrollment_key}`, `{key_type}`, `{redemption_date}`, `{redeem_url}` |
| Refund confirmation | `{refund_date}`, `{refund_method}`, `{original_amount}`, `{processing_time}`, `{unenrollment_notice}`, `{contact_support_link}` |

## Contact and subscription templates

Contact autoreplies can use `{fullname}`, `{email}`, `{subject}`, `{phone}`, `{message}`, `{submitted_at}`, and the global tokens. Staff-recipient addresses are configured separately and fall back to Moodle's support address when no override is supplied.

Subscription lifecycle defaults include activation, renewal digest, expiring reminder, grace period, expired, cancelled, and payment-failed templates. Subscription editors expose user, plan, billing-cycle, date, price, currency, course-list, renewal, and subscription URL tokens.

## Queue evidence and testing

Delivery state is separated across queue, immutable attempt log, digest, external identity, and suppression records. When a message is missing, inspect the event/template status, queue row, next-attempt time, log, suppression category, and Moodle cron before editing content.

Send configured test messages after changing templates, branding, SMTP, or support settings:

```bash
php local/moderncommerce/cli/test_emails.php
php local/moderncommerce/cli/test_emails.php --userid=ID
```

Before production, verify the email shell, global placeholders, event-specific tokens, links, mobile rendering, transactional delivery, marketing suppression, and unsubscribe behavior.

## Developer extension contract

When adding an email event, seed the template definition, register shared tokens in `classes/email/placeholder_engine.php` when appropriate, pass event-specific data before rendering, expose only supported tokens in the editor, assign the correct category, and test both preview and queued delivery.

See [Notifications](/{{route}}/{{version}}/modern-commerce/notifications), [Admin settings](/{{route}}/{{version}}/modern-commerce/admin-settings), and [Cron & scheduled tasks](/{{route}}/{{version}}/modern-commerce/scheduled-tasks).
