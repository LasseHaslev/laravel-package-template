@extends( config( '<% package.name %>.views.backend.layout' ) )

<?php
$properties = $<% model.instance.plural %>->first()->getAttributes();
$keys = array_keys( $properties );
?>

@section( 'content' )
<table class="table">
    <thead>
        <tr>
            @foreach( $keys as $key )
            <th>{{ $key }}</th>
            @endforeach
            <th><div class="has-text-right">Actions</div></th>
        </tr>
    </thead>
    <tbody>
@foreach( $<% model.instance.plural %> as $<% model.instance.single %> )
        <tr>
            @foreach( $keys as $key )
            <td>{{ $<% model.instance.single %>->$key }}</td>
            @endforeach
            <td>
                <div class="has-text-right">
                    <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.show', $<% model.instance.single %>->id ) }}">{{ __( 'Show' ) }}</a>
                    <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.edit', $<% model.instance.single %>->id ) }}">{{ __( 'Edit' ) }}</a>
                    <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form-{{ $<% model.instance.single %>->id }}').submit();">
                        {{ __( 'Delete' ) }}
                    </a>

                    <form id="delete-form-{{ $<% model.instance.single %>->id }}" action="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                    </form>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
</table>

<a class="button is-primary" href="{{ route( '<% package.name %>.<% model.instance.plural %>.create' ) }}">@lang( 'crudlang::buttons.create' )</a>

@endsection
