from django.db import models

class Player(models.Model):
	userid = models.CharField(max_length=32, primary_key=True)
	password = models.CharField(db_column='Passwd', max_length=32)
	gamecode = models.CharField(db_column='GameCode', max_length=10, blank=True)
	gpcode = models.CharField(db_column='GPCode', max_length=10, blank=True)
	registday = models.DateTimeField(db_column='RegistDay', blank=True, null=True)
	disuseday = models.DateTimeField(db_column='DisuseDay', blank=True, null=True)
	useperiod = models.IntegerField(db_column='UsePeriod', blank=True, null=True)
	inuse = models.CharField(max_length=1)
	grade = models.CharField(db_column='Grade', max_length=1)
	eventchk = models.CharField(db_column='EventChk', max_length=1)
	selectchk = models.CharField(db_column='SelectChk', max_length=1)
	blockchk = models.CharField(db_column='BlockChk', max_length=1)
	specialchk = models.CharField(db_column='SpecialChk', max_length=1)
	servername = models.CharField(db_column='ServerName', max_length=50, blank=True)
	credit = models.CharField(db_column='Credit', max_length=1)
	ecoin = models.TextField(db_column='ECoin', blank=True)
	startday = models.DateTimeField(db_column='StartDay', blank=True, null=True)
	last_login = models.DateTimeField(db_column='LastDay', blank=True, null=True)
	editday = models.DateTimeField(db_column='EditDay', blank=True, null=True)
	rno = models.IntegerField(db_column='RNo', blank=True, null=True)
	delchk = models.CharField(db_column='DelChk', max_length=1)
	sno = models.CharField(db_column='SNo', max_length=50, blank=True)
	channel = models.CharField(db_column='Channel', max_length=50, blank=True)
	bnum = models.IntegerField(db_column='BNum', blank=True, null=True)
	mxserver = models.CharField(db_column='MXServer', max_length=50, blank=True)
	mxchar = models.CharField(db_column='MXChar', max_length=50, blank=True)
	mxtype = models.IntegerField(db_column='MXType', blank=True, null=True)
	mxlevel = models.IntegerField(db_column='MXLevel', blank=True, null=True)
	mxexp = models.IntegerField(db_column='MXExp', blank=True, null=True)
	blockmotivo = models.CharField(db_column='BlockMOTIVO', max_length=50, blank=True)
	blockdata = models.CharField(db_column='BlockDATA', max_length=50, blank=True)

	class Meta:
		managed = True
		db_table = 'AllGameUser'

	def __unicode__(self):
		return self.userid

	@property
	def is_active(self): return True

	@property
	def is_staff(self): return False

	def is_authenticated(self): return True
