@extends( config( '<% package.name %>.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ $<% model.instance.single %>->name }}</h1>
@if ( $<% model.instance.single %>->description )
<div class="content">
{!! $<% model.instance.single %>->description !!}
</div>
@endif

@if( Auth::check() )
<a class="button is-warning" href="{{ route( '<% package.name %>.<% model.instance.plural %>.edit', $<% model.instance.single %>->id ) }}">{{ trans( 'crudlang::buttons.update', [ 'item'=>trans_choice('<% package.name %>::models.<% model.instance.single %>.name', 1) ] ) }}</a>
<a class="button is-danger" href="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}"
    onclick="event.preventDefault();
                document.getElementById('delete-form-{{ $<% model.instance.single %>->id }}').submit();">
{{ trans( 'crudlang::buttons.delete', [ 'item'=>trans_choice('<% package.name %>::models.<% model.instance.single %>.name', 1) ] ) }}
</a>

<form id="delete-form-{{ $<% model.instance.single %>->id }}" action="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE" />
</form>
@endif

@endsection
