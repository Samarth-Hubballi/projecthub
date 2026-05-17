# Add GitHub Link Field Task
Status: In Progress

## Steps from Approved Plan:

### 1. Update Database Schema (pts.sql) ✅
- [x] Add `link` column to `projects` table: ALTER TABLE `projects` ADD COLUMN `link` VARCHAR(255) NULL AFTER `docname`;
- [x] Execute ALTER on live database

### 2. Update addnewproject.php ✅
- [x] Add form input field for 'link' (type=url) after tech textarea
- [x] Style consistently with existing form

### 3. Update saveproject.php ✅
- [x] Add `$link = $_REQUEST['link'] ?? '';`
- [x] Update INSERT statement to include '$link' at end

### 4. Update editproject.php ✅
- [x] Add form input for 'link' with existing value
- [x] Place after tech field

### 5. Update updateproject.php ✅
- [x] Add `$link = $_REQUEST['link'];`
- [x] Add `link='$link',` to UPDATE SET clause

### 6. Testing & Verification
- [ ] Test add new project with link
- [ ] Verify DB insert
- [ ] Test edit project link
- [ ] Check displays show link if applicable

**Next Step:** Database schema update
