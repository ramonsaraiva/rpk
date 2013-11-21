from django.contrib import admin
from player.models import Player

class GameServerModelAdmin(admin.ModelAdmin):
	using = 'player'

	def save_model(self, request, obj, form, change):
		obj.save(using=self.using)

	def delete_model(self, request, obj):
		obj.delete(using=self.using)

	def get_queryset(self, request):
		return super(GameServerModelAdmin, self).get_queryset(request).using(self.using)

	def formfield_for_foreignkey(self, db_field, request=None, **kwargs):
		return super(GameServerModelAdmin, self).formfield_for_foreignkey(db_field, request=request, using=self.using, **kwargs)

	def formfield_for_manytomany(self, db_field, request=None, **kwargs):
		return super(GameServerModelAdmin, self).formfield_for_manytomany(db_field, request=request, using=self.using, **kwargs)

admin.site.register(Player, GameServerModelAdmin)
