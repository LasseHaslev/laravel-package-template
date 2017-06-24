@extends( config( '<% package.name %>.views.backend.layout' ) )

<?php $form_id = str_random(); ?>

@section( 'content' )

<form method="POST" action="{{ route( '<% package.name %>.<% model.instance.plural %>.update', $<% model.instance.single %>->id ) }}">
    <input type="hidden" name="_method" value="PUT">
    @include( '<% package.name %>::elements.form' )
    <button type="submit">{{ __( 'Submit' ) }}</button>

    <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}"
        onclick="event.preventDefault();
        document.getElementById('delete-form-{{ $formId }}').submit();">

        {{ __( 'Delete' ) }}
    </a>

</form>
<form id="delete-form-{{ $formId }}" action="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE" />
</form>

@endsection
