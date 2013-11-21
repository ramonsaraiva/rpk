from django.db import models

class BattlePoints(models.Model):
	userid = models.CharField(db_column='UserID', max_length=50)
	char = models.CharField(db_column='ChName', max_length=50, primary_key=True)
	level = models.IntegerField(db_column='ChLvl')
	char_class = models.IntegerField(db_column='ChType')
	bp = models.IntegerField(db_column='BPS')
	deaths = models.IntegerField(db_column='Mortes')

	class Meta:
		managed = False
		db_table = 'BPS'
		unique_together = ('userid', 'char')
		verbose_name = 'Battle Points'
		verbose_name_plural = 'Battle Points'

	def __unicode__(self):
		return self.char
