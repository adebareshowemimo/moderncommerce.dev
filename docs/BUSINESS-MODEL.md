# ModernCommerce business model and operating flow

Status: agreed direction
Decision owner: Adebare Showemimo
Maintainer: Agunfon Interactivity LLC, USA
Last updated: August 1, 2026

## Purpose of this record

This file is the durable source of truth for the agreed ModernCommerce brand architecture, customer journeys, open-source business model, support routing, and domain strategy. It records decisions that should stay consistent across the website, GitHub repository, documentation, release materials, and Agunfon corporate communications.

When this file conflicts with older planning copy, this decision record takes precedence unless a later dated decision explicitly replaces it. Executable product facts still come from the plugin source, particularly `version.php`, `composer.json`, `LICENSE`, and the files under `db/`.

## 1. Ownership and stewardship

- **Creator and copyright owner:** Adebare Showemimo.
- **Project maintainer:** Agunfon Interactivity LLC, USA.
- **Software:** ModernCommerce, component `local_moderncommerce`.
- **Licence:** GNU General Public License v3 or later.
- **Platform relationship:** ModernCommerce is an independent Moodle plugin. It is not affiliated with, endorsed, sponsored, or certified by Moodle Pty Ltd or Moodle HQ.
- **Trademark use:** References to Moodle describe software compatibility. Moodle is not used in the product name, company name, or domain name, and the Moodle logo is not used as ModernCommerce branding.

Canonical copyright notice:

> Copyright © 2025–2026 Adebare Showemimo. Maintained by Agunfon Interactivity LLC, USA.

Do not add “and contributors” until contributors other than the creator have made accepted copyrightable contributions. Future contributors retain the rights provided by law and the project licence unless a separate written agreement says otherwise.

## 2. Brand architecture

ModernCommerce uses one product brand and one primary product website.

| Brand or domain | Role | Decision |
| --- | --- | --- |
| `moderncommerce.dev` | Product website, documentation, releases, support entry, implementation, and managed services | Primary destination for every ModernCommerce audience |
| `agunfoninteractivity.com` | Corporate website for Agunfon Interactivity LLC, USA | Corporate identity, portfolio, and company information; link to ModernCommerce for product activity |
| `coursecommercepro.com` | Previous separate commercial-services identity | Retire as a separate content destination and permanently redirect to `moderncommerce.dev/support` or the final services route |

### Naming rules

- Use **ModernCommerce** for the product and project.
- Use **Agunfon Interactivity LLC, USA** for the maintainer in public descriptive copy.
- Use the company's exact registered legal name, without a location suffix, where a legal form specifically requires the legal entity name.
- Do not reintroduce Course Commerce Pro as a parallel product, support brand, or destination.
- Do not describe Agunfon as the creator; Adebare Showemimo is the creator and copyright owner.

## 3. Product position

Primary category:

> The open-source commerce platform for Moodle.

Primary promise:

> Sell courses, bundles, programs, subscriptions, and organizational access inside Moodle without operating a separate commerce platform.

Approved website headline:

> Every feature required to sell, fulfil, and operate a modern ecommerce business for training, eLearning courses, and digital products.

Use the headline in the `moderncommerce.dev` homepage hero and global footer. Product-detail and documentation copy should substantiate the broader statement with the implemented catalogue, checkout, payment, fulfilment, subscription, reporting, governance, and Moodle-integration capabilities.

Remembered idea:

> Sell learning where learning happens.

Position leadership through verified product completeness, Moodle-native operation, ownership, and transparent comparisons. Do not publish unsupported claims about market rank, adoption, revenue processed, conversion improvement, uptime, or security superiority.

## 4. Open-source business model

### Free software core

ModernCommerce core is GPL-3.0-or-later software.

- No ModernCommerce software licence fee.
- No per-learner charge.
- No per-order charge.
- No ModernCommerce platform revenue share.
- Users may inspect, run, modify, and redistribute the software under the GPL.
- Users operate their own Moodle environment and connect merchant accounts they control.

