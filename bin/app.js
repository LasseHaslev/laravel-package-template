#! /usr/bin/env node

# Todo
# - Add backslashes to all single backslashes in composer.json

var templater = require( '@lassehaslev/templater' );

var templater = templater([
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
