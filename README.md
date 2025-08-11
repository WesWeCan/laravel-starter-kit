## Laravel + Inertia + Vue 3 Starter Kit (TypeScript, Ziggy, SCSS)

This is a Laravel 12 starter configured for a Vue 3 + Inertia app with TypeScript, Ziggy route helpers, axios, and SCSS via Vite.

### Stack
- **Backend**: Laravel 12, Inertia Laravel adapter
- **Frontend**: Vue 3 with **script setup** and **TypeScript**
- **Bundler**: Vite 7 + `laravel-vite-plugin`
- **Dev tools**: `vite-plugin-vue-devtools`
- **Routing helpers**: Ziggy (`@routes` in Blade, `ZiggyVue` in Vue)
- **HTTP**: Axios pre-configured in `bootstrap.ts`
- **Styles**: SCSS (global styles only; no styles inside SFCs)
- **Testing**: Pest
- **DX**: Laravel Pail (pretty app logs) and a queue worker wired in the dev script

### Project layout (key files)
- `resources/js/app.ts`: Inertia + Vue app bootstrap, imports `../scss/index.scss`, registers `ZiggyVue`
- `resources/js/bootstrap.ts`: axios on `window`, sets `X-Requested-With`
- `resources/js/Pages/*.vue`: Inertia pages (TypeScript SFCs)
- `resources/js/Layouts/BasicLayout.vue`: Base layout with `<Head />`
- `resources/scss/index.scss`: global styles (uses `_variables.scss`)
- `resources/views/app.blade.php`: Inertia root, includes `@routes` + `@vite`
- `vite.config.js`: Laravel + Vue + Vue DevTools plugins
- `tsconfig.json`: strict TS, path aliases (`@/*`, `ziggy-js`)

### Conventions
- **Vue SFCs**: Always `script setup lang="ts"` at the top, then `template`. No `<style>` blocks in SFCs.
- **Styles**: Put styles in `resources/scss/` and import from `app.ts`.
- **Aliases**: Use `@/` for `resources/js` (configured in `tsconfig.json`).
- **Routes**: Use Ziggy's `route()` in Vue (via `ZiggyVue`) and in Blade via `@routes`.
- **Page titles**: Set by Inertia using `VITE_APP_NAME` for suffix.

### Prerequisites
- PHP 8.3+
- Composer
- Node 18+
- Yarn

### Install
```bash
composer install
cp .env.example .env
php artisan key:generate
yarn install
```

### Develop
Run backend and frontend in two terminals:
```bash
php artisan serve
yarn dev
```

Alternatively, a single command exists via Composer (spawns server, queue worker, pail logs, and Vite). Note: it uses npm internally for the Vite task.
```bash
composer run dev
```

### Build
```bash
yarn build
```

### Tests
```bash
composer test
```

### Type checking
- Vue SFC-aware type-check:
```bash
yarn dlx vue-tsc --noEmit
```
- Or plain TS (non-SFC):
```bash
yarn tsc --noEmit
```

### Using Ziggy route helpers
- In Blade (already included): `@routes`
- In Vue (globally via `ZiggyVue`):
```ts
route('index')
route('posts.show', { post: 1 })
```

### Notes
- Axios is available as `window.axios` with `X-Requested-With` set.
- The Inertia progress bar is enabled with a gray color.
- `assetsInclude: ['**/*.glsl']` is enabled in Vite if you import GLSL assets.

### What’s included vs. not
- Included: Vue 3 + TS, Inertia, Ziggy, SCSS, Axios, Vite, Vue DevTools, Pest, Pail, queue worker in dev.
- Not included: SSR, authentication scaffolding, ESLint/Prettier config.

