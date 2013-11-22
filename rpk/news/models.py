from django.db import models
import uuid
import os
from django.template.defaultfilters import slugify

def get_file_path(instance, filename):
	ext = filename.split('.')[-1]
	filename = "%s.%s" % (uuid.uuid4(), ext)
	return os.path.join(instance.path, filename)

class SliderNews(models.Model):
	title = models.CharField(max_length=100)
	image = models.ImageField(upload_to=get_file_path)
	path = 'slider'
	text = models.TextField()
	date = models.DateTimeField()
	priority = models.DecimalField(max_digits=2, decimal_places=0, default=0)
	active = models.BooleanField(default=True)

	class Meta:
		verbose_name = 'Slider news'
		verbose_name_plural = 'Slider news'

	def __unicode__(self):
		return self.title

class News(models.Model):
	title = models.CharField(max_length=100)
	image = models.ImageField(upload_to=get_file_path)
	path = 'news'
	text = models.TextField()
	date = models.DateTimeField()
	priority = models.DecimalField(max_digits=2, decimal_places=0, default=0)
	active = models.BooleanField(default=True)
	slug = models.SlugField(max_length=100, blank=True)

	class Meta:
		verbose_name = 'News'
		verbose_name_plural = 'News'

	def save(self, *args, **kwargs):
		self.slug = slugify(self.title)
		super(News, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.title