“Free software” does not mean a production store has no cost. Customers remain responsible for hosting, administration, payment-processor fees, implementation, monitoring, backups, upgrades, security operations, and any professional services they choose.

### Commercial sustainability

Agunfon Interactivity LLC, USA sustains development through optional services rather than restricting the GPL core.

Approved commercial offers:

1. **Implementation**: installation, configuration, storefront setup, gateway setup, migration, testing, and launch assistance.
2. **Customization and integration**: organization-specific workflows, add-ons, gateway work, reporting, and systems integration.
3. **Priority support**: defined response expectations, upgrade guidance, production troubleshooting, and release compatibility assistance.
4. **Managed operations**: hosting coordination, monitoring, backups, updates, and operational support when the service scope is ready.
5. **Training and onboarding**: administrator, finance, support, and development-team enablement.
6. **Sponsorship or funded development**: community-visible feature work with scope and licensing agreed before development.

Do not invent fixed tiers, SLA promises, or public prices before delivery scope and operating capacity are approved. Service pricing may be project-based or subscription-based; the software itself remains GPL licensed.

## 5. Audience and conversion flows

### Store operator flow

`Home or comparison → Product evidence → Live demo → Documentation or installation → First product → Sandbox purchase → Production readiness → Launch`

Success is a verified transaction in which payment, order state, entitlement, Moodle enrolment, invoice, and learner access agree.

### Developer flow

`Home or GitHub → Developers → Architecture → Local installation → Services and events → Tested extension → Issue or pull request`

Developers should be directed to documented Moodle-native contracts. The declared external functions primarily support shipped AJAX applications and must not be marketed as an unauthenticated general-purpose REST API.

### Commercial-service flow

`Home, Product, Docs, or Support → Identify implementation/support need → moderncommerce.dev/support → Qualified enquiry → Discovery and scope → Proposal → Delivery → Handover or ongoing support`

Every paid-service route stays under the ModernCommerce product website. Agunfon is identified as the provider without sending visitors to a second product brand.

### Community flow

`Documentation → Reproduce issue → Public issue for ordinary defects or private email for security concerns → Triage → Fix or documented resolution`

Community support is best effort. Paid response times must be offered only under an agreed support engagement.

## 6. Support routing

Canonical public support information:

```markdown
- Project website and documentation: [moderncommerce.dev](https://moderncommerce.dev/)
- Implementation, managed services, and commercial support: [moderncommerce.dev/support](https://moderncommerce.dev/support)
- Voluntary open-source project support: [moderncommerce.dev/support-development](https://moderncommerce.dev/support-development) via [ko-fi.com/moderncommerce](https://ko-fi.com/moderncommerce)
- Maintainer website: [agunfoninteractivity.com](https://agunfoninteractivity.com/)
- Contact Agunfon Interactivity: [agunfoninteractivity.com/contact](https://agunfoninteractivity.com/contact)
- General support: support@agunfoninteractivity.com
- Security reports: support@agunfoninteractivity.com with the subject `ModernCommerce security report`
```

Route requests as follows:

