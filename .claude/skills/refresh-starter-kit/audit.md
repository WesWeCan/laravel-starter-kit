# Rule audit

The rules live in `~/.claude/CLAUDE.md` (sections Copy, Code, Taste, Nothing behind my back). This file only says how to check them in this kit. Run each check, and turn every hit into a decision with a default. Don't fix anything during the survey.

| Check | Command | Rule |
|---|---|---|
| npm / npx anywhere in scripts | `grep -nE '\bnpm\b\|\bnpx\b' composer.json package.json` | Taste: Yarn, never npm |
| Styles in SFCs | `grep -rln '<style' resources/js` | Taste: no style in SFCs |
| Script before template | `grep -rL '^<script setup lang="ts">' resources/js --include='*.vue'` | Taste: script setup lang=ts, then template |
| fetch instead of axios | `grep -rn 'fetch(' resources/js` | Taste: Axios over fetch |
| BEM in new UI | `grep -rnE 'class="[^"]*__' resources/js` | Taste: no BEM in new UI |
| Literal widths in media queries | `grep -rnE '@media[^{]*[0-9]+px' resources/scss` | Taste: two breakpoint variables only |
| Colors outside the palette | `grep -rnE '#[0-9a-fA-F]{3,8}\b\|rgb\(\|darken\|lighten\|color\.' resources/scss --exclude=_variables.scss` | Taste: colors only as custom properties |
| SCSS outside the area folders | `ls resources/scss` (only `baseline/ layout/ sections/ content/ filament/` + `index.scss`) | Taste: SCSS folders |
| Catch-all or barrel types | `ls resources/js/types` (expect `app.ts`, `<domain>.ts`, `global.d.ts`, `vite-env.d.ts`; no `index.*`) | Taste: types per domain |
| Props not through a resource | `grep -rn "Inertia::render" app` and check each array value ends in `->resolve()` or is a scalar | Taste: JsonResource, resolved |
| Writes without a FormRequest | `php artisan route:list --except-vendor --method=POST` (also PUT, PATCH, DELETE) and check each action's signature | Taste: a FormRequest per write |
| Components outside a domain folder | `find resources/js/Components -maxdepth 1 -name '*.vue'` | Taste: Components/Domain/ |
| Em-dashes in copy | `grep -rn '—' resources/js resources/views app lang 2>/dev/null \| grep -v '<!--'` | Copy: no em-dashes |
| Return types missing | `grep -rnE 'public function \w+\([^)]*\)\s*$' app` | Boost PHP rules |
| Other agents' files | `ls -a \| grep -E '^\.(cursor\|codex\|agents\|junie\|windsurf)'` | Nothing behind my back: propose removal |
| Docs folders or plans | `ls -d docs .ai/* 2>/dev/null` (only `.ai/map` is allowed) | Hard no |
| Canonical shared code | `grep -rn '@canonical' app resources` and compare with what's shared | Code: @canonical docblock |
| Stale README facts | Compare the versions and commands in `README.md` with `composer.json` and `package.json` | One product doc, written by dominus: list them, never edit |
| Tracked secrets | `git ls-files \| grep -E '^\.env'` (only `.env.example` and `.env.dusk.local.example`) | Kit hygiene |
