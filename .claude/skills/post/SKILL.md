---
name: post
description: Turn Brad's brain dump into a finished bradbear.com blog post and save it to WordPress as a draft. Use when Brad says "post this", "new post", "blog this", "here's a brain dump", "brand dump", "write this up for the blog", or pastes/dictates loose notes and wants them on bradbear.com.
---

# /post — brain dump in, blog post out

Brad hands over raw material: a voice memo transcript, bullet points, a rant,
a link plus two sentences, a photo and a caption. Your job is to turn it into
a post that sounds like him and put it in WordPress as a **draft**.

Speed matters. The whole point is that posting regularly should cost Brad
almost nothing. Do not interview him. Ask a question only if the dump is
missing the one thing the post cannot exist without.

## Steps

1. **Read `content/voice.md`.** Every time. It is short, and it is the
   difference between a post that sounds like Brad and one that sounds like
   a press release.

2. **Pick the realm.** One category from the table in `content/voice.md`
   (Workshop, Center Ring, Main Street, Observatory, Midway, Sandbox). If the
   dump is loose, short, or "here's a thing I tried", it goes in
   *From the Sandbox*. When two fit, pick the one the *feeling* belongs to,
   not the subject.

3. **Find the one idea.** A brain dump usually has three posts in it. Write
   the strongest one. Move the leftovers into `content/idea-bank.md` under
   "From brain dumps" so nothing is lost.

4. **Write it.**
   - Use only facts, names, numbers, and stories that are in the dump or in
     `content/voice.md`. Never invent an anecdote, a quote, a client, or a
     statistic. If a detail would make the post better and you don't have
     it, leave a `[BRAD: ...]` note in the draft instead of making it up.
   - Length follows the material: a Sandbox note can be 200 words; a
     considered piece is 600 to 1,100. Do not pad.
   - Title: specific and a little playful. Offer two alternates in your reply.
   - Excerpt: one or two sentences, written by hand. The theme shows it on
     the ticket, under the marquee title, and as the italic dek on the post,
     so it has to earn its place.
   - 2 to 4 lowercase tags.
   - Format as WordPress block markup (`<!-- wp:paragraph -->` etc.).
     Paragraphs, `h2`/`h3` headings, lists, quotes, and separators are all
     styled. The first paragraph gets a drop cap, so start with a real
     sentence, not a heading, image, or list.

5. **Save as a draft** on `bradbear.com` with the WordPress.com connector
   (`wpcom-mcp-posts-create`): `status: draft`, the title, content, excerpt,
   the realm's category ID (look it up with `wpcom-mcp-categories-list`; do
   not guess IDs), and tags. If Brad supplied an image, upload it and set it
   as the featured image; posts look good without one, so never add stock
   or generated art unasked.

6. **Report back** in a few lines: the title, the realm, the edit/preview
   link, the two alternate titles, and any `[BRAD: ...]` gaps. Then stop.

## Publishing

Drafts only, unless Brad says "publish" (or "post it live", "ship it") in
the same request or after seeing the draft. Publishing is the one step that
is his call every time. When he says go, update the post to
`status: publish` and send him the live link.

## If the connector isn't available

Write the post to `content/drafts/YYYY-MM-DD-slug.md` with the title,
realm, excerpt, and tags in front matter, tell Brad the WordPress connector
wasn't reachable, and stop there.
