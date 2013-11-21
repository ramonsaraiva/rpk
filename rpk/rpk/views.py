from django.shortcuts import render
from django.views.generic import TemplateView, ListView
from player.models import Player

def home(request):
	return render(request, 'home.html')

class PlayerTest(ListView):
	model = Player
	queryset = Player.objects.using('player').all()
	template_name = 'test.html'
