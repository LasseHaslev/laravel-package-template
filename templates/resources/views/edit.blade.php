@extends( config( '<% package.name %>.views.backend.layout' ) )

@section( 'content' )

<div class="content">
    <h1 class="title">{{ trans( 'crudlang::pages.edit.model', [ 'name'=>trans_choice( '<% package.name %>::models.<% model.instance.single %>.name', true ) ] ) }}</h1>

    <form method="POST" action="{{ route( '<% package.name %>.<% model.instance.plural %>.update', $<% model.instance.single %>->id ) }}">
        <input type="hidden" name="_method" value="PUT">
@include( '<% package.name %>::elements.form' )
        <button type="submit" class="button is-primary">@lang( 'crudlang::buttons.update', [ 'item'=>trans_choice('<% package.name %>::models.<% model.instance.single %>.name', 1) ] )</button>

                    <a class="button is-danger" href="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}"
                        onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $<% model.instance.single %>->id }}').submit();">
@lang( 'crudlang::buttons.delete', [ 'item'=>trans_choice('<% package.name %>::models.<% model.instance.single %>.name', 1) ] )
                    </a>

        <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.index' ) }}" class="button is-default">@lang( 'crudlang::buttons.cancel' )</a>
    </form>
                    <form id="delete-form-{{ $<% model.instance.single %>->id }}" action="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                    </form>
</div>

@endsection
