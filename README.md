# Bug Report: Table Repeater id Field Behavior in V4

### When adding an id field to a repeater and saving the form, it doesn't preserve the original id values. Instead of updating existing records, it updates them with new ids, essentially overwriting the existing entries with different primary keys. This does not happen in V3.

# Installation
```bash
git clone git@github.com:CodeWithDennis/filament-v4-repeater-increment-issue.git
cd filament-v4-repeater-increment-issue
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```


## What I Observed
**When including an id field in the table repeater (whether it's a disabled text field or a regular TextEntry):**

- Existing entries get new id values on save, instead of keeping their original ones.
- The id value is not displayed correctly in the TextEntry field. (Possibly a separate issue?)
- Removing disabled from the id field seems to fix the issue, but this is not a viable solution as it should be a read-only field.

## How to Reproduce

- Login to the admin panel. (Login credentials are prefilled in the form.)
- Go to items
- Click on a random item
- Edit the item
- Save the item and see the id field increments instead of preserving the original id values.
