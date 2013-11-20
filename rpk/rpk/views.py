from django.views.generic import TemplateView, ListView
from player.models import Player

class HomeView(TemplateView):
	template_name = 'home.html'

class PlayerTest(ListView):
	model = Player
	template_name = 'test.html'
