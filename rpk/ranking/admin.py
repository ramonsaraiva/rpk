from django.contrib import admin
from ranking.models import BattlePoints
from rpk.admodels import ClanModelAdmin

admin.site.register(BattlePoints, ClanModelAdmin)
