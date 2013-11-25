from django.shortcuts import render
from django.views.generic import TemplateView, ListView
from player.models import Player
from news.models import SliderNews, News

def home(request):
	slider_news = SliderNews.objects.filter(active=True).order_by('-priority', 'date')
	news = News.objects.filter(active=True).order_by('-priority', 'date')
	context = {'slider_news': slider_news, 'news': news}
	return render(request, 'home.html', context)
