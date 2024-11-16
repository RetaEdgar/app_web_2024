from django.shortcuts import render, redirect

# Create your views here.
def index(request):
    return render(request,'mainapp/inicio.html', {
        'title': 'Página Principal',
        'content' : '..:: ¡Bienvenido a mi Página Principal! ::..'
    })

def about (request):
    mensaje='Bienvenido mi Nombre es: Paulina Ale Breceda'
    return render (request, 'mainapp/acercade.html', {
        'title': 'Acerca de Nosotros',
        'content': 'Estudiante que quiere pasar la materia',
        'mensaje': mensaje
    })

def mision (request):
    return render (request, 'mainapp/mision.html', {
        'title': 'Misión',
        'content': 'Terminar la carrera',
    })

def vision (request):
    return render (request, 'mainapp/mision.html', {
        'title': 'Visión',
        'content': 'Ser un buen desarrollador de SW'
    })

# def redirigir_inicio(request, exeption=None):
#     return redirect('inciio/')

def redirigir_inicio(request, exception):
    return render(request,'mainapp/404.html')