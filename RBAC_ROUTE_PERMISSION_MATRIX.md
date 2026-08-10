# RBAC Route Permission Matrix

This matrix documents effective admin route authorization after hardening.

## Core Access

- `admin` middleware: required for all admin area routes.
- `permission:*` middleware: required per action and feature.

## Dashboard

- `GET /admin/dashboard` -> `dashboard.view`
- `GET /index` -> `dashboard.view`

## Site Details

- `GET /settings` -> `sitedetails.manage`
- `POST /settings` -> `sitedetails.manage`
- `POST /settings/reset` -> `sitedetails.manage`
- `GET /sitedetails` -> `sitedetails.manage`

## Contacts

- `GET /contacts` -> `contacts.manage`
- `GET /contacts/{contact}` -> `contacts.manage`
- `PUT /contacts/{contact}/status` -> `contacts.manage`
- `PUT /contacts/{contact}/notes` -> `contacts.manage`
- `DELETE /contacts/{contact}` -> `contacts.manage`
- `POST /contacts/bulk-delete` -> `contacts.manage`
- `POST /contacts/bulk-status` -> `contacts.manage`

## About

- `GET /admin/about` -> `about.manage`
- `POST /admin/about/update` -> `about.manage`
- Team, timeline, and core value store/update/delete routes -> `about.manage`

## Categories

- Resource actions enforced by `CategoryController` action middleware:
  - index/show -> `categories.view`
  - create/store/import -> `categories.create`
  - edit/update -> `categories.update`
  - destroy/bulk-delete -> `categories.delete`
- Additional routes:
  - `GET /admin/categories/export` -> `categories.view`

## Tags

- Resource actions enforced by `TagController` action middleware:
  - index/show -> `tags.view`
  - create/store -> `tags.create`
  - edit/update -> `tags.update`
  - destroy/bulk-delete -> `tags.delete`

## Posts

- Resource actions enforced by `PostController` action middleware:
  - index/show -> `posts.view`
  - create/store -> `posts.create`
  - edit/update -> `posts.update`
  - destroy -> `posts.delete`
- Custom actions:
  - toggle publish/featured -> `posts.update`
  - upload image -> `posts.update`
  - bulk action -> `posts.update`
  - duplicate -> `posts.delete`

## Service Queries

- Resource actions enforced by `ServiceContractController` action middleware:
  - index/edit/show -> `servicequeries.view`
  - update -> `servicequeries.update`
  - destroy/bulk-delete -> `servicequeries.delete`
  - toggle status -> `servicequeries.resolve`

## Comments

- `GET /admin/comments` -> `comments.view`
- Reply and approve actions -> `comments.reply`
- delete and bulk-delete -> `comments.delete`

## Partners

- index -> `partners.view`
- create/store -> `partners.create`
- edit/update -> `partners.update`
- destroy/bulk-delete -> `partners.delete`

## Users / Roles / Permissions

- roles routes -> `roles.manage`
- permissions routes -> `permissions.manage`
- users list -> `users.view`
- users create/store -> `users.create`
- users edit/update -> `users.update`
- users delete -> `users.delete`
- users reset password -> `users.reset_password`

## Safety Rules

- Last admin cannot be deleted.
- Last admin cannot be changed to a non-admin role.
- Admin role permission assignment is protected to always retain full permissions.
