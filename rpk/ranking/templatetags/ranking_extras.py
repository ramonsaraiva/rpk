from django import template
from ranking.models import BattlePoints
from player.classesid import classes

register = template.Library()

@register.inclusion_tag('ranking/mini_top10.html')
def render_minitop10():
	chars = BattlePoints.objects.using('clan').all().order_by('-level', '-bps')[:10]
	return {'chars': chars,}
