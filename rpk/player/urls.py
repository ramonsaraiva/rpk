from django.conf.urls import patterns, include, url
from player import views
from django.contrib.auth.decorators import login_required
from django.contrib.auth.views import login, logout

urlpatterns = patterns('',
	url(r'^login/$', views.login, name='login'),
	url(r'^logout/$', views.logout, name='logout'),
	url(r'^dashboard/$', views.dashboard, name='dashboard'),
)
