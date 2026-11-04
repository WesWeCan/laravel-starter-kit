---
name: refresh-starter-kit
description: Bring this Laravel + Inertia + Vue starter kit up to date before it seeds a new project. Updates Composer and Yarn dependencies, regenerates Laravel Boost for Claude Code, compares the kit against the upstream laravel/laravel skeleton and laravel/vue-starter-kit, audits it against dominus's global rules, and runs the gates. Use when dominus asks to update, upgrade, refresh or modernise the starter kit or its dependencies, asks what the kit is missing compared to upstream, or is about to start a new project from the kit.
---

# Refresh the starter kit

The kit is refreshed at the start of every new project, so this runs every few weeks or months. Each run has two halves: a read-only survey that ends in decisions, then an Autopilot apply from an approved plan. Never skip straight to applying.

## 0. Preflight

- `git status`: the tree must be clean and on `main`. If it isn't, stop and say what's dirty.
- `php -v`, `corepack yarn -v`, `composer -V`. Yarn runs through corepack (`packageManager` in package.json). Never use npm or npx.
- Read `composer.json`, `package.json`, `vite.config.js`, `resources/js/app.ts`, `resources/views/app.blade.php` and `bootstrap/app.php`. They are small, and the rest of the run depends on them.

## 1. Survey (read-only)

Run these in one go:

- `composer outdated --direct`: each package is either in-range or a new major.
- `corepack yarn outdated`: red rows are majors.
- `grep -n "getExecCommand\|runViaMultiplex" -A3 vendor/laravel/framework/src/Illuminate/Foundation/Console/DevCommand.php`: if `php artisan dev` still execs `yarn dlx @laravel/multiplex` on macOS, it can't run on Yarn 1, and `composer dev` stays on concurrently.

Fetch upstream through the web-fetch agent (announce it in one line). Use the default branch, and if Laravel has a new major, also its branch:

- laravel/laravel: `composer.json` (require, require-dev, the full `scripts` block), `package.json`, `vite.config.js`, `bootstrap/app.php`, `.env.example`.
- laravel/vue-starter-kit: `package.json`, `resources/js/app.ts`, `vite.config.ts`. This shows how upstream wires Inertia: the vite plugin, page resolution, Wayfinder, SSR.

For every new major, read its upgrade guide (`search-docs` for Laravel-ecosystem packages, web-fetch for the rest). For TypeScript, check whether vue-tsc supports the new major before proposing it.

Then run the rule audit in `audit.md`.

## 2. Decisions, then plan

Hand back a numbered list of decisions only. Each item is a short question with a default. Group them like this:

1. **Majors**: one item per package, with the breaking changes that touch this kit.
2. **New upstream packages** (`@laravel/multiplex` was one; it needs Yarn 4, so it was skipped): say what each one does. They are new dependencies, so the default is skip unless one clearly earns its place.
3. **Upstream drift**: scripts, vite config, bootstrap, `.env.example` keys, Inertia setup. Default: align, unless the kit deliberately differs (see "Deliberate differences" below).
4. **Audit findings** from `audit.md`.

After dominus answers, enter plan mode. The plan lists every file it will touch, as phases with gates.

## 3. Apply (Autopilot, from the approved plan)

Gate after every phase: `vendor/bin/pint --dirty --format agent`, `php artisan test --compact`, `corepack yarn vue-tsc --noEmit`, `corepack yarn build`. At each passed gate, say "commit point" in one line and keep going.

**Dependencies**

- `composer update -W`, then `composer bump` so new projects never resolve below the versions that were tested.
- `corepack yarn upgrade` (in range). Approved majors go through `corepack yarn add -D pkg@^N`.
- Rewrite `package.json` carets to the installed versions (check them with `corepack yarn list --depth=0`).

**Boost**

- `php artisan boost:update --no-interaction`.
- If skills were added or renamed, say so. `boost.json` must still say `agents: ["claude_code"]`.
- Boost writes guidelines to `AGENTS.md` unless a `CLAUDE.md` exists. Keep `AGENTS.md`; Claude Code reads it.
- Confirm `.claude/skills/refresh-starter-kit/` survived.

**Upstream alignment, then rule fixes**: only what the plan names.

**Last gate**

- Run the full suite.
- Run `php artisan dusk` if chromedriver is installed (`composer run dusk:detect-chromedriver` installs it, which is a download, so ask first).
- The Herd site is `https://laravel-starter-kit.test`.

## Stop rules

Stop and ask, even mid-run, for:

- a new major the plan didn't name
- a new dependency
- a folder rename (for example `Pages/` → `pages/`)
- a file outside the plan's list (a one-line syntax fix forced by an upgrade is the exception: fix it and name it in the hand-back)

Never stage files. `git rm` and `git mv` stage, so use plain `rm` and `mv`. Untracking a file waits for the commit dominus asks for.

## Deliberate differences from upstream (don't "fix" these)

- **Ziggy, not Wayfinder.** `route()` in Vue and `@routes` in Blade.
- **SCSS, not Tailwind.** Folders: `baseline/`, `layout/`, `sections/`, `content/`, `filament/`.
- **Axios** stays (`window.axios` in `bootstrap.ts`).
- **Pest + Dusk** instead of bare PHPUnit. Browser tests use Pest syntax.
- **`@jamescoyle/vue-icon` + `@mdi/js`** for icons.
- **Self-hosted Noto Sans** through `laravel-vite-plugin/fonts` + `@fonts`. The `body` alias owns `--font-body`.
- **No `shouldRenderJsonWhen`** in bootstrap, since there's no API.
- **`composer dev` uses `yarn concurrently`, not `@php artisan dev`.** On macOS, `artisan dev` execs `yarn dlx @laravel/multiplex`, and Yarn 1 has no `dlx`. Re-check this each run; moving to Yarn 4 would change the answer.
- **The README is dominus's.** Fix version numbers and commands only when dominus asks.

## Hand-back

- Lead with what changed for someone starting a project from the kit.
- Name the files.
- List out-of-plan fixes.
- Give the `[??]` count if any copy was touched.
- Say "locked: …" for any test that encodes a decision.
- Ask dominus to click through `/` and `/showcase` while `yarn dev` runs, after checking Boost `browser-logs` and `last-error`.
- End with the commit points, so dominus can commit per phase.
