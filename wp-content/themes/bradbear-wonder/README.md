# BradBear Wonder

The theme for bradbear.com. Standalone classic WordPress theme: no parent
theme, no page builder, no build step.

## The idea

A night sky with the Great Bear (Ursa Major) overhead. The newest story goes
up on a marquee in chasing lights. Six portals lead to six realms. Every
post is a ticket; every article is printed on a playbill.

## Install

1. Zip this folder (or deploy the repo) so it lands at
   `wp-content/themes/bradbear-wonder`.
2. Appearance → Themes → activate **BradBear Wonder**. On activation it
   creates any missing realm categories.
3. Settings → Reading → "Your homepage displays: Your latest posts".
4. Optional: Appearance → Menus → assign a menu to "Primary navigation".
   Without one the header shows The Show / Portals / About.

## Writing for it

- **Category = realm.** Give each post one realm category; it sets the
  post's colour and icon.
- **Excerpt = dek.** A hand-written excerpt appears on the ticket, on the
  marquee, and as the italic line under the post title.
- **Sticky = held over.** A sticky post stays on the marquee.
- **Featured image is optional.** Tickets and the marquee are designed to
  look finished without one.
- Site tagline (Settings → General), if set, replaces the hero paragraph.

## Files

| File | What it does |
|------|--------------|
| `style.css` | All styles. Tokens at the top. |
| `inc/realms.php` | Realm definitions, icons, category seeding |
| `home.php` | Front of house: hero, marquee, portals, tickets, ringmaster |
| `index.php` | Realm archives, tags, search |
| `single.php`, `page.php` | Stories and pages |
| `template-parts/ticket.php` | The post card |
| `assets/js/wonder.js` | Starfield canvas and mobile menu |
