# Peepl WordPress theme

## Local development

First, make sure the project has been fully set up locally, by running the setup script:

    git clone [this repo name]
    cd [this repo]
    script/setup

## Previewing the theme in the included Vagrant VM

A Vagrantfile is provided to enable you to edit the theme and preview your changes locally, in a Vagrant VM.

If you want to use this, you will need [Vagrant](http://www.vagrantup.com/downloads.html) and [Virtualbox](https://www.virtualbox.org/) installed. For example, on a Mac with [Homebrew](https://brew.sh/), you might run:

    brew cask install virtualbox
    brew cask install vagrant

The Vagrantfile reads settings from `./.vagrant.yml` (if it exists). An example file is provided at `./.vagrant.yml.example` in case you want to customise anything.

Now you can boot up the VM:

    vagrant up

The VM will automatically install WordPress, phpMyAdmin and MailHog, which you can access at:

* WordPress: http://localhost:8000
* phpMyAdmin: http://localhost:3000
* MailHog: http://localhost:8025

(If you want to change these ports, you can do so by creating a `.vagrant.yml` file, as explained above.)

WordPress and MySQL usernames and passwords are defined at the top of `provision/provision.sh`.

## Editing the styles

You will need [Sass](https://sass-lang.com/) installed. For example, on a Mac with [Homebrew](https://brew.sh/), you might run:

    brew install sass/sass/sass

The CSS styles will be built when you run `script/setup`, `script/update`, or `bin/make-css`.

You can set the styles to rebuild automatically when changed:

    bin/make-css --watch

## Composer packages

[Composer](https://getcomposer.org/) is not required unless you want to _add_ a new PHP package, or update the version of an existing one.

You can [install Composer manually](https://getcomposer.org/download/), or on a Mac with [Homebrew](https://brew.sh/) you could run:

    brew install composer

You can then run `composer install` from inside the `peepl-theme` directory, on the host machine.

## Dealing with compiled CSS

The `peepl-theme` directory includes compiled CSS, to make the theme immediately usable as a valid WordPress theme, without having to compile the styles first.

However, this means that some care must be taken over how the CSS files are managed with Git.

The repo includes a `.gitattributes` file that treats compiled CSS files as binary files, and specifies merge settings that should avoid conflicts while merging or rebasing [(all following the guidance here)](https://blog.andrewray.me/dealing-with-compiled-files-in-git/), but some manual configuration is still required on each clone of the repo.

For this reason, you should run `script/setup` after cloning this repo, to set up the custom merge driver, pre-rebase hook, and pre-commit hook.

## Coding standards

Be a good citizen by following these standards when working on this project:

* Use a 4 space indent for HTML, CSS, JavaScript, and Sass files.
* While HTML markup in PHP templates should use a 4 space indent, try to place PHP block tags (like `if` statements, etc) on a 2 space indent, where sensible. This helps maintain readability for loops and conditional blocks.
* Use the full `<?php` opening tag, rather than the `<?` and `<?=` shorthand tags.
* PHP files should _not_ end with `?>`.

Otherwise, where there’s doubt, follow the [WordPress core coding standards](https://codex.wordpress.org/WordPress_Coding_Standards) for PHP, HTML, and CSS.
