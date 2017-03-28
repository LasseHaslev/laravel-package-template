#! /usr/bin/env node

var fs = require( 'fs' );

// Todo
// - Add backslashes to all single backslashes in composer.json
// - Add Promise to templater

var Templater = require( '@lassehaslev/templater' );

var templater = new Templater([
    {
        type: 'input',
        name: 'author.name',
        message: 'Whats your name?',
        default: 'Lasse S. Haslev',
    },
    {
        type: 'input',
        name: 'author.email',
        message: 'Whats your email?',
        default: 'lasse@haslev.no',
    },
    {
        type: 'input',
        name: 'package.name',
        message: 'Package name',
        default: 'my-package',
    },
    {
        type: 'input',
        name: 'package.namespace',
        message: 'Namespace',
        default: 'LasseHaslev\\Namespace',
    },
    {
        type: 'input',
        name: 'model.single',
        message: 'Model single name',
        default: 'Account',
    },
    {
        type: 'input',
        name: 'model.plural',
        message: 'Model plural name',
        default: 'Accounts',
    },
    {
        type: 'input',
        name: 'model.instance.single',
        message: 'Model instance single name',
        default: 'account',
    },
    {
        type: 'input',
        name: 'model.instance.plural',
        message: 'Model instance plural name',
        default: 'accounts',
    },
    {
        type: 'input',
        name: 'composer.name',
        message: 'Package name',
        default: 'lassehaslev/my-package',
    },
], {
    templateFolder: __dirname + '/../templates',
});

var addDoubleSlashes = function() {
}

// console.log(fs);

templater.start().then( function( response ) {
    // console.log(response.folder);
    var composerFile = response.folder + '/composer.json';
    fs.readFile(composerFile, 'utf8', function (err,data) {
        if (err) {
            return console.log(err);
        }
        var result = data.replace( /\\\\/g, '\\' ).replace( /\\/g, '\\\\' );

        fs.writeFile(composerFile, result, 'utf8', function (err) {
            if (err) return console.log(err);
        });
    });
} );
