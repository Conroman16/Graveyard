<!DOCTYPE html>	
<html lang="en">
	<head>
		<meta charset="UTF-8" >
		<link rel="icon" href="favicon.ico" />
		<title>{%= title %}</title>

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="/style/sweetalert.css" />
		<link rel="stylesheet" type="text/css" href="/style/all.less.min.css" />
		{% block style %}{% endblock %}
	</head>
	<body>
		{% block body %}{% endblock %}

		{# jQuery 2.1.4 #}
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/js/jquery.min.js"><\/script>')</script>

		{# Underscore 1.8.3 #}
		<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
		<script>window._ || document.write('<script src="/js/underscore.min.js"><\/script>')</script>

		{# Backbone 1.2.1 #}
		<script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.1/backbone-min.js"></script>
		<script>window.Backbone || document.write('<script src="/js/backbone.min.js"><\/script>')</script>

		{# initialize app #}
		<script>
			var app = {};
			app.models = {};
			app.viewstate = new Backbone.Model();
			app.viewstate.set('renderTime', new Date());
		</script>

		<!-- build:js /js/all.min.js -->
		<script type="text/javascript" src="/js/sweetalert.js"></script>
		<script type="text/javascript" src="/js/common.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
		<!-- endbuild -->

		{# set aweetalert as default alert() #}
		<script>
			window.alert = swal;
		</script>

		{% block scripts %}{% endblock %}

		{# Google Analytics #}
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-65008160-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>