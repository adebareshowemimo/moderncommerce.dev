# Cron & scheduled tasks

ModernCommerce relies on Moodle cron. Run production cron every minute even though many commerce tasks have hourly or daily schedules; the scheduler decides which task is due.

```bash
php admin/cli/cron.php
```

## Core commerce tasks

| Task | Default schedule | Responsibility |
| --- | --- | --- |
| `cleanup_cart` | Daily 02:00 | Clean stale carts |
| `expire_keys` | Every 6 hours at :30 | Expire eligible enrolment keys |
| `cancel_abandoned_orders` | Daily 03:00 | Cancel stale eligible orders |
| `send_payment_reminders` | Daily 09:00 and 15:00 | Evaluate and send payment reminders |
| `generate_sales_report` | Daily 01:05 | Build reporting snapshots |
| `notify_daily_scan` | Daily 07:30 | Invoice/admin notification scan |
| `abandoned_cart_recovery` | Hourly at :15 | Queue staged cart-recovery messages |
| `notify_send_queue` | Every minute | Deliver pending notification rows with retry/backoff |
| `notify_reap_stale` | Every 10 minutes | Return crashed/stale processing rows to pending |
| `notify_process_digests` | Daily 07:00 | Flush accumulated notification digests |

## Subscription tasks

| Task | Default schedule | Responsibility |
| --- | --- | --- |
| `check_expiring` | Daily 08:00 | Send eligible expiry reminders |
| `process_expired` | Daily 00:30 | Move expired subscriptions into grace/suspension logic |
| `sync_access` | Every 6 hours | Reconcile subscription-derived access and Moodle enrolments |
| `cleanup_old` | Day 1 monthly at 03:00 | Apply configured old-subscription retention cleanup |
| `process_pending_changes` | Daily 00:15 | Apply scheduled plan changes |
| `process_trials` | Daily 00:45 | Process trial expiration/conversion rules |
| `process_recurring_payments` | Daily 01:00 | Process due recurring charges and retry behavior |

## Monitoring

Use **Site administration → Server → Tasks → Scheduled tasks** and task logs. A successful cron process can still contain one failed task, so inspect individual task results and next-run time.

For notification backlogs, compare `notify_queue` status/next-attempt with `notify_log`. For access problems, compare the subscription state and access cache before running `sync_access` manually. For report gaps, check the generation task and the report snapshot tables.

## Safe manual execution

Run a single task from Moodle's scheduled-task interface or CLI only after identifying it by exact class. Re-running payment, reminder or fulfilment-related work can cause duplicate external effects if its idempotency key/evidence is not understood. Do not alter database timestamps simply to force a task.
