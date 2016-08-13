<ul class="provider-tags tags">
	@foreach($provider->categories as $category)
		<li class="tag">
			<span>{{ $category->name }}</span>
		</li>

	@endforeach
</ul>

