from django.urls import path
from . import views

urlpatterns = [
    path('', views.inicio, name='inicio'),
    path('inicio/', views.inicio, name='inicio'),
    path('acercade/', views.about, name='acercade'),
    path('mision/', views.mision, name='mision'),
    path('vision/', views.vision, name='vision'),
    path('login/',views.login_user, name='login'),
    path('registro/',views.register_user, name='registro'),
    path('logout/',views.logout_user, name='logout'),
]