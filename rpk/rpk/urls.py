from django.conf.urls import patterns, include, url
from rpk import views

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
	url(r'^$', views.HomeView.as_view(), name='home'),

	#url(r'^admin/', include(admin.site.urls)),
)
