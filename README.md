## Laravel + Inertia + Vue 3 Starter Kit (TypeScript, Ziggy, SCSS)

This is a Laravel 13 starter configured for a Vue 3 + Inertia v3 app with TypeScript, Ziggy route helpers, axios, SCSS via Vite, and Laravel Dusk for E2E coverage.

### Stack
- **Backend**: Laravel 13, Inertia Laravel adapter v3
- **Frontend**: Vue 3 with **script setup** and **TypeScript**
- **Bundler**: Vite 8 + `laravel-vite-plugin` + `@inertiajs/vite` (page resolution; SSR disabled)
- **Fonts**: Noto Sans, self-hosted at build time through `laravel-vite-plugin/fonts` and `@fonts`
- **Dev tools**: `vite-plugin-vue-devtools`
- **Routing helpers**: Ziggy (`@routes` in Blade, `ZiggyVue` in Vue)
- **HTTP**: Axios pre-configured in `bootstrap.ts`
- **Styles**: SCSS (global styles only; no styles inside SFCs)
- **Icons**: `@jamescoyle/vue-icon` + `@mdi/js`
- **Testing**: Pest + Laravel Dusk; `laravel/pao` switches test output to compact JSON when an AI agent runs the tests
- **AI tooling**: Laravel Boost for Claude Code (`AGENTS.md`, `.mcp.json`, `.claude/skills`)
- **DX**: Laravel Pail (pretty app logs) and a queue worker wired in the dev script

### Project layout (key files)
- `resources/js/app.ts`: Inertia app bootstrap, imports `../scss/index.scss`, registers `ZiggyVue`. Pages in `resources/js/Pages` are resolved by the `@inertiajs/vite` plugin.
- `resources/js/bootstrap.ts`: axios on `window`, sets `X-Requested-With`
- `resources/js/Pages/*.vue`: Inertia pages (TypeScript SFCs)
- `resources/js/Components/<Domain>/*.vue`: components, grouped by domain (e.g. `Showcase/AllElements.vue`)
- `resources/js/Layouts/BasicLayout.vue`: Base layout with `<Head />`
- `resources/js/types/app.ts`: shared page props; `types/<domain>.ts` for each domain
- `resources/scss/index.scss`: global styles; `baseline/` (variables, palette, fonts, forms) and `layout/` (band grid)
- `resources/views/app.blade.php`: Inertia root, includes `@fonts`, `@routes` + `@vite`
- `app/Http/Resources/<Domain>/*`: JsonResources that shape what a page receives
- `vite.config.js`: Laravel (with fonts) + Inertia + Vue + Vue DevTools plugins
- `tsconfig.json`: strict TS, path aliases (`@/*`, `ziggy-js`)

### Conventions
- **Vue SFCs**: Always `script setup lang="ts"` at the top, then `template`. No `<style>` blocks in SFCs.
- **Styles**: Put styles in `resources/scss/` and `@use` them from the area's index file.
- **Aliases**: Use `@/` for `resources/js` (configured in `tsconfig.json`).
- **Routes**: Use Ziggy's `route()` in Vue (via `ZiggyVue`) and in Blade via `@routes`.
- **Page props**: Pass them through a JsonResource and `->resolve()` them; mirror the shape in `types/<domain>.ts`.
- **Page titles**: Set by Inertia using `VITE_APP_NAME` for suffix.

### Prerequisites
- PHP 8.4+
- Composer
- Node 22+ (Vite 8 and Sass need 20.19 or newer)
- Yarn 1 (pinned in `package.json`; `corepack enable` provides it)

### Install
```bash
composer setup
```

This installs Composer and Yarn dependencies, creates `.env`, generates the app key, runs migrations, and builds the assets.

### Develop
With Herd serving the site, you only need Vite:
```bash
yarn dev
```

To also run a local server, queue worker and Pail logs in one terminal:
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

### Browser tests (Laravel Dusk)
Use Herd with the secured local domain from `.env.dusk.local`:
```bash
cp .env.dusk.local.example .env.dusk.local
php artisan key:generate --env=dusk.local
composer run dusk:detect-chromedriver
yarn dev
composer run dusk
```

- Default Dusk URL: `https://laravel-starter-kit.test`
- Default Dusk database: `laravel_testing`
- If Chrome updates locally, sync the driver again with `composer run dusk:detect-chromedriver`.

### Type checking
```bash
yarn vue-tsc --noEmit
```

### Using Ziggy route helpers
- In Blade (already included): `@routes`
- In Vue (globally via `ZiggyVue`):
```ts
route('index')
route('posts.show', { post: 1 })
```

### Refreshing the kit
Before starting a new project, ask Claude Code to refresh the starter kit. The `refresh-starter-kit` skill in `.claude/skills/` updates the dependencies, regenerates Boost, compares the kit with the upstream Laravel skeleton, and audits it against the house rules.

### Notes
- Axios is available as `window.axios` with `X-Requested-With` set.
- The Inertia progress bar uses `--text-color`.
- `assetsInclude: ['**/*.glsl']` is enabled in Vite if you import GLSL assets.

### What's included vs. not
- Included: Vue 3 + TS, Inertia v3, Ziggy, SCSS, self-hosted fonts, Axios, Vite, Vue DevTools, Pest, Dusk, Pail, Boost, queue worker in dev.
- Not included: SSR (switched off in `vite.config.js` and `AppServiceProvider`), authentication scaffolding, ESLint/Prettier config.
