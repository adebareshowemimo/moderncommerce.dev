# ModernCommerce.dev Design System

## Direction

The site is a corporate product expression of Agunfon. It follows the official brand guide: intelligent, modern, trustworthy, premium, structured, and human-centered. Deep Blue is dominant; the approved giraffe-network pattern is the signature visual device. Product UI remains the main evidence.

## Color

- Deep Blue: `#022B69`
- Deep Blue hover: `#001F4D`
- Alice Blue: `#EEF6FF`
- Eerie Black: `#181818`
- White: `#FFFFFF`
- Muted text: `#586575`
- Border: `#D7E3F0`
- Surface: `#FFFFFF`

Deep Blue is the dominant brand and action color. Alice Blue supplies calm secondary surfaces. Eerie Black carries text and high-contrast structure. Product status colors may appear inside authentic UI screenshots but must not become marketing brand colors.

## Typography

Use Manrope for display and headings and Inter for body, UI, and buttons, following the brand guide. Display headings use 700–800 weight, restrained `-0.005em` tracking, and balanced wrapping. Body copy is capped near 68 characters.

## Geometry

Use an 8px base radius and 12px for major product canvases. Prefer fine borders and restrained shadows. Use Bootstrap's 12-column desktop grid with 24px gutters, 8-column tablet layouts, and 4-column mobile layouts. Preserve 5–8% page margins and generous whitespace.

## Benchmark alignment

Use Nextcloud's platform page as the primary structural reference: consolidation narrative, control, enterprise deployment confidence, transparent open source, and professional support. Borrow Red Hat's disciplined hierarchy and operational proof, plus Grafana's visible demo and community pathways. Do not reproduce their visual identity.

## Bootstrap implementation

Target Bootstrap 5.3.8. Structure pages mobile-first with semantic sections, `.container`, `.row`, and responsive columns. Bootstrap owns layout and spacing; custom CSS owns tokens, signature backgrounds, the product canvas, and typography. Override buttons and link variables explicitly so the site never falls back to Bootstrap blue.

## Imagery

Lead with real product UI or faithful product composites. A single decisive dashboard/storefront composition is stronger than a collage. Agunfon photography can support solution and customer-story pages but should not displace homepage software proof.

## Official product logo

The bee-and-honeycomb symbol is the official ModernCommerce product mark. Use `public/images/brand/moderncommerce-logo-dark.png` on white or light surfaces and `public/images/brand/moderncommerce-logo-white.png` on dark surfaces. Preserve the supplied proportions and artwork: do not redraw the mark with CSS, recolor it, distort it, rotate it, or crop individual elements from it. Leave clear space around the symbol at least equal to the height of one honeycomb cell.

ModernCommerce is the product identity. The Agunfon Interactivity logo identifies the project maintainer and service provider, so it may appear in a secondary “Maintained by” position but must not replace the product mark.

## Motion

Use a short orchestrated hero reveal and restrained hover movement. Stop motion under `prefers-reduced-motion: reduce`. Avoid scroll-jacking and decorative loops.

## Core components

- Responsive navbar with Demo and GitHub actions
- Hero with category statement, CTA pair, trust metadata, and product canvas
- Connected journey: Discover → Buy → Enrol → Learn → Renew
- Outcome-led feature sections rather than repeated icon cards
- Dark open-source proof band
- Payment-provider row
- Demo-focused final CTA

## Voice in UI

Use short declarative headings and operationally specific support copy. Prefer “open-source commerce for Moodle,” “no second storefront,” and “from checkout to enrolment.” Do not state “#1,” “leading,” “most trusted,” or performance outcomes until independently supportable.
