# DB
- users table:

  - Fields: id, first_name, last_name, email, password, created_at.
  - Primary key: id.
- admins table:

  - Fields: id, user_id, created_at.
  - Primary key: id.
  - Relationship: admins.user_id references users.id (one-to-one).
- employees table:

  - Fields: id, user_id, phone, company_id, created_at.
  - Primary key: id.
  - Relationships:
    - employees.user_id references users.id (one-to-one).
    - employees.company_id references companies.id (many-to-one).
- companies table:

  - Fields: id, name, email, logo, website_link, created_at.
  - Primary key: id.
 
![image](https://github.com/nadajaradat/Tests/assets/86928581/99ad8d63-24da-404d-b7cf-57fb871b5ad6)
