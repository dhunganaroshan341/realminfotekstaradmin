Let's go. I’d build this as a **minimal editorial/engineering portfolio** rather than a generic “developer portfolio” template.

### Visual direction

Think:

* **White / off-white canvas**
* Near-black typography
* One restrained accent color
* Lots of whitespace
* Thin borders
* Subtle shadows only where necessary
* Large typography
* Small uppercase metadata
* Smooth but restrained animations
* No gradients everywhere
* No giant collection of cards

The goal should feel closer to a **high-end personal site / design portfolio** than a Bootstrap admin dashboard.

### Our stack

```text
Laravel
   │
   ├── Blade → page structure + SEO
   │
   ├── Vue → interactive pieces
   │
   ├── Tailwind → visual system
   │
   └── Vite → assets
```

And we'll build it **one section at a time**, rather than creating 30 components immediately.

---

# Step 1 — Establish the visual foundation

Before Hero, Projects, About, etc., let's establish:

```text
resources/
├── css/
│   └── app.css
│
├── js/
│   ├── app.js
│   └── components/
│
└── views/
    ├── layouts/
    │   └── frontend.blade.php
    │
    ├── components/
    │   └── frontend/
    │
    └── frontend/
        └── home.blade.php
```

I'd also create:

```text
resources/js/components/frontend/
```

rather than mixing admin Vue components and portfolio components.

---

# Step 2 — Our homepage structure

We're going to build this:

```text
┌──────────────────────────────────────────────────────┐
│                                                      │
│  ROSHAN                         Work  About  Contact  │
│                                                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│                                                      │
│             LARAVEL DEVELOPER                        │
│                                                      │
│             I build reliable                         │
│             digital systems.                         │
│                                                      │
│             Backend-focused developer                │
│             building with Laravel & Vue.             │
│                                                      │
│             [ View Work ]    [ Contact Me ]           │
│                                                      │
│                                  ┌───────────────┐     │
│                                  │               │     │
│                                  │   PHOTO /     │     │
│                                  │   VISUAL      │     │
│                                  │               │     │
│                                  └───────────────┘     │
│                                                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│  SELECTED WORK                                      │
│                                                      │
│  Restaurant Management Platform                     │
│  Mobility Management System                         │
│  Nepal Geography Package                            │
│                                                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│  ABOUT                                               │
│                                                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│  EXPERIENCE                                          │
│                                                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│  SERVICES                                            │
│                                                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│  ARTICLES                                            │
│                                                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│  LET'S BUILD SOMETHING                               │
│                                                      │
└──────────────────────────────────────────────────────┘
```

Notice something important:

**We aren't starting with cards everywhere.**

The portfolio should have a strong visual rhythm.

---

# Step 3 — The Blade layout

I'd make:

```text
resources/views/layouts/frontend.blade.php
```

with responsibilities limited to:

```text
HTML
HEAD
SEO
Fonts
Vite
Navbar
Main content
Footer
Vue mounting
```

Then:

```text
resources/views/frontend/home.blade.php
```

should only compose sections:

```blade
@extends('layouts.frontend')

@section('content')

    @include('frontend.sections.hero')

    @include('frontend.sections.projects')

    @include('frontend.sections.about')

    @include('frontend.sections.experience')

    @include('frontend.sections.services')

    @include('frontend.sections.articles')

    @include('frontend.sections.contact')

@endsection
```

This is much cleaner than putting the entire homepage into one enormous Blade file.

---

# Step 4 — HeroSection

And here is where your existing CMS model becomes useful.

We'll eventually have:

```php
HeroSection
```

and the controller provides:

```php
$hero = HeroSection::where('status', 'Active')
    ->first();
```

Then Blade:

```blade
<section id="hero" class="min-h-screen">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">

        <div class="grid items-center min-h-screen gap-12 lg:grid-cols-2">

            <div>
                <p class="mb-6 text-sm font-medium uppercase tracking-[0.25em] text-neutral-500">
                    {{ $hero->subtitle }}
                </p>

                <h1 class="max-w-4xl text-5xl font-semibold tracking-tight text-neutral-950 sm:text-6xl lg:text-7xl">
                    {{ $hero->title }}
                </h1>

                <p class="max-w-xl mt-8 text-lg leading-8 text-neutral-600">
                    {{ $hero->description }}
                </p>

                <div class="flex flex-wrap gap-4 mt-10">
                    <a
                        href="{{ $hero->button_url }}"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-white transition rounded-full bg-neutral-950 hover:bg-neutral-800"
                    >
                        {{ $hero->button_text }}
                    </a>

                    <a
                        href="#contact"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium transition border rounded-full border-neutral-300 text-neutral-900 hover:border-neutral-950"
                    >
                        Contact Me
                    </a>
                </div>
            </div>

            <div class="flex justify-center lg:justify-end">
                <div class="aspect-[4/5] w-full max-w-md overflow-hidden rounded-3xl bg-neutral-100">
                    @if($hero->image)
                        <img
                            src="{{ asset('storage/' . $hero->image) }}"
                            alt="{{ $hero->title }}"
                            class="object-cover w-full h-full"
                        >
                    @endif
                </div>
            </div>

        </div>

    </div>
</section>
```

That gives us the initial visual language:

```text
white
+
black
+
gray
+
huge typography
+
rounded image
+
lots of whitespace
```

Very clean.

---

# Step 5 — Where Vue enters

Don't make the Hero a Vue component just for the sake of saying we're using Vue.

Instead, we'll introduce Vue where it **actually adds value**.

For example, our Projects section:

```text
Projects
──────────────

[ All ] [ Laravel ] [ Vue ] [ APIs ]

Project 01
Project 02
Project 03
```

That's a perfect Vue component.

```text
ProjectFilter.vue
```

Vue manages:

```text
selected category
↓
filtered projects
↓
animated rendering
```

Laravel still provides the initial project data.

That's the hybrid architecture I want us to follow throughout the site.

---

# Step 6 — The design system

Let's establish a few rules now and **not randomly invent styles later**.

### Background

```text
bg-white
bg-neutral-50
```

### Primary text

```text
text-neutral-950
```

### Secondary text

```text
text-neutral-600
```

### Borders

```text
border-neutral-200
```

### Buttons

```text
rounded-full
```

### Cards

Prefer:

```text
border
```

over:

```text
shadow-xl
```

### Typography

Headings:

```text
font-semibold
tracking-tight
```

Body:

```text
leading-relaxed
```

---

# And the most important design rule

**Don't make everything animated.**

We'll use animation to communicate hierarchy:

```text
Page load
    ↓
Hero enters
    ↓
Sections reveal as scrolling
    ↓
Project images have subtle hover
    ↓
Navigation transitions
```

Not:

```text
Everything bouncing
Everything spinning
Everything moving
Everything gradient
```

😄

---

## Our build sequence

I'd do it in this order:

```text
01. Layout + design system
        ↓
02. Navbar
        ↓
03. HeroSection
        ↓
04. About
        ↓
05. Skills
        ↓
06. Services
        ↓
07. Projects + Vue filtering
        ↓
08. Experience
        ↓
09. Articles
        ↓
10. Testimonials
        ↓
11. Contact + Vue form
        ↓
12. Footer
        ↓
13. Animations
        ↓
14. Responsive polish
        ↓
15. SEO
        ↓
16. Performance
```

**Let's start with #01: the frontend layout + navbar.** Once that foundation looks right, everything else can inherit the same design language.
