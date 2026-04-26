# Convert React/Inertia to Blade - TODO

## Step 1: Remove Inertia Middleware & Configuration

- [x] Update `bootstrap/app.php` - remove HandleInertiaRequests and AddLinkHeadersForPreloadedAssets

## Step 2: Update Routes

- [x] `routes/web.php` - Replace Inertia::render with view() / controller returns
- [x] `routes/settings.php` - Replace Inertia::render with view()

## Step 3: Update Controllers (10 files)

- [x] `ProjectController.php`
- [x] `ContactController.php`
- [x] `Auth/AuthenticatedSessionController.php`
- [x] `Auth/RegisteredUserController.php`
- [x] `Auth/NewPasswordController.php`
- [x] `Auth/PasswordResetLinkController.php`
- [x] `Auth/ConfirmablePasswordController.php`
- [x] `Auth/EmailVerificationPromptController.php`
- [x] `Settings/ProfileController.php`
- [x] `Settings/PasswordController.php`

## Step 4: Update Base Layout

- [x] `resources/views/layouts/app.blade.php` - standard Laravel layout

## Step 5: Create New Blade Layouts

- [x] `resources/views/layouts/auth.blade.php`
- [x] `resources/views/layouts/settings.blade.php`

## Step 6: Create/Update Blade Views

- [x] Fix `welcome.blade.php`
- [x] `projects/index.blade.php`
- [x] `projects/show.blade.php`
- [x] `dashboard.blade.php`
- [x] `admin/projects/index.blade.php`
- [x] `admin/projects/create.blade.php`
- [x] `admin/projects/edit.blade.php`
- [x] `admin/messages/index.blade.php`
- [x] `auth/login.blade.php`
- [x] `auth/register.blade.php`
- [x] `auth/forgot-password.blade.php`
- [x] `auth/reset-password.blade.php`
- [x] `auth/verify-email.blade.php`
- [x] `auth/confirm-password.blade.php`
- [x] `settings/profile.blade.php`
- [x] `settings/password.blade.php`
- [x] `settings/appearance.blade.php`

## Step 7: Vite Config

- [x] `vite.config.js` - Remove React plugin, keep Tailwind CSS

## Step 8: Testing

- [ ] Run app and verify pages load
