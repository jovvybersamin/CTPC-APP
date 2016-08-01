<script type="text/javascript">
	window.App = {};
	window.App.csrfToken = "{{ csrf_token() }}";
	window.App.siteRoot = "{{ Config::get('app.url') }}";
</script>
