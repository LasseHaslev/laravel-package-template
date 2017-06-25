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
        default: 'LasseHaslev\\MyNamespace',
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

var fixComposerFile = function fixComposerFile( response ) {
    var composerFile = response.folder + '/composer.json';
    return new Promise( function(resolve, reject) {
        fs.readFile(composerFile, 'utf8', function (err,data) {
            if (err) {
                reject( err );
                return console.log(err);
            }
            var result = data.replace( /\\\\/g, '\\' ).replace( /\\/g, '\\\\' );

            fs.writeFile(composerFile, result, 'utf8', function (err) {
                if (err) {
                    reject( err );
                    return console.log(err);
                }
                resolve();
            });
        });
    } );
};

var changeFilenames = function changeFilenames( response ) {
    return Promise.all([
        new Promise( function( resolve, reject ) {
            fs.rename( response.folder + '/config/my_package.php', response.folder + '/config/' + response.data.package.name + '.php', function( error ) {
                if (error) {
                    console.error( error );
                    reject( error );
                }
                resolve();
            } );
        } ),
        new Promise( function( resolve, reject ) {
            var date = new Date();
            fs.rename( response.folder + '/database/migrations/my_package.php', response.folder + '/database/migrations/' + date.getFullYear() + '_' + ("0" + (date.getMonth() + 1)).slice(-2) + '_' + ("0" + date.getDate()).slice(-2) + '_' + date.getTime().toString().substring( date.getTime().toString().length - 6 ) + '_create_' + response.data.package.name + '_table.php', function( error ) {
                if (error) {
                    console.error( error );
                    reject( error );
                }
                resolve();
            } );
        } ),
        new Promise( function( resolve, reject ) {
            fs.rename( response.folder + '/src/Model.php', response.folder + '/src/' + response.data.model.single + '.php', function( error ) {
                if (error) {
                    console.error( error );
                    reject( error );
                }
                resolve();
            } );
        } ),
    ])
};

templater.start().then( function( response ) {
    return Promise.all([ changeFilenames( response ), fixComposerFile( response ) ])
} ).then( function() {
    console.log( 'Success! Happy coding!' );
} );
