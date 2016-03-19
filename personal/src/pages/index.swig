---
title: 'Home Page'
---

{% extends 'src/layouts/page.swig' %}

{% block content %}
<h2>This is a test of my static site!</h2>

<blockquote>-Connor Kennedy</blockquote>
{% endblock %}

{% block scripts %}
<script>
	$("blockquote").css("color", "#bada55");
</script>
{% endblock %}
