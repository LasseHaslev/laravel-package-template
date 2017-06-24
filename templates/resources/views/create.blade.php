@extends( config( '<% package.name %>.views.backend.layout' ) )

@section( 'content' )
<form method="POST" action="{{ route( '<% package.name %>.<% model.instance.plural %>.store' ) }}">
    @include( '<% package.name %>::elements.form' )
    <button type="submit" class="button is-primary">{{ __( 'Submit' ) }}</button>
</form>
@endsection
