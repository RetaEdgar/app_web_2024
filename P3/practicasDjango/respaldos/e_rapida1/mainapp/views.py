from django.shortcuts import render

# Create your views here.
def index(request):
    return render(request,'mainapp/index.html',{
        'title':'inicio',
        'content':'Soy inicio'
    })
def about(request):
    return render(request,'mainapp/about.html',{
        'title':'Acerca de ',
        'content':'Acerca de '
    })
def mision(request):
    return render(request,'mainapp/mision.html',{
        'title':'Mision',
        'content':'Soy Mision'
    })
def vision(request):
    return render(request,'mainapp/vision.html',{
        'title':'Vision',
        'content':'Soy vision'
    })
def error404_inicio(request, exception):
    return render(request,'mainapp/404.html')

def registro(request):
    return render(request, 'users/registro.html',{
        'title':'Registro',
        'content':'Soy Registro'
    })
def login_usuario(request):
    return render(request, 'users/login.html',{
        'title':'Registro',
        'content':'Soy Inicio de sesion'
    })