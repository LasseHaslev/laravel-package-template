@extends( config( '<% package.name %>.views.backend.layout' ) )

@section( 'content' )

<div class="content">
    <h1 class="title">{{ trans( 'crudlang::pages.create.model', [ 'name'=>trans_choice( '<% package.name %>::models.<% model.instance.single %>.name', true ) ] ) }}</h1>

    <form method="POST" action="{{ route( '<% package.name %>.<% model.instance.plural %>.store' ) }}">
@include( '<% package.name %>::elements.form' )
        <button type="submit" class="button is-primary">@lang( 'crudlang::buttons.create' )</button>
        <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.index' ) }}" class="button is-default">@lang( 'crudlang::buttons.cancel' )</a>
    </form>
</div>

@endsection
