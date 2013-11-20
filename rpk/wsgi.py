import os, sys

pwd = os.path.dirname(os.path.abspath(__file__))
sys.path.append(pwd)

os.environ.setdefault("DJANGO_SETTINGS_MODULE", "rpk.settings")

from django.core.wsgi import get_wsgi_application
application = get_wsgi_application()
