## Create the product record

Open **Modern Commerce → Products** and select **New Product**. Enter a required Product Name that clearly identifies the offer to administrators and customers.

## Select the product type

Product Type determines what the customer receives:

- **Course** connects one Moodle course.
- **Bundle** groups courses into one offer.
- **Program** creates a structured multi-course offering.
- **Subscription** provides recurring access.
- **Digital Product** delivers non-course digital content.

Select **Course** for a product that delivers one Moodle course.

## Choose the lifecycle status

Status controls the product lifecycle. **Active** makes the record operational when its other availability rules pass. **Draft** keeps it in review. **Inactive** retains the record without normal availability. **Archived** retires it from normal use.

This tutorial selects **Draft** so the completed product can be reviewed before activation.

## Organize and connect the course

Select the appropriate site-defined Category. In **Select Moodle Course**, type at least two characters to search course names and short names. A normal result is selectable, a **Hidden** badge identifies a hidden Moodle course, and **Course Already Has Product** disables a course that is already linked elsewhere.

Choose an enabled course, then set Display Order. Lower and higher non-negative values provide room to position products relative to each other. Review the Short Description populated from the selected course.

## Configure presentation and purchasing

**Visible** allows the product to appear when status, price and inventory rules also pass. **Featured** marks it for featured storefront treatment. **Purchasable** enables its regular price and checkout use.

Enter the Base Price. Turning **Put on sale** on reveals **Compare At Price**, the higher original amount displayed beside the current price. The comparison must be greater than the Base Price. Confirm the resulting customer-facing calculation in Price Preview.

## Configure inventory

With **Stock Managed** off, inventory is unlimited. Turning it on makes ModernCommerce calculate availability from Stock, Reserved Stock and units sold.

Enter total Stock and any quantity withheld in Reserved Stock. Reserved Stock cannot exceed total Stock. **Allow Back Order** determines whether availability can continue after remaining stock is exhausted.

## Save and verify

Select **Save Product** and wait for the Product Created confirmation. Search for the saved name and verify the row shows the selected type, status, category, visibility, sale price and available quantity. The saved row confirms the form values persisted.
