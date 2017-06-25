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
laravel-package

# Option 2: Install in other folder
laravel-package my-new-package

# Follow instructions and you are good to go!
```

## Usage in Laravel application
> I use this package together with [LasseHaslev/laravel-modules](https://github.com/LasseHaslev/laravel-modules).
> Follow instructions to use with a laravel application.

1. Install package
`npm install @lassehaslev/laravel-package-template --save-dev`

2. Add script to project `package.json`
```json
{
  "scripts": {
    "package": "laravel-package"
  }
}
```

3. Create package `npm run package Modules/page-name` 
4. Run `composer dump-autoload`
5. Package is ready to use. **Happy Coding!**
