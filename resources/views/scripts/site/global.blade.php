<script type="text/javascript">
	window.App = {};
	window.App.csrfToken = "{{ csrf_token() }}";
	window.App.siteRoot = "{{ request()->server->get('SERVER_NAME') }}";
</script>
