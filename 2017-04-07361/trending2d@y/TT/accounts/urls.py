from django.urls import path

from . import views
from .views import AboutPageView


urlpatterns = [
    path('signup/', views.SignUp.as_view(), name='signup'),
    path('about/', AboutPageView.as_view(), name='about'),
]