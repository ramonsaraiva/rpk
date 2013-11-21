"""
Django settings for rpk project.

For more information on this file, see
https://docs.djangoproject.com/en/1.6/topics/settings/

For the full list of settings and their values, see
https://docs.djangoproject.com/en/1.6/ref/settings/
"""

# Build paths inside the project like this: os.path.join(BASE_DIR, ...)
import os
BASE_DIR = os.path.dirname(os.path.dirname(__file__))


# Quick-start development settings - unsuitable for production
# See https://docs.djangoproject.com/en/1.6/howto/deployment/checklist/

# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = 'w2e1d1q*@+iu6$(kc8)0fge2rcrmnf9c$^b=()m+w@%sutyye*'

# SECURITY WARNING: don't run with debug turned on in production!
DEBUG = True

TEMPLATE_DEBUG = True

ALLOWED_HOSTS = []

SITE_ID = 1

# Application definition

INSTALLED_APPS = (
    'django.contrib.admin',
    'django.contrib.auth',
	'django.contrib.sites',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
	'player',
	'news',
)

MIDDLEWARE_CLASSES = (
    'django.contrib.sessions.middleware.SessionMiddleware',
    'django.middleware.common.CommonMiddleware',
    'django.middleware.csrf.CsrfViewMiddleware',
    'django.contrib.auth.middleware.AuthenticationMiddleware',
    'django.contrib.messages.middleware.MessageMiddleware',
    'django.middleware.clickjacking.XFrameOptionsMiddleware',
)

ROOT_URLCONF = 'rpk.urls'

WSGI_APPLICATION = 'rpk.wsgi.application'

# Database
# https://docs.djangoproject.com/en/1.6/ref/settings/#databases

DATABASES = {
	'player': {
		'ENGINE': 'sqlserver_ado',
		'NAME': 'accountdb',
		'USER': 'sa',
		'PASSWORD': 'admin123',
		'HOST': r'RPK\SQLEXPRESS',
    },
	'default': {
		'ENGINE': 'django.db.backends.mysql',
		'NAME': 'rpk',
		'USER': 'root',
		'PASSWORD': 'lsd25',
		'HOST': '127.0.0.1',
	}
}

# Internationalization
# https://docs.djangoproject.com/en/1.6/topics/i18n/

LANGUAGE_CODE = 'en-us'

TIME_ZONE = 'UTC'

USE_I18N = True

USE_L10N = True

USE_TZ = True


# Static files (CSS, JavaScript, Images)
# https://docs.djangoproject.com/en/1.6/howto/static-files/

TEMPLATE_DIRS = (
	os.path.join(BASE_DIR, 'templates/'),
)

STATICFILES_DIRS = (
	os.path.join(BASE_DIR, 'static/'),
)

STATIC_URL = '/static/'
STATIC_ROOT = 'C:/public_html/realitypk.com/static/'

MEDIA_URL = '/media/'
MEDIA_ROOT = 'C:/public_html/realitypk.com/media/'

AUTHENTICATION_BACKENDS = ('django.contrib.auth.backends.ModelBackend','rpk.backends.PlayerBackend','django.contrib.auth.backends.ModelBackend',)
