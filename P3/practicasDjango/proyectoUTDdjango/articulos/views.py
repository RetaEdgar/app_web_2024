from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Article, Category

# Create your views here.
@login_required(login_url='inicio')

def list_art(request):

    #sacar articulos de la base de datos
    articulos = Article.objects.all()
    return render(request, 'articulos/listado_art.html',{
        'title':'Articulos',
        'content':'Listado de articulos',
        'articulos':articulos
    })

@login_required(login_url='inicio')
def list_cat(request):

    #Sacar categorias de la base de datos
    categorias = Category.objects.all()
    return render(request, 'categorias/listado_cat.html',{
        'title':'Categorias',
        'content':'Listado de categorias',
        'categorias':categorias
    })

    
