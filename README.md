### Introduction

This site was built using [underscoreTW](https://underscoretw.com/docs/), a Tailwind theme builder for WP, and [Local](https://localwp.com/) by Flywheel.

This is mostly a blueprint of the code used for Neurotic's website theme.

### Quickstart

1. Install [Local](https://localwp.com/) on your machine
2. Start a new site
3. Download the repo
4. Move the repo content to `wp-content/themes` in your local development environment
5. Run `npm install` && `npm run dev` in the moved folder
6. Activate the theme in WordPress
7. Click 'start site' on Local to open your local environment

**Atention** : this config will **NOT** give you access to the remote DB - if a direct sync with the DB is needed, download the [latest backup on Flywheel](https://getflywheel.com/wordpress-support/backups-on-flywheel/) and start your site on Local from there.

### Development

#### Always run `npm run watch` before coding.

This will allow you to use Tailwind utility classes and minify your JS code.

If you type a Tailwind class and it doesn't render properly in your local environment, it probably means you haven't started `npm run watch`.

### Comitting to Github

#### Make sure you are always in `wp-content`folder before pushing changes

[As per Flywheel's recommendation](https://localwp.com/help-docs/advanced/developing-with-local-and-github/), Git should only track the wp-content directory because like most managed WordPress hosts, Flywheel locks down WordPress core files in order to avoid conflicts later.
