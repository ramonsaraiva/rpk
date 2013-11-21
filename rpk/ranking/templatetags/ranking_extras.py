from django import template
from django.db.models import Avg
from ranking.models import BattlePoints
from player.classesid import classes

register = template.Library()

@register.inclusion_tag('ranking/mini_top10.html')
def render_minitop10():
	chars = BattlePoints.objects.using('clan').all().order_by('-level', '-bp')[:5]
	return {'chars': chars, 'bg_average': bp_average}

def bp_average():
	return BattlePoints.objects.using('clan').all().aggregate(Avg('bp'))['bp__avg']

@register.filter
def bp_stars(bp):
	avg = bp_average()
	per = bp / avg
	rta = per - 1

	if rta < 1.0:
		if rta <= 0.25:
			return 0
		elif rta <= 0.7:
			return 1
		else:
			return 2
	else:
		if rta <= 1.3:
			return 3
		elif rta <= 1.75:
			return 4
		else:
			return 5
