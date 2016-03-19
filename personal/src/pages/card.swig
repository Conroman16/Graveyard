---
title: 'Business Card'
---
{% extends 'src/layouts/page.swig' %}

{% block style %}
<link rel="stylesheet" type="text/css" href="/style/card.css" />
{% endblock %}

{% block content %}
<div>
	<aside class="profile-card">
		<header>
			{# avatar #}
			<a href="//cjtk.me" target="_blank">
				<img src="http://i.imgur.com/xLOKNRT.png">
			</a>

			{# title #}
			<h1>Connor Kennedy</h1>

			{# subtitle #}
			<h2>Software Engineer</h2>
		</header>

		{# description #}
		<div class="profile-bio">
			<p>
				Full-Stack Web<br>
				Server Admin
			</p>
		</div>

		{# left-side links #}
		<ul class="profile-social-links">
			<li>
				<a href="//foliotek.me/connor" class="fa fa-briefcase" title="ID Page" target="_blank"></a>
			</li>
			<li>
				<a href="//connor.foliotek.me" class="fa fa-bookmark" title="Portfolio" target="_blank"></a>
			</li>
			<li>
				<a href="//github.com/Conroman16/" class="fa fa-github" title="Github" target="_blank"></a>
			</li>
		</ul>
	</aside>
</div>
{% endblock %}

{#{% block scripts %}

{% endblock %}#}
