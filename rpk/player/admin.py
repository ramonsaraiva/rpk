from django.contrib import admin
from player.models import Player
from rpk.admodels import PlayerModelAdmin

admin.site.register(Player, PlayerModelAdmin)
