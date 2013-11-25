from django.conf.urls import patterns, include, url
from rpk import views

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
	url(r'^$', views.home, name='home'),
	url(r'^players/', include('player.urls')),

	url(r'^admin/', include(admin.site.urls)),
)
