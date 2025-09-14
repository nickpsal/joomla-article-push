# com_articlepush – Joomla 4/5 Administrator Component

**com_articlepush** is a custom Joomla 4/5 administrator component designed to manage remote sites, store their API credentials securely, and allow editing through Joomla's native MVC structure.

## Features

- **CRUD for Remote Sites**
  - Create, Read, Update, Delete remote sites from the Joomla administrator.
- **Secure Password Storage**
  - Passwords are encrypted using Joomla's built-in Crypt library and the site `secret` key.
- **Admin-Friendly Interface**
  - Uses Joomla's native form validation and toolbar helpers.
- **Pagination Support**
  - Displays sites in a paginated table for easy navigation.

## Technical Details

- **Framework:** Joomla 4/5 MVC architecture  
- **Model:** Extends `AdminModel` for automatic CRUD support  
- **Encryption:** Uses `Joomla\CMS\Crypt\Crypt` with `Joomla\CMS\Crypt\Key`  
- **Views:**  
  - **List View:** Displays all remote sites with pagination  
  - **Edit View:** Provides form for creating and editing a site  

## Installation

1. Copy the `com_articlepush` folder into:
2. Log in to Joomla Administrator
3. Navigate to **System → Extensions → Manage → Discover**
4. Select **com_articlepush** and click **Install**

## Usage

1. Go to **Components → com_articlepush → Sites**
2. Add a new remote site using the **New** button
3. Fill in:
- **Site Name**
- **Site URL**
- **Username**
- **Password** (encrypted before saving)
4. Click **Save** or **Save & Close**

## Security Notes

- Passwords are encrypted at rest using Joomla's `secret` key.
- The password field remains masked on edit but can be updated.
- If left empty during edit, the previously stored (encrypted) password is preserved.

## Requirements

- Joomla 4.x or Joomla 5.x
- PHP 8.1+ recommended
- MySQL 5.7+ or MariaDB 10+

## Future Improvements

- Add AJAX-based validation for duplicate site URLs
- Add ACL (Access Control) for user group restrictions
- Add API integration to test credentials before saving

---

**Author:** Brainfood Media  
**License:** GPL-2.0-or-later  
