# @lassehaslev/laravel-package-template
> Kickstarter for [Laravel package development](https://laravel.com/docs/5.4/packages)

## Install
```bash
npm install -g @lassehaslev/laravel-package-template
```

## Usage
```bash
# Go to the folder you want to create a package

# Option 1: Install all in current folder
laravel-package-template

# Option 2: Install in other folder
laravel-package-template my-new-package

# Follow instructions and you are good to go!
```

## Recommended
I use this package together with [LasseHaslev/laravel-modules](https://github.com/LasseHaslev/laravel-modules).

And this is my workflow:
```bash
# cd in to project folder

# Go into Modules folder
cd Modules/

# Kickstart new module
laravel-package-template new-package

# Update composer.lock
composer dumpautoload

# Yep! All done!
```