| Request | Destination |
| --- | --- |
| Product evaluation | Product, comparison, demo, and FAQ pages on `moderncommerce.dev` |
| Installation or configuration question | Versioned documentation |
| Reproducible software defect | Public GitHub issue when the issue tracker is available |
| Security vulnerability or sensitive data exposure | Private email to `support@agunfoninteractivity.com` with the required subject |
| Implementation, migration, customization, or managed service | `moderncommerce.dev/support` |
| Company or partnership enquiry | [Agunfon's contact form](https://agunfoninteractivity.com/contact), with product delivery routed back through ModernCommerce |

Security reports must never be directed to a public issue tracker.

### Support versus project funding

- `moderncommerce.dev/support` is the route for documentation, issue reporting, security disclosure, implementation, managed services, and commercial support.
- `moderncommerce.dev/support-development` is the route for voluntary financial support of the open-source project.
- Use **Support ModernCommerce** or **Support development**, not **Donate**, because support is not represented as a tax-deductible charitable contribution.
- Voluntary project support does not purchase technical support, professional services, roadmap priority, governance rights, or a guaranteed response time.
- Ko-fi is the first approved funding channel at `https://ko-fi.com/moderncommerce`. Its website action is configured through `KOFI_URL`.

## 7. Website responsibilities

`moderncommerce.dev` should ultimately contain:

- Home and product positioning
- Product and workflow evidence
- Comparison and cost analysis
- Open-source ownership and licence explanation
- Developer architecture and extension guidance
- Versioned documentation
- Release and compatibility information
- Roadmap and changelog
- Support and security-reporting instructions
- Implementation and managed-service descriptions
- A working demo route

The site should not send a qualified ModernCommerce visitor to Course Commerce Pro for services. Agunfon corporate pages may link to ModernCommerce, but ModernCommerce product journeys should remain on the product domain.

## 8. Domain retirement flow

Before retiring `coursecommercepro.com`:

1. Inventory public URLs, backlinks, forms, analytics, and search-indexed pages.
2. Map every useful URL to the closest ModernCommerce page instead of redirecting everything blindly to the homepage.
3. Publish equivalent support or service content on `moderncommerce.dev`.
4. Apply permanent HTTP 301 redirects.
5. Update GitHub, documentation, email templates, social profiles, structured data, and campaign links.
6. Keep the old domain registered and its TLS certificate active while redirects are relied upon.
7. Monitor redirect errors, traffic, search coverage, and contact conversions.

Preferred default redirect:

`https://coursecommercepro.com/* → https://moderncommerce.dev/support`

Use page-specific redirects where an equivalent product, documentation, or policy page exists.

## 9. Commercial boundaries

- Payment-provider processing fees still apply and go to the payment provider.
- Hosting and infrastructure are not implied to be free.
- Community documentation does not create a guaranteed response time.
- Priority support and managed operations require an explicit scope, price, and service agreement.
- GPL rights must not be described as a limited-time entitlement or per-site commercial licence.
- Optional paid work must not be represented as Moodle-endorsed services.
- Core/add-on boundaries must be published before any proprietary or separately packaged add-on strategy is introduced.

## 10. Decision log

| Date | Decision | Status |
| --- | --- | --- |
| July 31, 2026 | Position ModernCommerce as open-source commerce infrastructure for selling learning through Moodle | Active |
| July 31, 2026 | Use GPL-3.0-or-later core with no ModernCommerce revenue share | Active |
| August 1, 2026 | Record Adebare Showemimo as sole creator and copyright owner | Active |
| August 1, 2026 | Record Agunfon Interactivity LLC, USA as project maintainer | Active |
| August 1, 2026 | Use `moderncommerce.dev` as the single product, documentation, support, and services destination | Active |
| August 1, 2026 | Adopt the approved ecommerce headline for the ModernCommerce website hero and global footer | Active |
| August 1, 2026 | Separate commercial support at `/support` from voluntary open-source funding at `/support-development`; use Ko-fi as the first funding channel | Active |
| August 1, 2026 | Retire Course Commerce Pro as a separate brand and redirect its domain to ModernCommerce support/services | Approved; implementation pending |

## 11. Items still requiring an explicit future decision

- Final public name and scope of each paid service
- Service prices and whether any package is project-based or recurring
- Priority-support response targets and service hours
- Managed-service infrastructure and operational responsibility
- Public funding reporting and sponsor-recognition policy
- Core/add-on policy
- Public governance and contribution policy
- Final Course Commerce Pro URL redirect map
- Whether to introduce a dedicated private security email address

Until those decisions are recorded, copy must describe the service honestly without inventing price, availability, or response guarantees.
