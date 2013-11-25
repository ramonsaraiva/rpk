# -*- coding: utf-8 -*

from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login as auth_login, logout as auth_logout
from django.contrib.auth.decorators import login_required
from player.models import Player

def signup(request):
	return render(request, 'player/signup.html')

def panel(request):
	return render(request, 'player/panel.html')

def login(request):
	error = ''

	if request.POST:
		username = request.POST.get('username')
		password = request.POST.get('password')

		user = authenticate(username=username, password=password)
		if user:
			auth_login(request, user)
			return redirect('dashboard')
		else:
			error = 'Verifique as informações digitadas, não identificamos uma conta com este usuário e senha.'

	return render(request, 'player/login.html', {'error': error})

def logout(request):
	auth_logout(request)
	return redirect('home')

@login_required
def dashboard(request):
	return render(request, 'player/home.html')
