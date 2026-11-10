# bradbear-site

Theme code and writing workflow for **bradbear.com**, Brad Bear's personal
blog (WordPress on Pressable). Personal site, not a client or company site.

## What's here

- `wp-content/themes/bradbear-wonder/` — **the current theme.** Standalone
  classic theme (no parent, no builder). Night sky, marquee, six "portal"
  realms, posts as tickets. See its `README.md`.
- `wp-content/themes/bradbear-elegant/`, `wp-content/themes/bradbear/` —
  earlier experiments, inactive. Leave them alone.
- `content/voice.md` — Brad's voice and the six realms. Read before writing
  anything in his name.
- `content/idea-bank.md` — post prompts.
- `.claude/skills/post/` — `/post`: brain dump in, WordPress draft out.

## Posting

When Brad hands over a brain dump or says to blog something, use the `/post`
skill. Drafts by default; publish only when he says so.

## Working on the theme

- Realms are ordinary WordPress categories matched by slug in
  `inc/realms.php`. Adding a realm means adding an entry there; the theme
  creates missing categories on activation.
- All CSS is in `style.css`, organised by section, driven by the custom
  properties at the top. No build step.
- WCAG 2.1 AA is the baseline: keep contrast, visible focus, keyboard
  operability, and the `prefers-reduced-motion` block intact.
- Inspiration is "showman spectacle, storybook magic, celestial wonder" as a
  mood. Never use names, characters, logos, or artwork from films or theme
  parks.
- Changes to the live site go to staging first, and only when Brad asks.
