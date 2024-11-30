from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login, logout
# from django.contrib.auth.forms import UserCreationForm
from django.contrib import messages
from django.contrib.auth.decorators import login_required
from mainapp.form import RegisterForm 


# Create your views here.
def inicio(request):
    return render(request,'mainapp/inicio.html', {
        'title': 'Página Principal',
        'content' : '..:: ¡Bienvenido a mi Página Principal! ::..'
    })
@login_required(login_url='inicio')
def about (request):
   
    return render (request, 'mainapp/acercade.html', {
        'title': 'Acerca de Nosotros',
        'content': 'Estudiante que quiere pasar la materia',
        
    })

@login_required(login_url='inicio')
def mision (request):
    return render (request, 'mainapp/mision.html', {
        'title': 'Misión',
        'content': 'Terminar la carrera',
    })

@login_required(login_url='inicio')
def vision (request):
    return render (request, 'mainapp/mision.html', {
        'title': 'Visión',
        'content': 'Ser un buen desarrollador de SW'
    })

def register_user(request):

  if request.user.is_authenticated:
    return redirect('inicio')
  else:
     register_form=RegisterForm()

     if request.method == "POST":
       register_form=RegisterForm(request.POST)

       if register_form.is_valid():
          register_form.save()
          messages.success(request,"¡Registro con Éxito")
          return redirect('inicio')
          
     return render(request,'users/register.html',{
     'title':'Registro de Usuario',
     'register_form':register_form
     })

def login_user (request):
    if request.user.is_authenticated:
       return redirect('inicio')
    else:
        if request.method == "POST":
           username=request.POST.get('username')
           password=request.POST.get('password')

           user=authenticate(request,username=username,password=password)
           if user is not None:
              login(request,user)
              messages.success(request,"¡Bienvenido al Inicio de Sesion!")
              return redirect('inicio')
           else:
              messages.warning(request,"No es posible iniciar sesion, porfavor ingresa tus credenciales de acceso")

        return render (request, 'users/login.html', {
            'title': ' Inicio de sesion',
            
        })
# def redirigir_inicio(request, exeption=None):
#     return redirect('inciio/')

def redirigir_inicio(request, exception):
    return render(request,'mainapp/404.html') 

def logout_user(request):
   logout(request)
   return redirect('login')