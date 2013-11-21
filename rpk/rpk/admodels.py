from django.contrib import admin

class PlayerModelAdmin(admin.ModelAdmin):
	using = 'player'

	def save_model(self, request, obj, form, change):
		obj.save(using=self.using)

	def delete_model(self, request, obj):
		obj.delete(using=self.using)

	def get_queryset(self, request):
		return super(PlayerModelAdmin, self).get_queryset(request).using(self.using)

	def formfield_for_foreignkey(self, db_field, request=None, **kwargs):
		return super(PlayerModelAdmin, self).formfield_for_foreignkey(db_field, request=request, using=self.using, **kwargs)

	def formfield_for_manytomany(self, db_field, request=None, **kwargs):
		return super(PlayerModelAdmin, self).formfield_for_manytomany(db_field, request=request, using=self.using, **kwargs)

class ClanModelAdmin(admin.ModelAdmin):
	using = 'clan'

	def save_model(self, request, obj, form, change):
		obj.save(using=self.using)

	def delete_model(self, request, obj):
		obj.delete(using=self.using)

	def get_queryset(self, request):
		return super(ClanModelAdmin, self).get_queryset(request).using(self.using)

	def formfield_for_foreignkey(self, db_field, request=None, **kwargs):
		return super(ClanModelAdmin, self).formfield_for_foreignkey(db_field, request=request, using=self.using, **kwargs)

	def formfield_for_manytomany(self, db_field, request=None, **kwargs):
		return super(ClanModelAdmin, self).formfield_for_manytomany(db_field, request=request, using=self.using, **kwargs)
