from django.db import models
import uuid
import os

def get_file_path(instance, filename):
	ext = filename.split('.')[-1]
	filename = "%s.%s" % (uuid.uuid4(), ext)
	return os.path.join('news', filename)

class SliderNews(models.Model):
	title = models.CharField(max_length=100)
	image = models.ImageField(upload_to=get_file_path)
	text = models.TextField()
	date = models.DateTimeField()
	priority = models.DecimalField(max_digits=2, decimal_places=0, default=0)

	class Meta:
		verbose_name = 'Slider news'
		verbose_name_plural = 'Slider news'

	def __unicode__(self):
		return self.title
