from django.shortcuts import render,HttpResponse

# Create your views here.
def index(request):
    return render(request,'mainapp/index.html',{
        'title':'Inicio Pagina Principal',
        'content':'..:: !Bienvenido a mi pagina principal! ::..'
    })
    
def about(request):
    mensaje='Bienvenido mi nombre es: Edgar Reta...'
    return render(request,'mainapp/about.html',{
        'title':'Acerca de Nosotros',
        'content':'Somos un grupo de desarrolladores de pan multiplataforma ',
        'mensaje': mensaje
    })

def mision(request):
    mensaje='Bienvenido mi nombre es: Yadier Perez...'
    return render(request,'mainapp/mision.html',{
        'title':'Nuestra Mision',
        'content':'Somos un grupo que tiene muchas misiones',
        'mensaje': mensaje
    })

def vision(request):
    mensaje='Bienvenido mi nombre es: Yadier Perez...'
    return render(request,'mainapp/vision.html',{
        'title':'Nuestra Vision',
        'content':'Queremos que todos tengan una pagina bonita',
        'mensaje': mensaje
    })