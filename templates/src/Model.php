<?php

namespace <% package.namespace %>;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @author <% author.name %>
 */
class <% model.single %> extends Model {

    protected $table = '<% model.instance.plural %>';

    protected $fillable = [
        'name',
        'description',
    ];

}
