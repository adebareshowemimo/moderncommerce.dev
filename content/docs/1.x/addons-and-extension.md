# Add-ons & extension points

ModernCommerce core owns the shared commerce shell and can surface installed add-ons in its administration. It does not absorb an add-on's business logic merely because the link appears in the ModernCommerce sidebar.

## Ownership contract

An add-on owns its own database tables, services, scheduled tasks, events, configuration and feature rules. ModernCommerce may own:

- the navigation item and its icon/label;
- the consistent admin shell around a compatibility page;
- an integration adapter or redirect;
- capability and installation gating;
- a status card on the Add-ons/Components pages.

Keep core/add-on dependencies one way where possible. Core must continue to install and operate when an optional add-on is absent.

## Detected optional integrations

The audited navigation checks for:

- `local_ccp_pagedesigner` for page designer and block catalogue;
- `local_ccp_enrolmentnotifier` or the supported `local_modernenrolnotifier` alias;
- `local_ccp_coursereminder` and supported compatibility surfaces;
- `mod_coursecertificate` for certificate-related integration.

An item is shown only when its component is installed and the viewer has the declared capability. Some compatibility routes require both the add-on capability and `local/moderncommerce:managenotifications`.

## Add-on administration

Use `/local/moderncommerce/admin/addons.php` and `/admin/components.php` as inventory/status surfaces. Follow the add-on's own installation and version requirements. Do not create its tables or configuration manually from ModernCommerce.

## Extension guidance

- Reuse Moodle contexts, capabilities, external APIs, events, privacy and task APIs.
- Subscribe to documented ModernCommerce events such as order paid/status changed where the contract fits.
- Do not update order, payment, entitlement or subscription tables directly.
- Declare privacy metadata and external transfers for add-on data.
- Gate navigation and adapters with `core_component::get_component_directory()` or the equivalent installed-component check.
- Test install, upgrade and uninstall with the add-on present and absent.

## Documentation boundary

Core documentation describes what the integration entry does and what must be installed. Feature rules, configuration fields and troubleshooting that belong to the add-on must be maintained in that add-on's documentation to avoid two conflicting sources of truth.
