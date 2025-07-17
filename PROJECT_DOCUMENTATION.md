# Project Documentation

This document provides a comprehensive overview of the project's architecture, features, and recent changes. It is intended to serve as a live reference for all future development and maintenance.

## Table of Contents

-   [Project Overview](#project-overview)
-   [Core Technologies](#core-technologies)
-   [Key Features](#key-features)
-   [Recent Changes](#recent-changes)
-   [Routes](#routes)
-   [Controllers](#controllers)
-   [Models](#models)
-   [Views](#views)

---

## Project Overview

This project is a comprehensive web application with a robust admin panel for managing content, users, and site settings. The front end is designed to be user-friendly and responsive, providing a seamless experience across all devices.

### Core Technologies

-   **Backend:** Laravel (PHP)
-   **Frontend:** Blade, JavaScript, CSS
-   **Database:** MySQL

### Key Features

-   **User Authentication:** Secure user registration and login with Google Socialite integration.
-   **Admin Panel:** A comprehensive dashboard for managing all aspects of the site, including users, posts, services, and more.
-   **Content Management:** A full-featured CMS for creating, editing, and deleting content.
-   **File Management:** A secure system for uploading and managing files.
-   **Responsive Design:** A mobile-first design that ensures a consistent experience across all devices.

---

## Recent Changes

### Blog and News Section Refactor

-   **Date:** 2025-07-16
-   **Change:** Refactored the `blog-and-news-section` component to fix an issue where the title and description were overlapping.
-   **Details:**
    -   Changed the heading tag from `<h1>` to `<h4>` to improve semantic HTML.
    -   Updated the script to correctly handle HTML content from Summernote, ensuring that the description is properly sanitized and displayed.
    -   Adjusted the card layout to be more responsive and visually appealing.

---

## Routes

The following is a summary of the project's routes, as defined in `routes/web.php`:

### Authentication Routes

-   `GET /register`: Displays the registration form.
-   `POST /register`: Handles user registration.
-   `GET /realm-admin/login`: Displays the login form.
-   `POST /login/store`: Handles user login.
-   `GET /auth/google/redirect`: Redirects to Google for authentication.
-   `GET /auth/google/callback`: Handles the Google authentication callback.

### Admin Routes

-   `GET /admin/dashboard`: Displays the admin dashboard.
-   `GET /admin/user`: Manages users.
-   `GET /admin/home-slide`: Manages the home page slider.
-   `GET /admin/front-end`: Manages front-end settings.
-   `GET /admin/site-data`: Manages site data.
-   `GET /admin/setting`: Manages site settings.
-   `GET /admin/testimonial`: Manages testimonials.
-   `GET /admin/category`: Manages post categories.
-   `GET /admin/post`: Manages posts.
-   `GET /admin/contact`: Manages contact messages.
-   `GET /admin/service-query`: Manages service queries.
-   `GET /admin/notice`: Manages notices.
-   `GET /admin/service`: Manages services.
-   `GET /admin/gallery-albums`: Manages gallery albums.
-   `GET /admin/gallery-media`: Manages gallery media.
-   `GET /admin/page-banner`: Manages page banners.
-   `GET /admin/client`: Manages clients.
-   `GET /admin/logout`: Logs out the admin user.

### Frontend Routes

-   `GET /`: Displays the home page.
-   `GET /contact-us`: Displays the contact page.
-   `POST /contact-us`: Handles contact form submissions.
-   `POST /service-query`: Handles service query submissions.
-   `GET /about-us`: Displays the about page.
-   `GET /service`: Displays the services page.
-   `GET /service/detail/{id}`: Displays a single service.
-   `GET /blog`: Displays the blog page.
-   `GET /blog/detail/{id}`: Displays a single blog post.
-   `GET /blog/category/{category_id}`: Displays blog posts by category.
-   `GET /search-posts`: Searches for blog posts.
-   `GET /terms-and-conditions`: Displays the terms and conditions page.
-   `GET /privacy-policy`: Displays the privacy policy page.
-   `GET /portfolio`: Displays the portfolio page.
-   `GET /gallery-album/{id}`: Displays a single gallery album.
-   `GET /gallery-album/client/{id}`: Displays a single client gallery album.
-   `GET /gallery-album/get-all-data`: Retrieves all gallery album data.

---

## Controllers

The following is a summary of the project's controllers and their responsibilities:

### Frontend Controllers

-   **`AuthController.php`**: Handles user authentication, including registration, login, and socialite integration.
-   **`CommentController.php`**: Manages comments on posts.
-   **`Controller.php`**: The base controller that all other controllers extend.
-   **`DemoApiRouteController.php`**: A demo controller for API routes.
-   **`FrontGalleryController.php`**: Manages the frontend gallery.
-   **`UserFrontendController.php`**: Manages all frontend pages and functionality.

### Admin Controllers

-   **`AdminDashboardController.php`**: Manages the admin dashboard.
-   **`CallToActionController.php`**: Manages the call to action section.
-   **`CategoryController.php`**: Manages post categories.
-   **`ClientController.php`**: Manages clients.
-   **`ContactController.php`**: Manages contact messages.
-   **`FrontendController.php`**: Manages frontend settings.
-   **`GalleryAlbumController.php`**: Manages gallery albums.
-   **`GalleryMediaController.php`**: Manages gallery media.
-   **`HomeSliderController.php`**: Manages the home page slider.
-   **`NoticeController.php`**: Manages notices.
-   **`PageBannerController.php`**: Manages page banners.
-   **`PageController.php`**: Manages pages.
-   **`PostController.php`**: Manages posts.
-   **`ServiceController.php`**: Manages services.
-   **`ServiceQueryController.php`**: Manages service queries.
-   **`SettingController.php`**: Manages site settings.
-   **`TestimonialController.php`**: Manages testimonials.
-   **`UserController.php`**: Manages users.

---

## Models

The following is a summary of the project's models and their corresponding database tables:

-   **`CallToAction.php`**: Represents the `call_to_actions` table. This model is responsible for managing the call-to-action sections that appear on various pages of the site.
    -   **Table**: `call_to_actions`
    -   **Fillable Attributes**: `title`, `page`, `description`, `image`, `link`
    -   **Relationships**: This model does not have any defined relationships.
-   **`Category.php`**: Represents the `categories` table. This model is used to categorize posts.
    -   **Table**: `categories`
    -   **Fillable Attributes**: `title`, `status`
    -   **Relationships**:
        -   `post()`: Defines a one-to-many relationship with the `Post` model. A category can have multiple posts.
-   **`Client.php`**: Represents the `clients` table. This model stores information about the clients.
    -   **Table**: `clients`
    -   **Fillable Attributes**: `name`, `email`, `address`, `contact`, `image`, `description`
    -   **Relationships**:
        -   `albums()`: Defines a one-to-many relationship with the `GalleryAlbum` model. A client can have multiple gallery albums.
-   **`Comment.php`**: Represents the `comments` table. This model is polymorphic and can be associated with different models (e.g., posts).
    -   **Table**: `comments`
    -   **Fillable Attributes**: `name`, `email`, `content`, `user_id`, `commentable_type`, `commentable_id`
    -   **Relationships**:
        -   `user()`: Defines a many-to-one relationship with the `User` model. A comment belongs to a user.
        -   `commentable()`: Defines a polymorphic relationship, allowing comments to be associated with other models.
-   **`Contact.php`**: Represents the `contacts` table. This model is used to store contact form submissions from users.
    -   **Table**: `contacts`
    -   **Fillable Attributes**: `name`, `email`, `subject`, `message`
    -   **Relationships**: This model does not have any defined relationships.
-   **`FeaturedService.php`**: Represents the `featured_services` table. This model is used to feature specific services on the website.
    -   **Table**: `featured_services`
    -   **Fillable Attributes**: `service_id`, `sort_order`
    -   **Relationships**:
        -   `service()`: Defines a many-to-one relationship with the `Service` model. A featured service belongs to a service.
-   **`frontend.php`**: Represents the `frontends` table.
-   **`GalleryAlbum.php`**: Represents the `gallery_albums` table.
-   **`GalleryMedia.php`**: Represents the `gallery_media` table.
-   **`HomeSlide.php`**: Represents the `home_slides` table.
-   **`Notice.php`**: Represents the `notices` table.
-   **`Page.php`**: Represents the `pages` table.
-   **`PageBanner.php`**: Represents the `page_banners` table.
-   **`Post.php`**: Represents the `posts` table.
-   **`PostImage.php`**: Represents the `post_images` table.
-   **`Service.php`**: Represents the `services` table.
-   **`ServiceQuery.php`**: Represents the `service_queries` table.
-   **`Setting.php`**: Represents the `settings` table.
-   **`SiteData_SheduleTime.php`**: Represents the `site_data_shedule_times` table.
-   **`SiteData.php`**: Represents the `site_datas` table.
-   **`Testimonial.php`**: Represents the `testimonials` table.
-   **`User.php`**: Represents the `users` table.
-   **`UserService.php`**: Represents the `user_services` table.
-   **`WorkingDay.php`**: Represents the `working_days` table.

---
