from player.models import Player

class PlayerBackend(object):
	def authenticate(self, username=None, password=None):
		try:
			return Player.objects.using('player').get(userid=username, password=password)
		except:
			return None

	def get_user(self, user_id):
		try:
			return Player.objects.using('player').get(userid=user_id)
		except:
			return None
