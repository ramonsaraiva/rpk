from django.shortcuts import render
from django.views.generic import TemplateView, ListView
from player.models import Player
from news.models import SliderNews

def home(request):
	slider_news = SliderNews.objects.all().order_by('date', 'priority')
	context = {'slider_news': slider_news}
	return render(request, 'home.html', context)

class PlayerTest(ListView):
	model = Player
	queryset = Player.objects.using('player').all()
	template_name = 'test.html'
