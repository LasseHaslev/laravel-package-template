{{ csrf_field() }}

<label class="label" for="<% model.instance.single %>-name">@lang( '<% package.name %>::models.<% model.instance.single %>.properties.name' )</label>
<p class="control">
    <input id="<% model.instance.single %>-name" class="input" type="text" name="name" value="{{ $<% model.instance.single %>->name or '' }}" placeholder="@lang( '<% package.name %>::models.<% model.instance.single %>.properties.name' )" autofocus>
</p>

<label class="label" for="<% model.instance.single %>-description">@lang( '<% package.name %>::models.<% model.instance.single %>.properties.description' )</label>
<p class="control">
    <textarea id="<% model.instance.single %>-description" class="textarea" type="text" name="description" placeholder="@lang( '<% package.name %>::models.<% model.instance.single %>.properties.description' )">{{ $<% model.instance.single %>->description or '' }}</textarea>
</p>
