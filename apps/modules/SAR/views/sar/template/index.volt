<!DOCTYPE html>
<head>
    <title>SAR</title>
    {% include 'sar/template/styles.volt' %}
</head>
<body>
	  {% block navbar %} {% endblock %}
      {% include 'sar/template/topnavbar.volt' %}
      {% block content %} {% endblock %}
      {% include 'sar/template/footer.volt' %}
</body>
    
{% include 'sar/template/script.volt' %}
{% block addscript %} {% endblock %}