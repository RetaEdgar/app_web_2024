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