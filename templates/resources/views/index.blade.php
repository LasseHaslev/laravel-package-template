@extends( config( '<% package.name %>.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ trans( 'crudlang::pages.index.model', [ 'name'=>trans_choice( '<% package.name %>::models.<% model.instance.single %>.name', false ) ] ) }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>{{ trans( '<% package.name %>::models.<% model.instance.single %>.properties.name' ) }}</th>
            <th>{{ trans( '<% package.name %>::models.<% model.instance.single %>.properties.icon' ) }}</th>
            <th>{{ trans( '<% package.name %>::models.<% model.instance.single %>.properties.description' ) }}</th>
            <th><div class="has-text-right">Actions</div></th>
        </tr>
    </thead>
    <tbody>
@foreach( $<% model.instance.plural %> as $<% model.instance.single %> )
        <tr>
            <td>{{ $<% model.instance.single %>->name }}</td>
            <td>{{ $<% model.instance.single %>->icon }}</td>
            <td>{{ $<% model.instance.single %>->description }}</td>
            <td>
                <div class="has-text-right">
                    <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.show', $<% model.instance.single %>->id ) }}"><span class="icon"><i class="fa fa-eye"></i></span></a>
                    <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.edit', $<% model.instance.single %>->id ) }}"><span class="icon"><i class="fa fa-pencil"></i></span></a>
                    <a href="{{ route( '<% package.name %>.<% model.instance.plural %>.destroy', $<% model.instance.single %>->id ) }}"
                        onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $<% model.instance.single %>->id }}').submit();">
                        <i class="fa fa-trash"></i>
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
